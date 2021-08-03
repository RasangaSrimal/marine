<?php

namespace App\Http\Controllers;

use App\Models\NavigationArea;
use Illuminate\Http\Request;

class NavigationAreaController extends NameMasterController
{
    function __construct() {
        $this->model =  NavigationArea::class;
        $this->route = 'navigation_area';
        $this->data = [
            "route" => $this->route,
            "title" => "航行区域",
            "fields" => [
                'area_name' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
