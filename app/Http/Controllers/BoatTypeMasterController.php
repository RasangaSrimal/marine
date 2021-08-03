<?php

namespace App\Http\Controllers;

use App\Models\BoatTypeMaster;
use Illuminate\Http\Request;

class BoatTypeMasterController extends NameMasterController
{
    function __construct() {
        $this->model =  BoatTypeMaster::class;
        $this->route = 'boat';
        $this->data = [
            "route" => $this->route,
            "title" => "艇種リスト",
            "fields" => [
                'boat_type_selection' => "required", 
                'extracted_data' => "required", 
                'boat_type_name' => "required", 
                'product_code' => "required", 
                'bu_classification' => "required", 
                'class' => "required",
            ],
            "db_fields" => [
                'boat_type_name' => "name",
            ],
        ];
    }
}
