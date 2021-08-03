<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EngineModelListTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/engine_model_list';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("機種選択");
    }
}
