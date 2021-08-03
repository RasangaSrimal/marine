<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Base;
use App\Models\ConsumptionTax;
use App\Models\Customer;
use App\Models\Ship;
use App\Models\SalesInCharge;
use App\Models\ServiceInCharge;
use App\Models\OutsourcedServiceStore;
use App\Http\Requests\SalesRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;

class SalesQuotationController extends Controller
{
    public function createRecords($request, $object)
    {
        $object->workingDetails()->delete();
        for ($i = 0; $i < count([$request->input('content')]); $i++) {
            $object->workingDetails()->create([
                'content' => $request->input('content')[$i],
                'unit_price' => $request->input('unit_price')[$i],
                'quantity' => $request->input('quantity')[$i],
            ]);
        }
        $object->parts()->delete();
        for ($i = 0; $i < count([$request->input('part_number')]); $i++) {
            $object->parts()->create([
                'number' => $request->input('part_number')[$i],
                'name' => $request->input('part_name')[$i],
                'unit_price' => $request->input('part_unit_price')[$i],
                'quantity' => $request->input('part_quantity')[$i],
            ]);
        }
        $object->expenses()->delete();
        for ($i = 0; $i < count([$request->input('expense_detail_id')]); $i++) {
            $object->expenses()->create([
                'expense_detail_id' => $request->input('expense_detail_id')[$i],
                'unit_price' => $request->input('expense_unit_price')[$i],
                'quantity' => $request->input('expense_quantity')[$i],
            ]);
        }
        return $object; 
    }

    public function loadMasterData()
    {
        return [
            'companies' => Customer::where('is_company', 1)->get(['id', 'name as value']),
            'ships' => Ship::get(['id', 'inspection_num', 'name as value']),
            'tax_rate' => ConsumptionTax::getCurrentRate()->tax_rate,
            'customers' => Customer::get()->toArray(),
        ]; 
    }

    public function getPdf($sales_quotation, $name)
    {
        $data = [
            $name => $sales_quotation,
            'tax_rate' => ConsumptionTax::getCurrentRate()->tax_rate,
            'base' => Base::first(),
        ];
        if (env('PDF_AS_HTML', false)) {
            return view($name . '.pdf', $data);
        }
        $pdf = Facade::loadView($name . '.pdf', $data);
        return $pdf->download($name . '.pdf');
    }
}
