<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesCategoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/sales_category';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("コード");
    }
}
