<?php

namespace App\Http\Controllers;

use App\Models\SalesInCharge;
use Illuminate\Http\Request;

class SalesInChargeController extends NameMasterController
{
    function __construct() {
        $this->model =  SalesInCharge::class;
        $this->route = 'sales_in_charge';
        $this->data = [
            "route" => $this->route,
            "title" => "担当セールス",
            "fields" => [
                "sales_in_charge_name" => "required",
            ],
            "db_fields" => [
                "sales_in_charge_name" => 'name',
            ],
        ];
        parent::__construct();
    }
}
