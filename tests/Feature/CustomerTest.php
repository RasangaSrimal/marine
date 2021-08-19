<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Ship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->ship = $this->createShip();
        $this->customer->ships()->attach($this->ship);
        $this->url = '/customer';
    }

    #public function testNotLoggedIn()
    #{
    #    Auth::logout();
    #    $response = $this->get($this->url);
    #    $response->assertRedirect("/login");
    #}

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("顧客一覧");
        $response->assertSee("/customer/{$this->customer->id}/edit");
        $response->assertSee("/customer/create");
        $response->assertSee($this->customer['name']);
        $response->assertSee($this->customer['kana']);
        $response->assertSee($this->customer['company']['name']);
        $response->assertSee($this->customer->ship['boatTypeMaster']['name']);
        $response->assertSee($this->customer->ship['name']);
        $response->assertSee($this->customer->ship['engine']);
        $response->assertSee($this->customer->ship['location']);
    }

    public function testSearchBoatType()
    {
        $response = $this->get($this->url.'?boat_type_name=BAD');
        $response->assertDontSee($this->customer['name']);
    }

    public function testSearchCustomer()
    {
        $response = $this->get($this->url."?name=BAD");
        $response->assertDontSee($this->customer['name']);
    }

    public function testSearchShip()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url."?ship_name=BAD");
        $response->assertDontSee($this->customer['name']);
    }

    public function testSearchCompany()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url."?company=BAD");
        $response->assertDontSee($this->customer['name']);
    }

    public function testSearchAll()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url . '?' . http_build_query([
            'ship_name' => $this->ship->name,
            'boat_type_name' => $this->ship->boatTypeMaster->name, 
            'name' => $this->customer->name,
            'company' => $this->customer->company->name,
        ]));
        $response->assertSee($this->customer['name']);
    }
}
