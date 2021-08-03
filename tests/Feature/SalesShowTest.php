<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SalesShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $this->sales = $this->createSales($customer);
        $this->url = "/sales/{$this->sales->id}";
        $this->sales->expenses()->create([
            'quantity' => 5,
            'unit_price' => 10,            
        ]);
    }

    public function testGetPdf()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        
        $response->assertsee(">5<", false);
        $response->assertsee(">10<", false);
        $response->assertsee(50);
    }
}
