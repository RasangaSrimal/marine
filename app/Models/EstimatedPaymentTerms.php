<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatedPaymentTerms extends Model
{
    use HasFactory;

    protected $fillable = ['payment_terms', 'order'];

    public function quotation()
    {
        return $this->hasOne('App\Models\Quotation');
    }
}
