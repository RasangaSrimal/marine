<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipRequest extends CustomerRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'gross_register_tonn' => 'integer|nullable',
            'inspection_num' => '',
            'registration_port' => '',
            'length' => 'integer|nullable',
            'passengers_max_num' => '',
            'other_passengers_max_num' => '',
            'sailors_max_num' => '',
            'registered_date' => '',
            'inspection_id' => '',
            'delivery_date' => '',
            'other_navigational_conditions' => '',

            'ship_type_id' => '',
            'boat_type_master_id' => '',
            'use_id' => '',
            'navigation_area_id' => '',
        ];

        for($i=1; $i<=5; $i++) {
            $rules["inspection_date$i"] = '';
            $rules["inspection_type$i"] = '';
        }
        $rules = array_merge($rules, $this->customerRules('owner'), $this->customerRules('borrower'));
        return $rules;
    }
}
