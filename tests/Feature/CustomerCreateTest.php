<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCreateTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->data = [
            'user_code' => str_random(5),
            'kana' => str_random(5),
            'customer' => [
                'name' => 'cusTOmer nAMe 3',
                'postal_code' => str_random(5),
                'address1' => str_random(5),
                'address2' => str_random(5),
                'tel' => str_random(5),
            ],
            'home_tel' => str_random(5),
            'company' => [
                'name' => 'coMpany nAme 1',
                'postal_code' => str_random(5),
                'address1' => str_random(5),
                'address2' => str_random(5),
                'tel' => str_random(5),
            ],
            'dm_issuance_cla' => str_random(5),
            'registered_date' => str_random(5),
            'sales_in_charge_id' => $this->createSalesInCharge()->id,
            'job_title_id' => $this->createJobTitle()->id,
        ];
        $this->url = "/customer/create";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
    }

    public function testCustomerIsRegistered()
    {
        $this->withoutExceptionHandling();
        $response = $this->put($this->url, $this->data);
        $customer = Customer::where('user_code', $this->data['user_code'])->firstOrFail();
        $this->assertEquals($this->data['user_code'], $customer['user_code']);
        $this->assertEquals($this->data['kana'], $customer['kana']);
        $this->assertEquals($this->data['customer']['name'], $customer['name']);
        $this->assertEquals($this->data['customer']['postal_code'], $customer['postal_code']);
        $this->assertEquals($this->data['customer']['address1'], $customer['address1']);
        $this->assertEquals($this->data['customer']['address2'], $customer['address2']);
        $this->assertEquals($this->data['customer']['tel'], $customer['tel']);
        $this->assertEquals($this->data['home_tel'], $customer['home_tel']);
        $this->assertEquals($this->data['dm_issuance_cla'], $customer['dm_issuance_cla']);
        $this->assertEquals($this->data['registered_date'], $customer['registered_date']);
        $this->assertFalse($customer->is_company);

        $company = $customer->company;
        $this->assertEquals($this->data['company']['name'], $company['name']);
        $this->assertEquals($this->data['company']['postal_code'], $company['postal_code']);
        $this->assertEquals($this->data['company']['address1'], $company['address1']);
        $this->assertEquals($this->data['company']['address2'], $company['address2']);
        $this->assertEquals($this->data['company']['tel'], $company['tel']);
        $this->assertTrue($company->is_company);
        $response->assertRedirect("/customer");
    }

    public function testCreateWithExistingCompany()
    {
        $this->withoutExceptionHandling();
        $company = $this->createCompany(); 
        unset($this->data['company']);
        $this->data['company_id'] = $company->id;
        $response = $this->put($this->url, $this->data);
        $customer = Customer::where('user_code', $this->data['user_code'])->firstOrFail();
        $customer = $customer->fresh();
        $this->assertEquals($company->id, $customer['company_id']);

    }
    public function testRequired()
    {
        $response = $this->followingRedirects()->from($this->url)->put($this->url, []);
        $response->assertSee("氏名は必ず指定してください。");
    #    $response->assertSee("ユーザコードは必ず指定してください。");
    #    #$response->assertSee("フリガナは必ず指定してください。");
    #    $response->assertSee("郵便番号は必ず指定してください。");
    #    $response->assertSee("住所1は必ず指定してください。");
    #    $response->assertSee("住所2は必ず指定してください。");
    #    $response->assertSee("自宅TELは必ず指定してください。");
    #    $response->assertSee("携帯TELは必ず指定してください。");
    #    #$response->assertSee("会社名は必ず指定してください。");
    #    $response->assertSee("会社TELは必ず指定してください。");
    #    $response->assertSee("登録日時は必ず指定してください。");
    }
}

