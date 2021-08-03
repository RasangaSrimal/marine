<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testGetPage()
    {
        $response = $this->get('/');
        $response->assertRedirect("/dashboard");
    }
}
