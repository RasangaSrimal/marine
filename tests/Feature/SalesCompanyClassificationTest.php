<?php

namespace Tests\Feature;

use App\Models\SalesCompanyClassification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesCompanyClassificationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/sales_company_classification';
        $this->salesCompany = SalesCompanyClassification::create([
            'key' => str_random(5),
            'order' => str_random(5),
            'name' => str_random(5),
        ]);
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("カテゴリ");
        $response->assertSee("/name/sales_company_classification/{$this->salesCompany->id}/edit");
        $response->assertSee($this->salesCompany['name']);
        $response->assertSee($this->salesCompany['key']);
        $response->assertSee($this->salesCompany['order']);
    }

    public function testPost() 
    {
        $data = [
            'key' => str_random(5),
            'sales_company_name' => str_random(5),
            'order' => rand(),
        ];
        $this->post($this->url, $data);
        $obj = SalesCompanyClassification::where(['name' => $data['sales_company_name']])->first();
        $this->assertEquals($data['key'], $obj->key);
    }
}
