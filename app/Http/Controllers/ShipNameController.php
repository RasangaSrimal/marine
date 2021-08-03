<?php

namespace App\Http\Controllers;

use App\Models\ShipSpecialName;
use Illuminate\Http\Request;

class ShipNameController extends NameMasterController
{
    function __construct() {
        $this->model =  ShipSpecialName::class;
        $this->route = 'ship_special_name';
        $this->data = [
            "route" => $this->route,
            "title" => "船舶特殊名義",
            "fields" => [
                'name' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
