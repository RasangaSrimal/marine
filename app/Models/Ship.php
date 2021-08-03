<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'certificate_num', 
        'inspection_num', 
        'delivery_date', 
        'gross_register_tonn', 
        'registration_port', 
        'length', 
        'passengers_max_num', 
        'other_passengers_max_num', 
        'sailors_max_num', 
        'registered_date', 
        'inspection_id', 
        'other_navigational_conditions', 
        'engine', 
        'engine_num_r',
        'engine_num_l',
        'location', 
        'model', 
        'boat_no',
        'machine_num', 
        'inspection_date',
        'inspection_date1',
        'inspection_date2',
        'inspection_date3',
        'inspection_date4',
        'inspection_date5',
        'ship_type_id', 
        'use_id', 
        'navigation_area_id',
        'boat_type_master_id',
    ];

    public function customers()
    {
        return $this->belongsToMany('App\Models\Customer')->withPivot('is_owner', 'is_borrower');
    }

    public function getOwnerAttribute()
    {
        return $this->customers()->where('is_owner', true)->first() ?? new Customer();
    }

    public function getBorrowerAttribute()
    {
        return $this->customers()->where('is_borrower', true)->first() ?? new Customer();
    }

    public function shipType()
    {
        return $this->belongsTo('App\Models\ShipType');
    }

    public function use()
    {
        return $this->belongsTo('App\Models\UseShip');
    }

    public function navigationArea()
    {
        return $this->belongsTo('App\Models\NavigationArea');
    }

    public function boatTypeMaster()
    {
        return $this->belongsTo('App\Models\BoatTypeMaster');
    }
}
