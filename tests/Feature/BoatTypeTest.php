<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoatTypeTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $ship = $this->createShip($customer);
        $this->boat_type = $this->createBoatTypeMaster($ship);
        $this->url = '/boat';
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("/boat/{$this->boat_type["id"]}/edit");
        $response->assertSee("艇種マスタ");
        $response->assertSee($this->boat_type['boat_type_selection']);
        $response->assertSee($this->boat_type['extracted_data']);
        $response->assertSee($this->boat_type['name']);
        $response->assertSee($this->boat_type['product_code']);
        $response->assertSee($this->boat_type['bu_classification']);
        $response->assertSee($this->boat_type['class']);
    }
}
