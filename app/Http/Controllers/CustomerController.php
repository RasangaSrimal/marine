<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\SalesInCharge;
use App\Models\JobTitle;
use App\Models\Ship;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::where([]);
        $ships = Ship::where([]);
        if ($request->input('ship_name')) {
            $ships = $ships->where(['name' => $request->input('ship_name')]);
        }
        if ($request->input('boat_type_name')) {
            $ships = $ships->whereHas('boatTypeMaster', function($query) use ($request) {
                $query->where(['name'=> $request->input('boat_type_name')]);
            });
        }
        if ($request->input('ship_name') or $request->input('boat_type_name')) {
            $customers = $customers->whereHas('ships', function($query) use ($ships) {
                $query->whereIn('ship_id', $ships->pluck('id'));
            }); 
        }
        if ($request->input('company')) {
            $company_ids = Customer::where(['name'=> $request->input('company')])->pluck('id');
            $customers = $customers->whereIn('company_id', $company_ids);
        }
        if ($request->input('name')) {
            $customers = $customers->where(['name' => $request->input('name')]); 
        }
        $request->flash();
        return view('customer.index', ['customer' => $customers->get()]);
    }

    public function createOrUpdateCustomer($request, $customer=null)
    {
        $data = $request->validated();
        $data['company_id'] = Customer::prefGetOrCreate($data, 'company', 1)->id;
        $data = array_merge($data, $data['customer']);
        isset($customer) ? $customer->update($data) : Customer::create($data);
        return redirect('/customer');
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        return $this->createOrUpdateCustomer($request, $customer);
    }

    public function edit(Customer $customer)
    {
        $companies = Customer::where('is_company', 1)->get(['id', 'postal_code', 'address1', 'address2', 'tel', 'name as value']);
        $roleNames = JobTitle::pluck('role_name', 'id');
        $salesInCharge = SalesInCharge::pluck('name', 'id');
        return view('customer.create', compact('companies', 'customer', 'roleNames', 'salesInCharge'));
    }

    public function create()
    {
        $customer = new Customer;
        return $this->edit($customer);
    }

    public function store(CustomerRequest $request)
    {
        return $this->createOrUpdateCustomer($request);
    }
}
