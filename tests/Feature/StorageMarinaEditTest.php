<?php

namespace Tests\Feature;

use App\Models\StorageMarina;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StorageMarinaEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->storageMarina = StorageMarina::create([
            'order' => mt_rand(0, 10),
            'storage_location' => str_random(5),
            'storage_code' => str_random(5),
        ]);
        $this->url = "/name/storage_marina/{$this->storageMarina->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("保管コード");
        $response->assertSee("/name/storage_marina");
        $response->assertSee($this->storageMarina['storage_location']);
        $response->assertSee($this->storageMarina['storage_code']);
        $response->assertSee($this->storageMarina['order']);
    }
}
