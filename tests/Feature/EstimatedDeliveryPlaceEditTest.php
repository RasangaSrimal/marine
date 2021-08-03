<?php

namespace Tests\Feature;

use App\Models\EstimatedDeliveryPlace;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstimatedDeliveryPlaceEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->estiDeliPlace = EstimatedDeliveryPlace::create([
            'order' => mt_rand(0, 10),
            'delivery_place' => str_random(5),
        ]);
        $this->url = "/name/estimated_delivery_place/{$this->estiDeliPlace->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("受渡場所語句");
        $response->assertSee("/name/estimated_delivery_place");
        $response->assertSee($this->estiDeliPlace['delivery_place']);
        $response->assertSee($this->estiDeliPlace['order']);
    }
}
