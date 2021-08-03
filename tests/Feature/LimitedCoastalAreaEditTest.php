<?php

namespace Tests\Feature;

use App\Models\LimitedCoastalArea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LimitedCoastalAreaEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->limitedCosArea = LimitedCoastalArea::create([
            'order' => mt_rand(0, 10),
            'area_name' => str_random(5),
            'code' => str_random(5),
        ]);
        $this->url = "/name/limited_coastal_area/{$this->limitedCosArea->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("コード");
        $response->assertSee("/name/limited_coastal_area");
        $response->assertSee($this->limitedCosArea['area_name']);
        $response->assertSee($this->limitedCosArea['code']);
        $response->assertSee($this->limitedCosArea['order']);
    }
}
