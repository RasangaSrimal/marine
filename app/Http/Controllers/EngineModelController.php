<?php

namespace App\Http\Controllers;

use App\Models\EngineModelList;
use Illuminate\Http\Request;

class EngineModelController extends NameMasterController
{
    function __construct() {
        $this->model =  EngineModelList::class;
        $this->route = 'engine_model_list';
        $this->data = [
            "route" => $this->route,
            "title" => "エンジン機種",
            "fields" => [
                'model_selection' => "required",
                'model' => "required",
                'classification' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
