<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutsourcedServiceStore extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'cost_rate', 'order'];

    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }
}
