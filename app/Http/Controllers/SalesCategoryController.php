<?php

namespace App\Http\Controllers;

use App\Models\SalesCategory;
use Illuminate\Http\Request;

class SalesCategoryController extends NameMasterController
{
    function __construct() {
        $this->model = SalesCategory::class;
        $this->route = 'sales_category';
        $this->data = [
            "route" => $this->route,
            "title" => "売上区分",
            "fields" => [
                'code' => "required",
                'sales_details' => "required",
                'order' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
