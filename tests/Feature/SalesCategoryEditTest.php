<?php

namespace Tests\Feature;

use App\Models\SalesCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesCategoryEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->salesCategory = SalesCategory::create([
            'order' => mt_rand(0, 10),
            'sales_details' => str_random(5),
            'code' => str_random(5),
        ]);
        $this->url = "/name/sales_category/{$this->salesCategory->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("コード");
        $response->assertSee("/name/sales_category");
        $response->assertSee($this->salesCategory['code']);
        $response->assertSee($this->salesCategory['sales_details']);
        $response->assertSee($this->salesCategory['order']);
    }
}
