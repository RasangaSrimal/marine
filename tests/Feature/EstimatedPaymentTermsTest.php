<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstimatedPaymentTermsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/estimate_payment_terms';
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("支払い条件例");
    }
}
