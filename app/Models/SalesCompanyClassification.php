<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCompanyClassification extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name', 'order'];
}
