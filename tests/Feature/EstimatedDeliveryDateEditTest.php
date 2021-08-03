<?php

namespace Tests\Feature;

use App\Models\EstimatedDeliveryDate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstimatedDeliveryDateEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->estiDeliDate = EstimatedDeliveryDate::create([
            'order' => mt_rand(0, 10),
            'delivery_date' => str_random(5),
        ]);
        $this->url = "/name/estimate_delivery_date/{$this->estiDeliDate->id}/edit";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("交付日");
        $response->assertSee("/name/estimate_delivery_date");
        $response->assertSee($this->estiDeliDate['delivery_date']);
        $response->assertSee($this->estiDeliDate['order']);
    }
}
