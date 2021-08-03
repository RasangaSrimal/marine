<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use App\Models\UseShip;
use App\Models\NavigationArea;
use App\Models\ShipType;
use App\Models\Customer;
use App\Http\Requests\ShipRequest;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(Request $request)
    {
        $ships = Ship::where([]);
        foreach (['name', 'id'] as $field) {
            if($request->input($field)) {
                $ships = $ships->where([$field=> $request->input($field)]);
            }
        }
        foreach (['owner', 'company'] as $field) {
            if ($request->input($field)) {
                $ships = $ships->whereHas('customers', function($query) use ($request, $field) {
                    $query->where(['name' => $request->input($field)]);
                }); 
            }
        }
        $request->flash();
        return view('ship.index', ['ship' => $ships->get()]);
    }

    public function edit(Ship $ship)
    {
        return view('ship.create', [
            'ship' => $ship,
            'customer' => $ship->customer,
            'shipTypes' => ShipType::pluck('ship_type', 'id'),
            'customers' => Customer::get(['id', 'postal_code', 'address1', 'address2', 'tel', 'name as value']),
            'usageNames' => UseShip::pluck('usage_name', 'id'),
            'areaNames' => NavigationArea::pluck('area_name', 'id'),
        ]);
    }

    public function createOrUpdateShip(ShipRequest $request, Ship $ship = null)
    {
        $data = $request->validated();
        $ship = $ship ?: Ship::create($data);
        $ship->update($data);
        $ship->customers()->detach();
        $owner = Customer::prefGetOrCreate($data, 'owner');
        if ($owner->id) { $ship->customers()->attach($owner, ['is_owner' => true]); }
        $borrower = Customer::prefGetOrCreate($data, 'borrower');
        if ($borrower->id) { $ship->customers()->attach($borrower, ['is_borrower' => true]); }
        return redirect('/ship');
    }

    public function create()
    {
        return $this->edit(new Ship);
    }
}
