<?php

namespace Tests\Feature;

use App\Models\SalesCompanyClassification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesCompanyClassificationEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->salesCompany = SalesCompanyClassification::create([
            'key' => str_random(5),
            'order' => str_random(5),
            'name' => str_random(5),
        ]);
        $this->url = "/name/sales_company_classification/{$this->salesCompany->id}/edit";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("カテゴリ");
        $response->assertSee("/name/sales_company_classification");
        $response->assertSee($this->salesCompany['name']);
        $response->assertSee($this->salesCompany['key']);
        $response->assertSee($this->salesCompany['order']);
    }
}
