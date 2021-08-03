<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuotationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $customer = $this->createCustomer();
        $ship = $this->createShip($customer);
        $this->quotation = $this->createQuotation($customer);
        $this->url = '/quotation';
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("整備見積一覧");
        $response->assertSee("/quotation/{$this->quotation->id}/edit");
        $response->assertSee("/quotation/{$this->quotation->id}");
        $response->assertSee($this->quotation->customer['name']);
        $response->assertSee($this->quotation->company['name']);
        $response->assertSee($this->quotation->ship['boatTypeMaster']['name']);
        $response->assertSee($this->quotation->ship['name']);
        $response->assertSee($this->quotation['estimated_amount']);
        $response->assertSee($this->quotation['estimated_subject']);
        $response->assertSee($this->quotation['created_date']);
    }

    public function testSearchBoatType()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url.'?boat_type_name=BAD');
        $response->assertDontSee($this->quotation->customer['name']);
    }

    public function testSearchId()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url.'?id=BAD');
        $response->assertDontSee($this->quotation->customer['name']);
    }

    public function testSearchCustomerName()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url.'?name=BAD');
        $response->assertDontSee($this->quotation->customer['name']);
    }

    public function testSearchShipName()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url.'?ship_name=BAD');
        $response->assertDontSee($this->quotation->customer['name']);
    }

    public function testSearchAll()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url . '?' . http_build_query([
            'ship_name' => $this->quotation->ship->name,
            'boat_type_name' => $this->quotation->ship->boatTypeMaster->name, 
            'name' => $this->quotation->customer->name,
            'company' => $this->quotation->customer->company,
        ]));
        $response->assertSee($this->quotation->customer['name']);
    }
}
