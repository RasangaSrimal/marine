<?php

namespace App\Http\Controllers;

use App\Models\OutsourcedServiceStore;
use Illuminate\Http\Request;

class OutsourcedServiceStoreController extends NameMasterController
{
    function __construct() {
        $this->model =  OutsourcedServiceStore::class;
        $this->route = 'service_store';
        $this->data = [
            "route" => $this->route,
            "title" => "外注サービス店",
            "fields" => [
                "code" => "required",
                "store_name" => "required",
                "cost_rate" => "required|numeric",
            ],
            "db_fields" => [
                'store_name' => 'name',
            ],
        ];
        parent::__construct();
    }
}
