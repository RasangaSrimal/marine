<?php

namespace Tests\Feature;

use App\Models\Ship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->customer = $this->createCustomer();
        $this->borrower = $this->createCustomer();
        $this->owner = $this->createCustomer();
        $this->ship = $this->createShip();
        $this->ship->customers()->attach($this->borrower, ['is_borrower' => true]);
        $this->ship->customers()->attach($this->owner, ['is_owner' => true]);
        $this->newData = [
            'name' => str_random(5),
            'owner_id' => $this->owner->id,
            'borrower_id' => $this->borrower->id,
            'certificate_num' => str_random(5),
            'inspection_num' => str_random(5),
            'delivery_date' => str_random(5),
            'gross_register_tonn' => 1000,
            'model' => str_random(5),
            'machine_num' => str_random(5),
            'registration_port' => str_random(5),
            'length' => 200,
            'boat_no' => str_random(5),
            'passengers_max_num' => str_random(5),
            'other_passengers_max_num' => str_random(5),
            'sailors_max_num' => str_random(5),
            'registered_date' => str_random(5),
            'inspection_id' => str_random(5),
            'other_navigational_conditions' => str_random(5),
            'engine' => str_random(5),
            'engine_num_r' => str_random(5),
            'engine_num_l' => str_random(5),
            'location' => str_random(5),
            'ship_type_id' => $this->createShipType()->id,
            'boat_type_master_id' => $this->createBoatTypeMaster()->id,
            'use_id' => $this->createUseShip()->id,
            'navigation_area_id' => $this->createNavigationArea()->id,
        ];
        $this->url = "/ship/{$this->ship->id}/edit";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("船舶検査明細");
        $response->assertSee($this->ship['name']);
        $response->assertSee($this->ship['inspection_num']);
        $response->assertSee($this->ship->navigationArea['area_name']);
        $response->assertSee($this->ship->useShip['usage_name']);
        $response->assertSee($this->ship['gross_register_tonn']);
        $response->assertSee($this->ship['registration_port']);
        $response->assertSee($this->ship['length']);
        $response->assertSee($this->ship['passengers_max_num']);
        $response->assertSee($this->ship['other_passengers_max_num']);
        $response->assertSee($this->ship['sailors_max_num']);
        $response->assertSee($this->ship['registered_date']);
        $response->assertSee($this->ship['inspection_id']);
        $response->assertSee($this->ship['delivery_date']);
        $response->assertSee($this->ship['other_navigational_conditions']);
        $response->assertSee($this->ship->shipType['ship_type']);

        $response->assertSee($this->ship->owner['name']);
        $response->assertSee($this->ship->owner['postal_code']);
        $response->assertSee($this->ship->owner['address1']);
        $response->assertSee($this->ship->owner['address2']);
        $response->assertSee($this->ship->owner['tel']);

        $response->assertSee($this->ship->borrower['name']);
        $response->assertSee($this->ship->borrower['postal_code']);
        $response->assertSee($this->ship->borrower['address1']);
        $response->assertSee($this->ship->borrower['address2']);
        $response->assertSee($this->ship->borrower['tel']);
    }

    public function testPut()
    {
        $this->withoutExceptionHandling();
        $response = $this->put($this->url, $this->newData);
        $ship = Ship::firstOrFail();
        $response->assertRedirect("/ship");
        $this->assertEquals($this->newData['name'], $ship->name);
        $this->assertEquals($this->newData['owner_id'], $ship->owner->id);
        $this->assertEquals($this->newData['borrower_id'], $ship->borrower->id);
        $this->assertEquals($this->newData['gross_register_tonn'], $ship->gross_register_tonn);
        $this->assertEquals($this->newData['inspection_num'], $ship->inspection_num);
        $this->assertEquals($this->newData['registration_port'], $ship->registration_port);
        $this->assertEquals($this->newData['length'], $ship->length);
        $this->assertEquals($this->newData['passengers_max_num'], $ship->passengers_max_num);
        $this->assertEquals($this->newData['other_passengers_max_num'], $ship->other_passengers_max_num);
        $this->assertEquals($this->newData['sailors_max_num'], $ship->sailors_max_num);
        $this->assertEquals($this->newData['registered_date'], $ship->registered_date);
        $this->assertEquals($this->newData['inspection_id'], $ship->inspection_id);
        $this->assertEquals($this->newData['delivery_date'], $ship->delivery_date);
        $this->assertEquals($this->newData['other_navigational_conditions'], $ship->other_navigational_conditions);
    }

    public function testRequired()
    {
        $response = $this->followingRedirects()->from($this->url)->put($this->url, []);
        $response->assertSee("氏名は必ず指定してください。");
    }

    public function testCancel()
    {
        $response = $this->put($this->url, array_merge($this->newData, ['ship' => 'newName']));
        $response->assertDontSee("newName");
    }

    public function testChangeOwnerToANewUserAndABorrower()
    {
        $this->withoutExceptionHandling();
        $this->newData['owner_id'] = "";
        $this->newData['borrower_id'] = $this->createCustomer()->id;
        $this->newData['owner'] = ['name' => 'newOwner'];
        $response = $this->put($this->url, $this->newData);
        $ship = $this->ship->refresh();
        $this->assertNotEquals($this->owner['name'], $ship->owner['name']);
        $this->assertEquals('newOwner', $ship->owner['name']);
        $this->assertEquals($this->newData['borrower_id'], $ship->borrower['id']);
    }
}
