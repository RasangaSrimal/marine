<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuotationShowTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $this->createShip($customer);
        $this->quotation = $this->createQuotation($customer);
        $this->quotation->workingDetails()->create([
            'content' => 'working',
            'unit_price' => 100,
            'quantity' => 20, 
        ]);
        $this->quotation->parts()->create([
            'unit_price' => 12,
            'quantity' => 5, 
            'number' => 'A-27',
            'name' => 'wheel motor',
        ]);
        $this->quotation->expenses()->create([
            'quantity' => 6,
            'unit_price' => 10,            
        ]);
        $this->url = "/quotation/{$this->quotation->id}";
    }

    public function testGetPdf()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);

        $response->assertSee($this->quotation->customer->name);
        $response->assertSee($this->quotation->customer->company);
        
        $response->assertSee('working');
        $response->assertSee(20);
        $response->assertSee(100);
        $response->assertSee(2000);

        $response->assertSee(">12<", false);
        $response->assertSee(">5　個<", false);
        $response->assertSee('A-27');
        $response->assertSee('wheel motor');
        $response->assertSee(">60<", false);

        $response->assertDontSee(233.2); // (100 * 20 + 12 * 5 + 6 * 10) * 0.11
        $response->assertSee(233);
        $response->assertDontSee(2353.2); // (100 * 20 + 12 * 5 + 6 * 10) * 1.11
        $response->assertSee(2353);
        
        $response->assertSee(">6　式<", false);
        $response->assertSee(">10<", false);
        $response->assertSee(50);
    }
}
