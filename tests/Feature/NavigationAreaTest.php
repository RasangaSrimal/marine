<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavigationAreaTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/navigation_area';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("区域名");
    }
}
