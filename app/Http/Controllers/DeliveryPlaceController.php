<?php

namespace App\Http\Controllers;

use App\Models\EstimatedDeliveryPlace;
use Illuminate\Http\Request;

class DeliveryPlaceController extends NameMasterController
{
    function __construct() {
        $this->model =  EstimatedDeliveryPlace::class;
        $this->route = 'estimated_delivery_place';
        $this->data = [
            "route" => $this->route,
            "title" => "見積受渡場所事例",
            "fields" => [
                'delivery_place' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
