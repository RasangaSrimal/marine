<?php

namespace App\Http\Controllers;

use App\Models\LimitedCoastalArea;
use Illuminate\Http\Request;

class CoastalAreaController extends NameMasterController
{
    function __construct() {
        $this->model =  LimitedCoastalArea::class;
        $this->route = 'limited_coastal_area';
        $this->data = [
            "route" => $this->route,
            "title" => "限定沿海区域",
            "fields" => [
                'code' => "required",
                'area_name' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
