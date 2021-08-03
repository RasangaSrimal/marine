<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInCharge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }
}
