<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExpenseDetailTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/name/expense_detail';
    }

    public function testGetPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("諸經費内容");
    }
}
