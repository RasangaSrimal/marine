<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'user_code' => '',
            'kana' => '',
            'home_tel' => '',
            'dm_issuance_cla' => '',
            'registered_date' => '',
            'sales_in_charge_id' => '',
            'job_title_id' => '',
        ];
        $rules = array_merge($rules, $this->customerRules('customer'), $this->customerRules('company'));
        $rules['customer.name'] = 'required';
        unset($rules['customer_id']);
        return $rules;
    }
    public function customerRules($pref)
    {
        return [
            "{$pref}_id" => '',
            "{$pref}.name" => '',
            "{$pref}.postal_code" => '',
            "{$pref}.address1" => '',
            "{$pref}.address2" => '',
            "{$pref}.tel" => '',
        ];
    }
}
