<?php

namespace App\Http\Controllers;

use App\Models\StorageMarina;
use Illuminate\Http\Request;

class StorageMarinaController extends NameMasterController
{
    function __construct() {
        $this->model =  StorageMarina::class;
        $this->route = 'storage_marina';
        $this->data = [
            "route" => $this->route,
            "title" => "保管マリーナ",
            "fields" => [
                'storage_code' => "required",
                'storage_location' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
