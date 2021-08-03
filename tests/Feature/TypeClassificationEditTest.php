<?php

namespace Tests\Feature;

use App\Models\TypeClassification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TypeClassificationEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->typeClassi = TypeClassification::create([
            'order' => mt_rand(0, 10),
            'type_code' => str_random(5),
            'type_classification_contents' => str_random(5),
        ]);
        $this->url = "/name/type_classification/{$this->typeClassi->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("種別コート");
        $response->assertSee("/name/type_classification");
        $response->assertSee($this->typeClassi['type_code']);
        $response->assertSee($this->typeClassi['type_classification']);
        $response->assertSee($this->typeClassi['order']);
    }
}
