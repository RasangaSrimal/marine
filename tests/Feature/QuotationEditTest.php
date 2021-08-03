<?php

namespace Tests\Feature;

use App\Models\Quotation;
use App\Models\WorkingDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuotationEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $ship = $this->createShip();
        $company = $this->createCompany();
        $this->quotation = $this->createQuotation($customer);
        $this->quotation->parts()->create([
            'unit_price' => rand(1, 10000),
        ]);
        $this->newData = [
            'user_code' => str_random(5),
            'estimate_num' => str_random(5),
            'hull_num' => str_random(5),
            'estimate_date' => str_random(5),
            'expiration_date' => str_random(5),
            'boat_type' => str_random(5),
            'model' => str_random(5),
            'engine_num_l' => str_random(5),
            'engine_num_r' => str_random(5),
            'inspection_num' => str_random(5),
            'inspection_date' => str_random(5),
            'location' => str_random(5),
            'estimated_amount' => str_random(5),
            'estimated_subject' => str_random(5),
            'created_date' => str_random(5),
            'customer_id' => $customer->id,
            'company_id' => $company->id,
            'ship_id' => $ship->id,
            'delivery_date_id' => $this->createDeliveryDate()->id,
            'delivery_place_id' => $this->createDeliveryPlace()->id,
            'payment_terms_id' => $this->createPaymentTerms()->id,
            'content' => [str_random(5)],
            'unit_price' => [mt_rand(0, 10)],
            'quantity' => [mt_rand(0, 10)],
            'part_number' => [str_random(5)],
            'part_name' => [str_random(5)],
            'part_unit_price' => [mt_rand(0, 10)],
            'part_quantity' => [mt_rand(0, 10)],
            'expense_detail_id' => $this->createExpenseDetail()->id,
            'expense_unit_price' => [mt_rand(0, 10)],
            'expense_quantity' => [mt_rand(0, 1000)],
        ];
        $this->url = "/quotation/{$this->quotation->id}/edit";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("/quotation/create");
        $response->assertSee('name="customer_id" type="text" value="' . $this->quotation->customer['id'] . '"', false);
        $response->assertSee($this->quotation->customer['name']);
        $response->assertSee('value="' . $this->quotation['company']['name'] . '"', false);
        $response->assertSee($this->quotation->ship->boatTypeMaster['name']);
        $response->assertSee($this->quotation->customer->ship['name']);
        $response->assertSee($this->quotation->customer->ship['inspection_num']);
        $response->assertSee($this->quotation->customer->ship['inspection_date']);
        $response->assertSee($this->quotation->customer->ship['model']);
        $response->assertSee($this->quotation->customer->ship['location']);
        $response->assertSee($this->quotation->customer->ship['engine_num_l']);
        $response->assertSee($this->quotation->customer->ship['engine_num_r']);
        $response->assertSee($this->quotation['user_code']);
        $response->assertSee($this->quotation['hull_num']);
        $response->assertSee($this->quotation['estimate_num']);
        $response->assertSee($this->quotation['estimate_date']);
        $response->assertSee($this->quotation['expiration_date']);
        $response->assertSee($this->quotation['estimated_amount']);
        $response->assertSee($this->quotation['estimated_subject']);
        $response->assertSee($this->quotation->deliveryDate['delivery_date']);
        $response->assertSee($this->quotation->deliveryPlace['delivery_place']);
        $response->assertSee($this->quotation->paymentTerms['payment_terms']);
        
        $response->assertSee($this->quotation->parts[0]->unit_price);
    }

    public function testPut()
    {
        $this->withoutExceptionHandling();
        $response = $this->put($this->url, $this->newData);
        $quotation = Quotation::firstOrFail();
        $workingDetail = $quotation->workingDetails[0];
        $response->assertSee("/quotation");
        $this->assertEquals($this->newData['user_code'], $quotation->user_code);
        $this->assertEquals($this->newData['estimate_num'], $quotation->estimate_num);
        $this->assertEquals($this->newData['estimate_date'], $quotation->estimate_date);
        $this->assertEquals($this->newData['expiration_date'], $quotation->expiration_date);
        $this->assertEquals($this->newData['estimated_amount'], $quotation->estimated_amount);
        $this->assertEquals($this->newData['estimated_subject'], $quotation->estimated_subject);
        $this->assertEquals($this->newData['content'][0], $workingDetail->content);
        $this->assertEquals($this->newData['unit_price'][0], $workingDetail->unit_price);
        $this->assertEquals($this->newData['quantity'][0], $workingDetail->quantity);
        $this->assertEquals($this->newData['part_number'][0], $quotation->parts[0]->number);
        $this->assertEquals($this->newData['part_name'][0], $quotation->parts[0]->name);
        $this->assertEquals($this->newData['part_unit_price'][0], $quotation->parts[0]->unit_price);
        $this->assertEquals($this->newData['part_quantity'][0], $quotation->parts[0]->quantity);
        $this->assertEquals($this->newData['expense_detail_id'][0], $quotation->expenses[0]->expense_detail_id);
        $this->assertEquals($this->newData['expense_unit_price'][0], $quotation->expenses[0]->unit_price);
        $this->assertEquals($this->newData['expense_quantity'][0], $quotation->expenses[0]->quantity);
    }

    #public function testPutWithoutCustomer()
    #{
    #    $this->newData['customer_name'] = "";
    #    $response = $this->followingRedirects()->from($this->url)->put($this->url, $this->newData);
    #    $response->assertSee($this->newData['expense_quantity'][0]);
    #}


   # public function testRequired()
   # {
   #     $response = $this->followingRedirects()->from($this->url)->put($this->url, []);
   #     $response->assertSee("ユーザコードは必ず指定してください。");
   #     $response->assertSee("フリガナは必ず指定してください。");
   #     $response->assertSee("氏名は必ず指定してください。");
   #     $response->assertSee("郵便番号は必ず指定してください。");
   #     $response->assertSee("住所1は必ず指定してください。");
   #     $response->assertSee("住所2は必ず指定してください。");
   #     $response->assertSee("自宅TELは必ず指定してください。");
   #     $response->assertSee("携帯TELは必ず指定してください。");
   #     $response->assertSee("会社名は必ず指定してください。");
   #     $response->assertSee("会社TELは必ず指定してください。");
   #     $response->assertSee("登録日時は必ず指定してください。");
   # }
}
