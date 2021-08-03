<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PostalCode;

class PostalcodeTest extends TestCase
{
    public function testGetPage()
    {
        PostalCode::create([
            'postal_code' => '5620014',
            'pref_name' => '大阪府',
            'city_name' => '箕面市',
            'town_name' => '萱野',
        ]);
        $response = $this->get('/api/postal/code/5620014');
        $response ->assertJson(['pref_name' => '大阪府']);
    }
}
