<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstimatedDeliveryDateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/estimate_delivery_date';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("交付日");
    }
}
