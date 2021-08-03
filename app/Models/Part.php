<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'name',
        'unit_price',
        'quantity',
        'quotation_id',
        'sales_id'
    ];

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public function sales()
    {
        return $this->belongsTo('App\Models\Sales');
    }
}
