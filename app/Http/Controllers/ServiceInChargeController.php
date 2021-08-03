<?php

namespace App\Http\Controllers;

use App\Models\ServiceInCharge;
use Illuminate\Http\Request;

class ServiceInChargeController extends NameMasterController
{
    function __construct() {
        $this->model =  ServiceInCharge::class;
        $this->route = 'service_in_charge';
        $this->data = [
            "route" => $this->route,
            "title" => "担当サービス",
            "fields" => [
                "service_name" => "required",
            ],
            "db_fields" => [
                'service_name' => 'name',
            ],
        ];
        parent::__construct();
    }
}
