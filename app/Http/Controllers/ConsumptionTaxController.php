<?php

namespace App\Http\Controllers;

use App\Models\ConsumptionTax;
use App\Http\Requests\TaxRequest;

class ConsumptionTaxController extends Controller
{
    function index() {
        $currentRate = ConsumptionTax::getCurrentRate();
        $futureRate = ConsumptionTax::getFutureRate();
        return view('admin.consumption_tax', compact('currentRate', 'futureRate'));
    }

    function store(TaxRequest $request) {
        if ($request->input('date')) {
            ConsumptionTax::getFutureRate()->update([
                'tax_rate' => $request->input('tax_rate'), 
                'date' => $request->input('date')
            ]);
        }
        if ($request->input('current_rate')){
            ConsumptionTax::getCurrentRate()->update([
                'tax_rate' => $request->input('current_rate'),
            ]);
        }
        return redirect($request->path());
    }
}
