<?php

namespace Tests\Feature;

use App\Models\EngineModelList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EngineModelListEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->engineModelList = EngineModelList::create([
            'order' => mt_rand(0, 10),
            'model' => str_random(5),
            'classification' => str_random(5),
            'model_selection' => str_random(5),
        ]);
        $this->url = "/name/engine_model_list/{$this->engineModelList->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("機種選択");
        $response->assertSee("/name/engine_model_list");
        $response->assertSee($this->engineModelList['model']);
        $response->assertSee($this->engineModelList['order']);
        $response->assertSee($this->engineModelList['classification']);
        $response->assertSee($this->engineModelList['model_selection']);
    }
}
