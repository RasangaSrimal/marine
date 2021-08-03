<?php

namespace Tests\Feature;

use App\Models\ShipSpecialName;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipSpecialNameEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->shipSpecialName = ShipSpecialName::create([
            'order' => mt_rand(0, 10),
            'name' => str_random(5),
        ]);
        $this->url = "/name/ship_special_name/{$this->shipSpecialName->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("氏名");
        $response->assertSee("/name/ship_special_name");
        $response->assertSee($this->shipSpecialName['name']);
        $response->assertSee($this->shipSpecialName['order']);
    }
}
