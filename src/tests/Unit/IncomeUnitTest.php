<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Income\CheckInput;
use Tests\TestCase;

class IncomeUnitTest extends TestCase
{
    public function test_validate_user_fields(): void
    {
        $validated = CheckInput::validate([]);

        $errors = $validated->original['errors'];

        $this->assertEquals(3, count($errors));
    }

    public function test_amount_is_valid_number(): void
    {
        $validated = CheckInput::validate([
            'name' => 'Дед Мазай',
            'amount' => 'wrong amount',
            'user_id' => 1,
        ]);

        $errors = $validated->original['errors'];

        $this->assertEquals(1, count($errors));
    }

    public function test_name_is_greater_than_n_chars(): void
    {
        $validated = CheckInput::validate([
            'name' => str_repeat('a', 50),
            'amount' => 220,
            'user_id' => 1,
        ]);

        $errors = $validated->original['errors'];

        $this->assertEquals(1, count($errors));
    }
}
