<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\ConsumptionTax;
use App\Models\Customer;
use App\Models\Ship;
use App\Models\SalesInCharge;
use App\Models\ServiceInCharge;
use App\Models\ExpenseDetail;
use App\Models\OutsourcedServiceStore;
use App\Http\Requests\SalesRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;

class SalesController extends SalesQuotationController
{
    public function index(Request $request)
    {
        $sales = Sales::where([]);
        if ($request->input('ship_name')) {
            $sales = $sales->whereHas('ship', function($query) use ($request) {
                $query->where(['name'=> $request->input('ship_name')]);
            }); 
        }
        if ($request->input('boat_type_name')) {
            $ship_ids = Ship::whereHas('boatTypeMaster', function($query) use ($request) {
                $query->where(['name'=> $request->input('boat_type_name')]);
            })->pluck('id');
            $sales = $sales->whereIn('id', $ship_ids);
        }
        if ($request->input('customer_name')) {
            $sales = $sales->whereHas('customer', function($query) use ($request) {
                $query->where(['name'=> $request->input('customer_name')]);
            }); 
        }
        if ($request->input('id')) {
            $sales = $sales->where(['id'=> $request->input('id')]); 
        }
        $request->flash();
        return view('sales.index', ['sales' => $sales->get()]);
    }    

    public function edit(Sales $sales)
    {
        return view('sales.create', array_merge([
            'object' => $sales, 
            'sales_in_charge' => SalesInCharge::pluck('name', 'id'),
            'service_in_charge' => ServiceInCharge::pluck('name', 'id'),
            'service_store' => OutsourcedServiceStore::pluck('name', 'id'),
            'expenseDetail' => ExpenseDetail::pluck('expense_detail', 'id'),
        ], $this->loadMasterData()));
    }

    public function create(Request $request)
    {
        $sales = new Sales;
        $sales->customer_id = $request->get('customer_id');
        return $this->edit($sales);
    }

    public function store(Request $request, SalesRequest $salesRequest)
    {
        $data = $salesRequest->validated();
        $sales = Sales::create($data);
        $this->createRecords($request, $sales);
        return redirect('/sales');
    }
    
    public function show(Sales $sales)
    {
        return $this->getPdf($sales, 'sales');
    }

    public function update(Request $request, SalesRequest $salesRequest, Sales $sales)
    {
        $sales->update($salesRequest->validated());
        if (isset($sales->ship)) {
            $sales->ship->update([
                'model' => $salesRequest->validated()["ship_model"],
                'boat_no' => $salesRequest->validated()["boat_no"],
                'location' => $salesRequest->validated()["location"],
            ]);
        }
        $this->createRecords($request, $sales);
        return redirect('/sales');
    }
}
