<?php

namespace App\Http\Controllers;

use App\Models\SalesCompanyClassification;
use Illuminate\Http\Request;

class SalesCompanyClassificationController extends NameMasterController
{
    function __construct() {
        $this->model =  SalesCompanyClassification::class;
        $this->route = 'sales_company_classification';
        $this->data = [
            "route" => $this->route,
            "title" => "販売会社区分",
            "fields" => [
                "key" => "required",
                'sales_company_name' => "required",
            ],
            "db_fields" => [
                'sales_company_name' => 'name',
            ],
        ];
        parent::__construct();
    }
}
