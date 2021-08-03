<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LimitedCoastalAreaTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/limited_coastal_area';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("コード");
    }
}
