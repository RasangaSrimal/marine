<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->company = $this->createCompany();
        $this->borrower = $this->createCustomer(['name' => 'borrower1']);
        $this->owner = $this->createCustomer(['company_id' => $this->company->id]);
        $this->ship = $this->createShip();
        $this->ship->customers()->attach($this->owner, ['is_owner' => 1]);
        $this->ship->customers()->attach($this->borrower, ['is_borrower' => 1]);
        $this->shipWithoutBorrower = $this->createShip();
        $this->url = '/ship';
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("船舶検査一覧");
        $response->assertSee("/ship/{$this->ship->id}/edit");
        $response->assertSee($this->ship['name']);
        $response->assertSee($this->shipWithoutBorrower['name']);
        $response->assertSee($this->ship->owner['name']);
        $response->assertSee($this->ship['certificate_num']);
        $response->assertSee($this->ship['inspection_num']);
        $response->assertSee($this->ship->borrower['name']);
        $response->assertSee($this->ship['delivery_date']);
        $response->assertSee($this->ship->use['usage_name']);
        $response->assertSee($this->ship->navigationArea['area_name']);
    }

    public function testSearchCompany()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url."?company=BAD");
        $response->assertDontSee($this->ship['name']);
    }

    public function testSearchName()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url."?name=BAD");
        $response->assertDontSee($this->ship['name']);
    }

    public function testSearchId()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url."?id=BAD");
        $response->assertDontSee($this->ship['name']);
    }

    public function testSearchOwner()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url."?owner=BAD");
        $response->assertDontSee($this->ship['name']);
    }

    public function testSearchAll()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url . '?' . http_build_query([
            'name' => $this->ship->name,
            'owner' => $this->owner->name, 
            'id' => $this->ship->id,
            'company' => $this->company->name,
        ]));
        $response->assertSee($this->ship['name']);
    }
}
