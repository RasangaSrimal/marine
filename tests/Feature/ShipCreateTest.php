<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Ship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipCreateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->borrower = $this->createCustomer();
        $this->owner = $this->createCustomer(); 
        $this->data = [
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
        $this->url = "/ship/create";
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee($this->owner['name']);
    }

    public function testCreate()
    {
        $this->withoutExceptionHandling();
        $response = $this->put($this->url, $this->data);
        $ship = Ship::firstOrFail();
        $response->assertRedirect("/ship");
        $this->assertEquals($this->data['name'], $ship->name);
        $this->assertEquals($this->data['owner_id'], $ship->owner->id);
        $this->assertEquals($this->data['borrower_id'], $ship->borrower->id);
        $this->assertEquals($this->data['gross_register_tonn'], $ship->gross_register_tonn);
        $this->assertEquals($this->data['inspection_num'], $ship->inspection_num);
        $this->assertEquals($this->data['registration_port'], $ship->registration_port);
        $this->assertEquals($this->data['length'], $ship->length);
        $this->assertEquals($this->data['passengers_max_num'], $ship->passengers_max_num);
        $this->assertEquals($this->data['other_passengers_max_num'], $ship->other_passengers_max_num);
        $this->assertEquals($this->data['sailors_max_num'], $ship->sailors_max_num);
        $this->assertEquals($this->data['registered_date'], $ship->registered_date);
        $this->assertEquals($this->data['inspection_id'], $ship->inspection_id);
        $this->assertEquals($this->data['delivery_date'], $ship->delivery_date);
        $this->assertEquals($this->data['other_navigational_conditions'], $ship->other_navigational_conditions);
    }

    public function testCreateWithoutBoatType()
    {
        $this->withoutExceptionHandling();
        unset($this->data['boat_type_master_id']);
        $response = $this->put($this->url, $this->data);
        $ship = Ship::first();
        $this->assertEquals($this->data['name'], $ship->name);
    }

    public function testCreateWithExistingOwnerAndBorrower()
    {
        $this->withoutExceptionHandling();
        $owner = $this->createCustomer(); 
        $borrower = $this->createCustomer(); 
        $this->data['owner_id'] = $owner->id;
        $this->data['borrower_id'] = $borrower->id;
        $response = $this->put($this->url, $this->data);
        $ship = Ship::where('name', $this->data['name'])->firstOrFail();
        $ship = $ship->fresh();
        $this->assertEquals($ship->owner->id, $owner['id']);
        $this->assertEquals($ship->borrower->id, $borrower['id']);
    }

    public function testCreateWithNewOwnerAndBorrower()
    {
        $this->withoutExceptionHandling();
        unset($this->data['owner_id']);
        unset($this->data['borrower_id']);
        $this->data['owner'] = ['name' => 'newOwner'];
        $this->data['borrower'] = ['name' => 'newBorrower'];
        $response = $this->put($this->url, $this->data);
        $ship = Ship::where('name', $this->data['name'])->firstOrFail();
        $ship = $ship->fresh();
        $this->assertEquals('newOwner', $ship->owner->name);
        $this->assertEquals('newBorrower', $ship->borrower->name);
    }

    Public function testCreateWithoutOwnerOrBorrower()
    {
        $this->withoutExceptionHandling();
        unset($this->data['owner_id']);
        unset($this->data['borrower_id']);
        $response = $this->put($this->url, $this->data);
        $ship = Ship::where('name', $this->data['name'])->firstOrFail();
        $this->assertEquals($this->data['name'], $ship->name);
    }

    #public function testRequired()
    #{
    #    $response = $this->followingRedirects()->from($this->url)->put($this->url, []);
    #    $response->assertSee("氏名は必ず指定してください。");
    #    $response->assertSee("船舶検査番号は必ず指定してください。");
    #    $response->assertSee("船籍港は必ず指定してください。");
    #    $response->assertSee("総トン数は必ず指定してください。");
    #    $response->assertSee("船舶の長さは必ず指定してください。");
    #    $response->assertSee("所有者は必ず指定してください。");
    #    $response->assertSee("借入人は必ず指定してください。");
    #    $response->assertSee("旅客は必ず指定してください。");
    #    $response->assertSee("船員は必ず指定してください。");
    #    $response->assertSee("その他の乗船者は必ず指定してください。");
    #    $response->assertSee("計は必ず指定してください。");
    #    $response->assertSee("初回検査発行は必ず指定してください。");
    #    $response->assertSee("郵便番号は必ず指定してください。");
    #    $response->assertSee("住所1は必ず指定してください。");
    #    $response->assertSee("住所2は必ず指定してください。");
    #    $response->assertSee("TELは必ず指定してください。");
    #    $response->assertSee("船舶検査IDは必ず指定してください。");
    #    $response->assertSee("登録日時は必ず指定してください。");
    #    $response->assertSee("その他の航行 上の条件は必ず指定してください。");
    #}
}
