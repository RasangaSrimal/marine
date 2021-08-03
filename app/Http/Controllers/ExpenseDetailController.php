<?php

namespace App\Http\Controllers;

use App\Models\ExpenseDetail;
use Illuminate\Http\Request;

class ExpenseDetailController extends NameMasterController
{
    function __construct() {
        $this->model = ExpenseDetail::class;
        $this->route = 'expense_detail';
        $this->data = [
            "route" => $this->route,
            "title" => "諸経費明細語句",
            "fields" => [
                'expense_detail'=> "required",
            
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
