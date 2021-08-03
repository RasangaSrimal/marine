<?php

namespace Tests\Feature;

use App\Models\ServiceInCharge;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceInChargeEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->serviceInCharge = ServiceInCharge::create([
            'order' => mt_rand(0, 10),
            'name' => str_random(5),
        ]);
        $this->url = "/name/service_in_charge/{$this->serviceInCharge->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("担当サービス名");
        $response->assertSee("/name/service_in_charge");
        $response->assertSee($this->serviceInCharge['name']);
        $response->assertSee($this->serviceInCharge['order']);
    }
}
