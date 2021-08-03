<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageMarina extends Model
{
    use HasFactory;

    protected $fillable = ['storage_code', 'storage_location', 'order'];
}
