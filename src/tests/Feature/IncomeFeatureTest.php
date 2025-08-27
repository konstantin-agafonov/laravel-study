<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncomeFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_create_income(): void
    {
        $response = $this->postJson('/api/income', [
            'name' => 'Test Income',
            'amount' => 100,
            'user_id' => 1,
        ]);

        $response->assertCreated();
        $response->assertJsonPath('message', 'saved successfully');
    }
}
