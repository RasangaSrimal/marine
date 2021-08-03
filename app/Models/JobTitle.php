<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    protected $fillable = ['role_name', 'order'];
    
    public function customer()
    {
        return $this->hasMany('App\Models\Customer');
    }
}
