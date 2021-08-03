<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseRequest;
use App\Models\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $base = Base::first();
        $base = $base ?: Base::create();
        return view('admin.own_base', ['base' => $base]);
    }

    public function update(BaseRequest $request)
    {
        $base = Base::firstOrFail();
        $base->update($request->validated());
        return redirect('/base');
    }
}
