<?php

namespace Tests\Feature;

use App\Models\Sales;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ConsumptionTax;

class SalesCreateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $ship = $this->createShip();
        $company = $this->createCompany();
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
        $this->url = "/sales/create";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee('消費税11％');
        $response->assertSee('taxRate = 0.11');
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
