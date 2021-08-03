<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeClassification extends Model
{
    use HasFactory;

    protected $fillable = ['type_code', 'type_classification_contents', 'order'];
}
