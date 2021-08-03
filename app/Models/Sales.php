<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends SalesQuotation
{
    use HasFactory;

    protected $fillable = [
        'file_no', 
        'discount', 
        'due_date', 
        'delivery_date', 
        'usage_time', 
        'sales_date', 
        'request_details', 
        'created_date', 
        'travel_expense',
        'request_amount', 
        'customer_id', 
        'company_id',
        'ship_id',
        'sales_in_charge_id', 
        'service_in_charge_id', 
        'service_store_id',
        'expense_detail_id',
    ];

    public function salesInCharge()
    {
        return $this->belongsTo('App\Models\SalesInCharge');
    }

    public function serviceInCharge()
    {
        return $this->belongsTo('App\Models\ServiceInCharge');
    }

    public function serviceStore()
    {
        return $this->belongsTo('App\Models\OutsourcedServiceStore');
    }

}
