<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_detail',
        'order'];

    public function quotation()
    {
        return $this->hasOne('App\Models\Quotation');
    }

    public function sales()
    {
        return $this->hasOne('App\Models\Sales');
    }
}
