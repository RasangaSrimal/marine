<?php

namespace App\Http\Controllers;

use App\Models\UseShip;
use Illuminate\Http\Request;

class UseShipController extends NameMasterController
{
    function __construct() {
        $this->model =  UseShip::class;
        $this->route = 'use_ship';
        $this->data = [
            "route" => $this->route,
            "title" => "用途",
            "fields" => [
                'usage_name' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
