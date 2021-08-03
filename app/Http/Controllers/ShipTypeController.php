<?php

namespace App\Http\Controllers;

use App\Models\ShipType;
use Illuminate\Http\Request;

class ShipTypeController extends NameMasterController
{
    function __construct() {
        $this->model =  ShipType::class;
        $this->route = 'ship_type';
        $this->data = [
            "route" => $this->route,
            "title" => "船種",
            "fields" => [
                'ship_type' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
