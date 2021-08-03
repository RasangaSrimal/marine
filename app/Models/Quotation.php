<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends SalesQuotation
{
    use HasFactory;

    protected $fillable = [
        'user_code', 
        'discount', 
        'estimate_num', 
        'hull_num', 
        'estimate_date', 
        'expiration_date', 
        'estimated_amount', 
        'estimated_subject', 
        'created_date', 
        'customer_id', 
        'company_id',
        'ship_id',
        'delivery_date_id', 
        'delivery_place_id', 
        'payment_terms_id',
        'expense_detail_id',
    ];

    public function deliveryDate()
    {
        return $this->belongsTo('App\Models\EstimatedDeliveryDate');
    }

    public function deliveryPlace()
    {
        return $this->belongsTo('App\Models\EstimatedDeliveryPlace');
    }

    public function paymentTerms()
    {
        return $this->belongsTo('App\Models\EstimatedPaymentTerms');
    }

}
