<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends NameMasterController
{
    function __construct() {
        $this->model =  JobTitle::class;
        $this->route = 'job_title';
        $this->data = [
            "route" => $this->route,
            "title" => "役職名",
            "fields" => [
                'role_name' => "required",
            ],
            "db_fields" => [
            ],
        ];
        parent::__construct();
    }
}
