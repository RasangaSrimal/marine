<?php

namespace Tests\Feature;

use App\Models\SalesInCharge;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesInChargeEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->salesInCharge = SalesInCharge::create([
            'order' => mt_rand(0, 10),
            'name' => str_random(5),
        ]);
        $this->url = "/name/sales_in_charge/{$this->salesInCharge->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("担当セールス");
        $response->assertSee("/name/sales_in_charge");
        $response->assertSee($this->salesInCharge['name']);
        $response->assertSee($this->salesInCharge['order']);
    }
}
