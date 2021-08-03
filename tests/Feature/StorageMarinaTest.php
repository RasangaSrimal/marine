<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StorageMarinaTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/storage_marina';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("保管コード");
    }
}
