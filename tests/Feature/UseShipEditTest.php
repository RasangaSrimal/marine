<?php

namespace Tests\Feature;

use App\Models\UseShip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UseShipEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->useShip = UseShip::create([
            'order' => mt_rand(0, 10),
            'usage_name' => str_random(5),
        ]);
        $this->url = "/name/use_ship/{$this->useShip->id}/edit";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("用途名");
        $response->assertSee("/name/use_ship");
        $response->assertSee($this->useShip['usage_name']);
        $response->assertSee($this->useShip['order']);
    }
}
