<?php

namespace App\Http\Controllers\Income;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CheckInput {

    /**
     * @param array $fields
     * @return ResponseFactory|Application|Response
     */
    public static function validate(array $fields): Application|Response|ResponseFactory
    {
        $validated = Validator::make($fields, [
            'name' => 'required|string|max:15',
            'amount' => 'required|numeric|min:0',
            'user_id' => 'required|integer|min:1',
        ]);

        if ($validated->fails()) {
            return response([
                'errors' => $validated->errors(),
                'success' => false,
                'message' => "Input validation failed."
            ]);
        }

        return response([
            'errors' => null,
            'success' => true,
            'message' => "Input validation succeeded."
        ]);
    }
}
