<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipType extends Model
{
    use HasFactory;

    protected $fillable = ['ship_type', 'order'];

    public function ship()
    {
        return $this->hasMany('App\Models\Ship');
    }
}
