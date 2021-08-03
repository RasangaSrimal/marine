<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatedDeliveryDate extends Model
{
    use HasFactory;

    protected $fillable = ['delivery_date', 'order'];

    public function quotation()
    {
        return $this->hasOne('App\Models\Quotation');
    }
}
