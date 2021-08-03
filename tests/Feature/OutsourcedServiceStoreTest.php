<?php

namespace Tests\Feature;

use App\Models\OutsourcedServiceStore;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OutsourcedServiceStoreTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->serviceStore = OutsourcedServiceStore::create([
            'name' => str_random(5),
            'code' => str_random(5), 
            'cost_rate' => mt_rand(0, 10), 
            'order' => mt_rand(0, 10), 
        ]);
        $this->index_url = '/name/service_store';
        $this->create_url = "{$this->index_url}/create";
        $this->url = "{$this->index_url}/{$this->serviceStore->id}";
        $this->edit_url = "{$this->url}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->index_url);
        $response->assertStatus(200);
        $response->assertSee("外注サービス店");
        $response->assertSee("サービス店名");
        $response->assertSee("/name/service_store/{$this->serviceStore->id}/edit");
        $response->assertSee($this->serviceStore['name']);
        $response->assertSee($this->serviceStore['code']);
        $response->assertSee($this->serviceStore['order']);
        $response->assertSee($this->serviceStore['cost_rate']);
    }

    public function testPost() 
    {
        $data = [
            'store_name' => str_random(5),
            'code' => str_random(5), 
            'cost_rate' => rand(), 
            'order' => rand(), 
        ];
        $response = $this->followingRedirects()->from($this->create_url)->post($this->index_url, $data);
        $this->assertNotNull(OutsourcedServiceStore::where('name', $data['store_name'])->firstOrFail());
    }

    public function testErrorMessages() 
    {
        $data = [
            'name' => str_random(5),
            'code' => str_random(5), 
            'cost_rate' => str_random(5), 
            'order' => str_random(5), 
        ];
        $response = $this->followingRedirects()->from($this->create_url)->post($this->index_url, $data);
        $response->assertSee("原価率には、数字を指定してください。");
        $response->assertSee("順番には、数字を指定してください。");
    }

    public function testEditErrorMessages() 
    {
        $response = $this->followingRedirects()->from($this->edit_url)->put($this->url);
        $response->assertSee("順番は必ず指定してください。");
    }
    
    public function testCreateGetPage()
    {
        $response = $this->get($this->create_url);
        $response->assertStatus(200);
        $response->assertSee("外注サービス店");
        $response->assertSee("/name/service_store");
    }

    public function testEditGetPage()
    {
        $response = $this->get($this->edit_url);
        $response->assertStatus(200);
        $response->assertSee("外注サービス店");
        $response->assertSee("/name/service_store");
        $response->assertSee($this->serviceStore['name']);
        $response->assertSee($this->serviceStore['code']);
        $response->assertSee($this->serviceStore['order']);
        $response->assertSee($this->serviceStore['cost_rate']);
    }
}
