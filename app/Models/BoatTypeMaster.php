<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatTypeMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'boat_type_selection', 
        'extracted_data', 
        'name', 
        'product_code', 
        'bu_classification', 
        'class'
    ];
}
