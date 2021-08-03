<?php

namespace Tests\Feature;

use App\Models\Sales;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $ship = $this->createShip();
        $company = $this->createCompany();
        $this->createShip($customer);
        $this->sales = $this->createSales($customer);
        $this->newData = [
            'due_date' => str_random(5),
            'location' => str_random(5),
            'ship_model' => str_random(5),
            'boat_no' => str_random(5),
            'machine_num' => str_random(5),
            'boat_type' => str_random(5),
            'usage_time' => str_random(5),
            'file_no' => 100,
            'sales_date' => str_random(5),
            'created_date' => str_random(5),
            'delivery_date' => str_random(5),
            'request_details' => str_random(5),
            'customer_id' => $customer->id,
            'ship_id' => $ship->id,
            'company_id' => $company->id,
            'service_in_charge_id' => $this->createServiceInCharge()->id,
            'service_store_id' => $this->createServiceStore()->id,
            'sales_in_charge_id' => $this->createSalesInCharge()->id,
            'content' => [str_random(5)],
            'unit_price' => [mt_rand(0, 10)],
            'quantity' => [mt_rand(0, 10)],
            'part_number' => [str_random(5)],
            'part_name' => [str_random(5)],
            'part_unit_price' => [mt_rand(0, 10)],
            'part_quantity' => [mt_rand(0, 10)],
            'expense_detail_id' => $this->createExpenseDetail()->id,
            'expense_unit_price' => [mt_rand(0, 10)],
            'expense_quantity' => [mt_rand(0, 10)],
            'travel_expense' => mt_rand(0, 10),
            'discount' => mt_rand(0, 10),
        ];
        $this->url = "/sales/{$this->sales->id}/edit";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("整備売上伝票明細");
        $response->assertSee($this->sales->customer['kana']);        
        $response->assertSee($this->sales->customer['company']);        
        $response->assertSee($this->sales->customer['mobile_tel']);        
        $response->assertSee($this->sales->customer['user_postal_code']);        
        $response->assertSee($this->sales->customer['user_address1']);        
        $response->assertSee($this->sales->ship['name']);        
        $response->assertSee($this->sales->ship['boatTypeMaster']['name']);        
        $response->assertSee($this->sales->ship['model']);        
        $response->assertSee($this->sales->ship['inspection_num']);        
        $response->assertSee($this->sales->ship['location']);        
        $response->assertSee($this->sales->ship['machine_num']);        
        $response->assertSee($this->sales['due_date']);        
        $response->assertSee($this->sales['usage_time']);        
        $response->assertSee($this->sales['file_no']);        
        $response->assertSee($this->sales['sales_date']);        
        $response->assertSee($this->sales['delivery_date']);        
        $response->assertSee($this->sales['request_details']);        
        $response->assertSee($this->sales['travel_expense']);        
        $response->assertSee($this->sales->salesInCharge['name']);        
        $response->assertSee($this->sales->serviceInCharge['name']);        
        $response->assertSee($this->sales->serviceStore['name']);        
    }

    public function testPut()
    {
        $this->withoutExceptionHandling();
        $response = $this->put($this->url, $this->newData);
        $sales = Sales::firstOrFail();
        $workingDetail = $sales->workingDetails[0];
        $response->assertSee("/sales");
        $this->assertEquals($this->newData['due_date'], $sales->due_date);
        $this->assertEquals($this->newData['usage_time'], $sales->usage_time);
        $this->assertEquals($this->newData['file_no'], $sales->file_no);
        $this->assertEquals($this->newData['sales_date'], $sales->sales_date);
        $this->assertEquals($this->newData['delivery_date'], $sales->delivery_date);
        $this->assertEquals($this->newData['request_details'], $sales->request_details);
        $this->assertEquals($this->newData['travel_expense'], $sales->travel_expense);
        $this->assertEquals($this->newData['content'][0], $workingDetail->content);
        $this->assertEquals($this->newData['unit_price'][0], $workingDetail->unit_price);
        $this->assertEquals($this->newData['quantity'][0], $workingDetail->quantity);
        $this->assertEquals($this->newData['part_number'][0], $sales->parts[0]->number);
        $this->assertEquals($this->newData['part_name'][0], $sales->parts[0]->name);
        $this->assertEquals($this->newData['part_unit_price'][0], $sales->parts[0]->unit_price);
        $this->assertEquals($this->newData['part_quantity'][0], $sales->parts[0]->quantity);
        $this->assertEquals($this->newData['expense_detail_id'][0], $sales->expenses[0]->expense_detail_id);
        $this->assertEquals($this->newData['expense_unit_price'][0], $sales->expenses[0]->unit_price);
        $this->assertEquals($this->newData['expense_quantity'][0], $sales->expenses[0]->quantity);
    }
}
