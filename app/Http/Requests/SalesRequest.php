<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'boat_type' => '',        
            'travel_expense' => 'integer|nullable',        
            'discount' => 'integer|nullable',        
            'boat_no' => '',        
            'ship_model' => '',        
            'location' => '',        
            'machine_num' => '',        
            'request_details' => '',        
            'created_date' => '',        
            'due_date' => '',        
            'file_no' => 'integer|nullable',        
            'usage_time' => '',        
            'sales_date' => '',        
            'delivery_date' => '',        
            'customer_id' => '',
            'company_id' => '',
            'ship_id' => '',
            'sales_in_charge_id' => '',        
            'service_in_charge_id' => '',        
            'service_store_id' => '',        
        ];
    }
}
