<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatedDeliveryPlace extends Model
{
    use HasFactory;
    
    protected $fillable = ['delivery_place', 'order'];

    public function quotation()
    {
        return $this->hasOne('App\Models\Quotation');
    }
}
