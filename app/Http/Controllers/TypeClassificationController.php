<?php

namespace App\Http\Controllers;

use App\Models\TypeClassification;
use Illuminate\Http\Request;

class TypeClassificationController extends NameMasterController
{
    function __construct() {
        $this->model = TypeClassification::class;
        $this->route = 'type_classification';
        $this->data = [
            "route" => $this->route,
            "title" => "種別区分",
            "fields" => [
                'type_code' => "required",
                'type_classification_contents' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
