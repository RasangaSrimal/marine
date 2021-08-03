<?php

namespace Tests\Feature;

use App\Models\SalesCompanyClassification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesCompanyClassificationCreateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/sales_company_classification/create';
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("保存");
        $response->assertSee("/name/sales_company_classification");
    }
}
