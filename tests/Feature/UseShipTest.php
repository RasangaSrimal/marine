<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UseShipTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/use_ship';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("用途名");
    }
}
