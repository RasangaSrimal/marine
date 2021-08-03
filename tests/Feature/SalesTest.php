<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $this->createShip($customer);
        $this->sales = $this->createSales($customer);
        $this->url = '/sales';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("整備売上伝票一覧");
        $response->assertSee("/sales/{$this->sales->id}/edit");
        $response->assertSee("/sales/{$this->sales->id}");
        $response->assertSee($this->sales->customer['name']);        
        $response->assertSee($this->sales->company['name']);        
        $response->assertSee($this->sales->ship['boatTypeMaster']['name']);
        $response->assertSee($this->sales->ship['name']);        
        $response->assertSee($this->sales['request_details']);        
        $response->assertSee($this->sales['request_amount']);        
        $response->assertSee($this->sales['created_date']);        
    }
    
    public function testSearchBoatType()
    {
        $response = $this->get($this->url.'?boat_type_name=BAD');
        $response->assertDontSee($this->sales->customer['name']);
    }

    public function testSearchID()
    {
        $response = $this->get($this->url.'?id=BAD');
        $response->assertDontSee($this->sales->customer['name']);
    }

    public function testSearchCustomerName()
    {
        $response = $this->get($this->url.'?customer_name=BAD');
        $response->assertDontSee($this->sales->customer['name']);
    }

    public function testSearchShipName()
    {
        $response = $this->get($this->url.'?ship_name=BAD');
        $response->assertDontSee($this->sales->customer['name']);
    }

    public function testSearchAll()
    {
        $response = $this->get($this->url."?ship_name={$this->sales->ship['name']}");
        $response->assertSee($this->sales->customer['name']);
    }
}
