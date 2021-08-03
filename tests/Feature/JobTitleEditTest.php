<?php

namespace Tests\Feature;

use App\Models\JobTitle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobTitleEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->jobTitle = JobTitle::create([
            'order' => mt_rand(0, 10),
            'role_name' => str_random(5),
        ]);
        $this->url = "/name/job_title/{$this->jobTitle->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("役生名");
        $response->assertSee("/name/job_title");
        $response->assertSee($this->jobTitle['role_name']);
        $response->assertSee($this->jobTitle['order']);
    }
}
