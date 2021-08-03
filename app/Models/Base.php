<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;

    protected $fillable = [
            'store_code', 'store_name1', 'store_name2', 'address', 'postal_code', 'tel', 'fax', 'bank_name', 'account_name', 'account_number'
    ];
}
