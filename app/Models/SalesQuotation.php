<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesQuotation extends Model
{
    public function beforeTax()
    {
        return $this->partTotal() + $this->workTotal() + $this->expenseTotal() - $this->discount;
    }

    public function withTax()
    {
        $tax_rate = ConsumptionTax::getCurrentRate()->tax_rate;
        return intval($this->beforeTax() * (1 + $tax_rate / 100));
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function ship()
    {
        return $this->belongsTo('App\Models\Ship');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function workingDetails()
    {
        return $this->hasMany('App\Models\WorkingDetail');
    }

    public function parts()
    {
        return $this->hasMany('App\Models\Part');
    }

    public function expenses()
    {
        return $this->hasMany('App\Models\Expense');
    }

    public function expenseDetail()
    {
        return $this->belongsTo('App\Models\ExpenseDetail');
    }

    public function workTotal()
    {
        $total = 0;
        foreach($this->workingDetails as $work) {
            $total += $work->quantity * $work->unit_price;
        }
        return $total;
    }
    public function partTotal()
    {
        $total = 0;
        foreach($this->parts as $part) {
            $total += $part->quantity * $part->unit_price;
        }
        return $total;
    } 
    public function expenseTotal()
    {
        $total = 0;
        foreach($this->expenses as $expense) {
            $total += $expense->quantity * $expense->unit_price;
        }
        return $total;
    } 
}
