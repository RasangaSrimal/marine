<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\SalesCompanyClassification;
use App\Models\WorkingDetail;
use App\Models\Expense;
use App\Models\SalesInCharge;
use App\Models\EstimatedDeliveryDate;
use App\Models\EstimatedDeliveryPlace;
use App\Models\EstimatedPaymentTerms;
use App\Models\NavigationArea;
use App\Models\UseShip;
use App\Models\BoatTypeMaster;
use App\Models\ShipType;
use App\Models\ServiceInCharge;
use App\Models\OutsourcedServiceStore;
use App\Models\JobTitle;
use App\Models\Base;
use App\Models\Quotation;
use App\Models\Ship;
use App\Models\Sales;
use App\Models\Part;
use App\Models\ExpenseDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $salesInCharge = SalesInCharge::firstOrFail();
        $expenseDetail = ExpenseDetail::firstOrFail();
        $serviceStore = OutsourcedServiceStore::firstOrFail();
        $serviceInCharge = ServiceInCharge::firstOrFail();
        $jobTitle = JobTitle::firstOrFail();
        $shipTipe = ShipType::firstOrFail();
        $useShip = UseShip::firstOrFail();
        $navigationArea = NavigationArea::firstOrFail();
        $deliveryDate = EstimatedDeliveryDate::firstOrFail();
        $deliveryPlace = EstimatedDeliveryPlace::firstOrFail();
        $paymentTerms = EstimatedPaymentTerms::firstOrFail();
        $boatTypeMaster = BoatTypeMaster::firstOrFail();
        $customer =  Customer::create([
            'name' => '山田太郎',
            'kana' => str_random(5),
            'company' => '丸丸証券株式会社',
            'user_code' => str_random(5),
            'user_postal_code' => '562-0014',
            'user_address1' => '大阪府箕面市萱野',
            'user_address2' => '1丁目２−３',
            'home_tel' => '06-6875-0662',
            'mobile_tel' => '090-7319-5632',
            'company_postal_code' => str_random(5),
            'company_address1' => str_random(5),
            'company_address2' => str_random(5),
            'company_tel' => str_random(5),
            'dm_issuance_cla' => str_random(5),
            'registered_date' => Carbon::today()->toDateString(),
            'sales_in_charge_id' => $salesInCharge->id,
            'job_title_id' => $jobTitle->id,
        ]);
        $ship = Ship::create([
            'name' => '万景峰号',
            'certificate_num' => str_random(5),
            'inspection_num' => str_random(5),
            'inspection_date' => Carbon::today()->toDateString(),
            'inspection_date1' => Carbon::today()->toDateString(),
            'inspection_date2' => Carbon::today()->toDateString(),
            'inspection_date3' => Carbon::today()->toDateString(),
            'inspection_date4' => Carbon::today()->toDateString(),
            'inspection_date5' => Carbon::today()->toDateString(),
            'borrower' => str_random(5),
            'delivery_date' => Carbon::today()->toDateString(),
            'gross_register_tonn' => mt_rand(0, 10),
            'model' => 'MSD-3435',
            'machine_num' => str_random(5),
            'registration_port' => str_random(5),
            'boat_no' => str_random(5),
            'length' => mt_rand(0, 10),
            'passengers_max_num' => mt_rand(0, 10),
            'other_passengers_max_num' => mt_rand(0, 10),
            'sailors_max_num' => mt_rand(0, 10),
            'borrower_postal_code' => str_random(5),
            'borrower_address1' => str_random(5),
            'borrower_address2' => str_random(5),
            'borrower_tel' => str_random(5),
            'registered_date' => Carbon::today()->toDateString(),
            'inspection_id' => str_random(5),
            'other_navigational_conditions' => str_random(5),
            'engine' => str_random(5),
            'engine_num_l' => str_random(5),
            'engine_num_r' => str_random(5),
            'location' => str_random(5),
            'ship_type_id' => $shipTipe->id,
            'boat_type_master_id' => $boatTypeMaster->id,
            'use_id' => $useShip->id,
            'navigation_area_id' => $navigationArea->id,
        ]);
        $sales = Sales::create([
            'request_details' => str_random(5),        
            'request_amount' => str_random(5),        
            'discount' => 100,        
            'travel_expense' => mt_rand(0, 10),        
            'created_date' => Carbon::today()->toDateString(),        
            'due_date' => Carbon::today()->toDateString(),        
            'file_no' => mt_rand(0, 100),        
            'usage_time' => str_random(5),        
            'sales_date' => Carbon::today()->toDateString(),        
            'delivery_date' => Carbon::today()->toDateString(),        
            'customer_id' => $customer->id,
            'sales_in_charge_id' => $salesInCharge->id,
            'service_in_charge_id' => $serviceInCharge->id,
            'service_store_id' => $serviceStore->id,
            'expense_detail_id' => $expenseDetail->id,
        ]);
        # Quotation::truncate();
        $quotation = Quotation::create([
            'user_code' => str_random(5),
            'estimate_num' => str_random(5),
            'discount' => 100,        
            'hull_num' => str_random(5),
            'estimate_date' => Carbon::today()->toDateString(),
            'expiration_date' => Carbon::today()->toDateString(),
            'estimated_amount' => str_random(5),
            'estimated_subject' => str_random(5),
            'created_date' => Carbon::today()->toDateString(),
            'customer_id' => $customer->id,
            'delivery_date_id' => $deliveryDate->id,
            'delivery_place_id' => $deliveryPlace->id,
            'payment_terms_id' => $paymentTerms->id,
            'expense_detail_id' => $expenseDetail->id,
        ]);
        $workingDetail = WorkingDetail::create([
            'content' => str_random(5),
            'unit_price' => mt_rand(0, 1000),
            'quantity' => mt_rand(0, 100),
            'quotation_id' => $quotation->id,
            'sales_id' => $sales->id,
        ]);
        $expence = Expense::create([
            'content' => str_random(5),
            'unit_price' => mt_rand(0, 1000),
            'quantity' => mt_rand(0, 100),
            'quotation_id' => $quotation->id,
            'sales_id' => $sales->id,
        ]);
        $part = Part::create([
            'number' => mt_rand(100000, 999999),
            'name' => str_random(5), 
            'unit_price' => mt_rand(0, 1000),
            'quantity' => mt_rand(0, 100),
            'quotation_id' => $quotation->id,
            'sales_id' => $sales->id,
        ]);
        $salesCompany = SalesCompanyClassification::create([
            'key' => str_random(5),
            'order' => str_random(5),
            'name' => str_random(5),
        ]);
    }
}
