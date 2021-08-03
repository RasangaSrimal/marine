<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInCharge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];
    
    public function customer()
    {
        return $this->hasMany('App\Models\Customer');
    }

    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }
}
