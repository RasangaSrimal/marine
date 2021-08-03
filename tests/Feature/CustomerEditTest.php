<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerEditTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->customer = $this->createCustomer();
        $this->newData = [
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
        $this->url = "/customer/{$this->customer->id}/edit";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("顧客明細");
        $response->assertSee($this->customer['user_code']);
        $response->assertSee($this->customer['kana']);
        $response->assertSee($this->customer['name']);
        $response->assertSee($this->customer['user_postal_code']);
        $response->assertSee($this->customer['user_address1']);
        $response->assertSee($this->customer['user_address2']);
        $response->assertSee($this->customer['home_tel']);
        $response->assertSee($this->customer['mobile_tel']);
        $response->assertSee($this->customer['company']);
        $response->assertSee($this->customer['company_postal_code']);
        $response->assertSee($this->customer['company_address1']);
        $response->assertSee($this->customer['company_address2']);
        $response->assertSee($this->customer['company_tel']);
        $response->assertSee($this->customer['registered_date']);
        $response->assertSee($this->customer->job_title['role_name']);
        $response->assertSee($this->customer->sales_in_charge['name']);
        $response->assertSee("/sales/create");
    }

    public function testPut()
    {
        $this->withoutExceptionHandling();
        $response = $this->put($this->url, $this->newData);
        $customer = Customer::firstOrFail();
        $response->assertSee("/customer");
        $this->assertEquals($this->newData['user_code'], $customer->user_code);
        $this->assertEquals($this->newData['kana'], $customer->kana);
        $this->assertEquals($this->newData['customer']['name'], $customer->name);
        $this->assertEquals($this->newData['customer']['postal_code'], $customer->postal_code);
        $this->assertEquals($this->newData['customer']['address1'], $customer->address1);
        $this->assertEquals($this->newData['customer']['address2'], $customer->address2);
        $this->assertEquals($this->newData['customer']['tel'], $customer->tel);
        $this->assertEquals($this->newData['home_tel'], $customer->home_tel);

        $company = $customer->company;
        $this->assertEquals($this->newData['company']['name'], $company->name);
        $this->assertEquals($this->newData['company']['postal_code'], $company->postal_code);
        $this->assertEquals($this->newData['company']['address1'], $company->address1);
        $this->assertEquals($this->newData['company']['address2'], $company->address2);
        $this->assertEquals($this->newData['company']['tel'], $company->tel);
        $this->assertEquals($this->newData['dm_issuance_cla'], $customer->dm_issuance_cla);
        $this->assertEquals($this->newData['registered_date'], $customer->registered_date);
    }

    public function testCancel()
    {
        $this->withoutExceptionHandling();
        $response = $this->put($this->url, array_merge($this->newData, ['kana' => 'newKana']));
        $response->assertSee("/customer");
        $response->assertDontSee('newKana');
    }

    public function testUpdateWithExistingCompany()
    {
        $this->withoutExceptionHandling();
        $company = $this->createCompany(); 

        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee($company['name']);
        $response->assertSee($company['postal_code']);
        $response->assertSee($company['address1']);
        $response->assertSee($company['address2']);
        $response->assertSee($company['tel']);

        unset($this->newData['company']);
        $this->newData['company_id'] = $company->id;
        $response = $this->put($this->url, $this->newData);
        $customer = $this->customer->fresh();
        $this->assertEquals($company->id, $customer['company_id']);

    }

    public function testUpdateWithoutCompany()
    {
        $this->withoutExceptionHandling();
        $this->newData['company']['name'] = "";
        $this->newData['company_id'] = null;
        $response = $this->put($this->url, $this->newData);
        $customer = $this->customer->fresh();
        $this->assertNull($customer['company_id']);
    
    }

    #public function testRequired()
    #{
    #    $response = $this->followingRedirects()->from($this->url)->put($this->url, []);
    #    $response->assertSee("ユーザコードは必ず指定してください。");
    #    $response->assertSee("フリガナは必ず指定してください。");
    #    $response->assertSee("氏名は必ず指定してください。");
    #    $response->assertSee("郵便番号は必ず指定してください。");
    #    $response->assertSee("住所1は必ず指定してください。");
    #    $response->assertSee("住所2は必ず指定してください。");
    #    $response->assertSee("自宅TELは必ず指定してください。");
    #    $response->assertSee("携帯TELは必ず指定してください。");
    #    $response->assertSee("会社名は必ず指定してください。");
    #    $response->assertSee("会社TELは必ず指定してください。");
    #    $response->assertSee("登録日時は必ず指定してください。");
    #}
}
