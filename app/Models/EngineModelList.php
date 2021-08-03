<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineModelList extends Model
{
    use HasFactory;

    protected $fillable = ['model_selection', 'model', 'classification', 'order'];
}
