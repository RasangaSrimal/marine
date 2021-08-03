<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BaseMasterTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->base = $this->createBase();
        $this->url = '/base';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("自拠点マスタ");
        $response->assertSee($this->base['store_code']);
        $response->assertSee($this->base['store_name1']);
        $response->assertSee($this->base['store_name2']);
        $response->assertSee($this->base['address']);
        $response->assertSee($this->base['postal_code']);
        $response->assertSee($this->base['tel']);
        $response->assertSee($this->base['fax']);
        $response->assertSee($this->base['bank_name']);
        $response->assertSee($this->base['account_name']);
        $response->assertSee($this->base['account_number']);
    }
}
