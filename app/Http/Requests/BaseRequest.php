<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'store_code' => '', 
            'store_name1' => '', 
            'store_name2' => '', 
            'address' => '', 
            'postal_code' => '', 
            'tel' => '', 
            'fax' => '', 
            'bank_name' => '', 
            'account_name' => '', 
            'account_number' => '',
        ];
    }
}
