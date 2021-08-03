<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipSpecialNameTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/ship_special_name';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("氏名");
    }
}
