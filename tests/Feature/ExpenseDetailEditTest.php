<?php

namespace Tests\Feature;

use App\Models\ExpenseDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExpenseDetailEditTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->expenseDetail = ExpenseDetail::create([
            'order' => mt_rand(0, 10),
            'expense_detail' => str_random(5),
        ]);
        $this->url = "/name/expense_detail/{$this->expenseDetail->id}/edit";
    }

    public function testGetPage()
    {
        $response = $this->get($this->url);
        $response->assertStatus(200);
        $response->assertSee("諸經費内容");
        $response->assertSee("/name/expense_detail");
        $response->assertSee($this->expenseDetail['expense_detail']);
        $response->assertSee($this->expenseDetail['order']);
    }
}
