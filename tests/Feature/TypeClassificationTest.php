<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TypeClassificationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/type_classification';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("種別コート");
    }
}
