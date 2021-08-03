<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'unit_price',
        'quantity',
        'quotation_id',
        'sales_id',
        'expense_detail_id',
    ];

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public function sales()
    {
        return $this->belongsTo('App\Models\Sales');
    }

    public function expenseDetail()
    {
        return $this->belongsTo('App\Models\ExpenseDetail');
    }
}
