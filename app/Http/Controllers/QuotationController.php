<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\ConsumptionTax;
use App\Models\Customer;
use App\Models\EstimatedDeliveryDate;
use App\Models\EstimatedDeliveryPlace;
use App\Models\EstimatedPaymentTerms;
use App\Models\ExpenseDetail;
use App\Models\Ship;
use App\Http\Requests\QuotationRequest;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade;

class QuotationController extends SalesQuotationController
{
    public function index(Request $request)
    {
        $quotations = Quotation::where([]);
        if ($request->input('ship_name')) {
            $quotations = $quotations->whereHas('ship', function($query) use ($request) {
                $query->where(['name'=> $request->input('ship_name')]);
            }); 
        }
        if ($request->input('boat_type_name')) {
            $ship_ids = Ship::whereHas('boatTypeMaster', function($query) use ($request) {
                $query->where(['name'=> $request->input('boat_type_name')]);
            })->pluck('id');
            $quotations = $quotations->whereIn('id', $ship_ids);
        }
        if ($request->input('name')) {
            $quotations = $quotations->whereHas('customer', function($query) use ($request) {
                $query->where(['name'=> $request->input('name')]);
            }); 
        }
        if ($request->input('id')) {
            $quotations = $quotations->where(['id'=> $request->input('id')]); 
        }
        $request->flash();
        return view('quotation.index', ['quotation' => $quotations->get()]);
    }

    public function edit(Quotation $quotation)
    {
        return view('quotation.create', array_merge([
            'object' => $quotation,
            'deliveryDates' => EstimatedDeliveryDate::pluck('delivery_date', 'id'),
            'deliveryPlaces' => EstimatedDeliveryPlace::pluck('delivery_place', 'id'),
            'paymentTerms' => EstimatedPaymentTerms::pluck('payment_terms', 'id'),
            'expenseDetail' => ExpenseDetail::pluck('expense_detail', 'id'),
        ], $this->loadMasterData()));
    }

    public function create()
    {
        $quotation = new Quotation;
        return $this->edit($quotation);
    }

    public function store(Request $request, QuotationRequest $quotationRequest)
    {
        $data = $quotationRequest->validated();
        $quotation = Quotation::create($data);
        $this->createRecords($request, $quotation);
        return redirect('/quotation');
    }

    public function show(Quotation $quotation)
    {
        return $this->getPdf($quotation, 'quotation');
    }

    public function update(Request $request, QuotationRequest $quotationRequest, Quotation $quotation)
    {
        $quotation->update($quotationRequest->validated());
        $this->createRecords($request, $quotation);
        $request->flash();
        return redirect('/quotation');
    }
}
