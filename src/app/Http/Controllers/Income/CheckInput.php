<?php

namespace App\Http\Controllers\Income;

use Illuminate\Support\Facades\Validator;

class CheckInput {

    /**
     * @param array $fields
     * @return void
     */
    public static function validate(array $fields) {
        $validated = Validator::make($fields, [
            'name' => 'required|string|max:15',
            'amount' => 'required|numeric|min:0',
            'user_id' => 'required|integer|min:1',
        ]);

        if ($validated->fails()) {
            return response([
                'errors' => $validated->errors(),
                'message' => "Input validation failed."
            ]);
        }
    }
}
