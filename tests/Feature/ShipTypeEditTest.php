<?php

namespace Tests\Feature;

use App\Models\ShipType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipTypeEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->shipType = ShipType::create([
            'order' => mt_rand(0, 10),
            'ship_type' => str_random(5),
        ]);
        $this->url = "/name/ship_type/{$this->shipType->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("船種");
        $response->assertSee("/name/ship_type");
        $response->assertSee($this->shipType['ship_type']);
        $response->assertSee($this->shipType['order']);
    }
}
