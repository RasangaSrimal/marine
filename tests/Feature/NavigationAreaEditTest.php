<?php

namespace Tests\Feature;

use App\Models\NavigationArea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavigationAreaEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->naviArea = NavigationArea::create([
            'order' => mt_rand(0, 10),
            'area_name' => str_random(5),
        ]);
        $this->url = "/name/navigation_area/{$this->naviArea->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("区域名");
        $response->assertSee("/name/navigation_area");
        $response->assertSee($this->naviArea['area_name']);
        $response->assertSee($this->naviArea['order']);
    }
}
