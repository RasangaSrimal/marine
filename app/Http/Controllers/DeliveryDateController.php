<?php

namespace App\Http\Controllers;

use App\Models\EstimatedDeliveryDate;
use Illuminate\Http\Request;

class DeliveryDateController extends NameMasterController
{
    function __construct() {
        $this->model =  EstimatedDeliveryDate::class;
        $this->route = 'estimate_delivery_date';
        $this->data = [
            "route" => $this->route,
            "title" => "見積納期事例",
            "fields" => [
                'delivery_date' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
