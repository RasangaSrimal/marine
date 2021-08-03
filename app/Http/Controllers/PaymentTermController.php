<?php

namespace App\Http\Controllers;

use App\Models\EstimatedPaymentTerms;
use Illuminate\Http\Request;

class PaymentTermController extends NameMasterController
{
    function __construct() {
        $this->model =  EstimatedPaymentTerms::class;
        $this->route = 'estimate_payment_terms';
        $this->data = [
            "route" => $this->route,
            "title" => "見積支払条件",
            "fields" => [
                'payment_terms' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
