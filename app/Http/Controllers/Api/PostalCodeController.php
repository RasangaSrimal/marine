<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostalCode;

class PostalCodeController extends Controller
{
    public function show($id)
    {
        return PostalCode::where(['postal_code' => $id])->first();
    }
}
