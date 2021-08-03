<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'kana', 
        'user_code', 
        'postal_code', 
        'address1', 
        'address2', 
        'tel', 
        'home_tel', 
        'dm_issuance_cla', 
        'registered_date', 
        'sales_in_charge_id', 
        'job_title_id',

        'company_id',
        'is_company',
    ];

    protected $casts = [
        'is_company' => 'boolean',
    ];

    public function ships()
    {
        return $this->belongsToMany('App\Models\Ship');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Customer', 'company_id');
    }

    public function sales()
    {
        return $this->hasOne('App\Models\Sales');
    }

    public function quotations()
    {
        return $this->hasOne('App\Models\Quotation');
    }
    
    public function sales_in_charge()
    {
        return $this->belongsTo('App\Models\SalesInCharge');
    }

    public function job_title()
    {
        return $this->belongsTo('App\Models\JobTitle');
    }

    public static function prefGetOrCreate($data, $pref, $is_company = false)
    {
        $id_field = $pref . '_id';
        if (isset($data[$id_field])) return Customer::find($data[$id_field]);
        if (!isset(($data[$pref] ?? [])['name'])) return new Customer();
        return Customer::create(array_merge($data[$pref], ['is_company' => $is_company]));
    }

    public function getShipAttribute()
    {
        return $this->ships()->first() ?: new Ship;
    }
}
