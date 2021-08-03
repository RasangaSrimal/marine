<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitedCoastalArea extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'area_name', 'order'];
}
