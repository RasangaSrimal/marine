<?php

namespace Tests\Feature;

use App\Models\ConsumptionTax;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConsumptionTaxTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        ConsumptionTax::truncate();
        $this->futureRate = ConsumptionTax::create([
            'tax_rate' => 10,
            'date' => '2022-1-1',
        ]);
        ConsumptionTax::create([
            'tax_rate' => 3,
            'date' => '2000-1-1',
        ]);
        $this->currentRate = ConsumptionTax::create([
            'tax_rate' => 8,
            'date' => '2010-1-1',
        ]);
        $this->url = '/consumption_tax';
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling(); 
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("消費税マスタ");
        $response->assertSee('"8"', false);
        $response->assertSee('"10"', false);
        $response->assertSee('2022-1-1');
    }

    public function testPost()
    {
        $this->withoutExceptionHandling(); 
        $response = $this->followingRedirects()->post($this->url, ['tax_rate' => 9, 'date' => '2022-3-5']);
        $this->futureRate = $this->futureRate->fresh();
        $this->assertEquals($this->futureRate->tax_rate, 9);
        $response->assertSee('2022-3-5');
    }

    public function testPostCurrentRate()
    {
        $this->withoutExceptionHandling(); 
        $response = $this->followingRedirects()->post($this->url, ['current_rate' => 8]);
        $this->currentRate = $this->currentRate->fresh();
        $this->assertEquals(8, $this->currentRate->tax_rate);
    }

    public function testBadInputType()
    {
        #$this->withoutExceptionHandling(); 
        $response = $this->followingRedirects()->from($this->url)->post($this->url, ['current_rate' => 'bad', 'tax_rate' => 'bad', 'date' => 'bad']);   
        $response->assertSee('新消費税は整数で指定してください。');
        $response->assertSee('新消費税は整数で指定してください。');
        $response->assertSee('消費税改正日には有効な日付を指定してください。');
    }
}
