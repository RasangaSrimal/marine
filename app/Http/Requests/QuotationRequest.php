<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_code' => '',
            'estimate_num' => '',
            'hull_num' => '',
            'estimate_date' => '',
            'discount' => '',        
            'expiration_date' => '',
            'estimated_amount' => '',
            'estimated_subject' => '',
            'customer_id' => '',
            'company_id' => '',
            'ship_id' => '',
            'boat_type' => '',
            'model' => '',
            'engine_num_r' => '',
            'engine_num_l' => '',
            'inspection_date' => '',
            'location' => '',
            'delivery_date_id' => '',
            'delivery_place_id' => '',
            'payment_terms_id' => '',
        ];
    }
}
