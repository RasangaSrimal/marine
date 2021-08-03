<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobTitleTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/job_title';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("役生名");
    }
}
