<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Auth::logout();
        $this->data = [
            'name' => str_random(5),
            'email' => str_random(5) . '@example.com',
            'password' => str_random(5),
        ];
        $user = \App\Models\User::create($this->data);
        $user->password = Hash::make($this->data['password']);
        $user->save();
        $this->url = '/login';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
    }

    public function testPost()
    {
        $response = $this->from($this->url)->post($this->url, $this->data);
        $response->assertRedirect("/customer");
    }
}
