<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumptionTax extends Model
{
    use HasFactory;

    protected $fillable = ['tax_rate', 'date'];

    public static function getCurrentRate()
    {
        return ConsumptionTax::where('date', '<', date("Y-m-d H:i:s"))->orderBy('date', 'desc')->first();
    }

    public static function getFutureRate()
    {
        return ConsumptionTax::where('date', '>', date("Y-m-d H:i:s"))->first();
    }
}
