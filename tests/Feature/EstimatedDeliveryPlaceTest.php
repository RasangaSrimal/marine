<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstimatedDeliveryPlaceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/estimated_delivery_place';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("受渡場所語句");
    }
}
