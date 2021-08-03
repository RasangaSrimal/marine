<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationArea extends Model
{
    use HasFactory;
    
    protected $fillable = ['area_name', 'order'];

    public function ship()
    {
        return $this->hasMany('App\Models\Ship');
    }
}
