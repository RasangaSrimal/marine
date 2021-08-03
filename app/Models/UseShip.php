<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseShip extends Model
{
    use HasFactory;

    protected $fillable = ['usage_name', 'order'];

    public function ship()
    {
        return $this->hasMany('App\Models\Ship');
    }
}
