<?php

namespace Tests\Feature;

use App\Models\EstimatedPaymentTerms;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstimatedPaymentTermsEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->estiPayTerms = EstimatedPaymentTerms::create([
            'order' => mt_rand(0, 10),
            'payment_terms' => str_random(5),
        ]);
        $this->url = "/name/estimate_payment_terms/{$this->estiPayTerms->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("支払い条件例");
        $response->assertSee("/name/estimate_payment_terms");
        $response->assertSee($this->estiPayTerms['payment_terms']);
        $response->assertSee($this->estiPayTerms['order']);
    }
}
