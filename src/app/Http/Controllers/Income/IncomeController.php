<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function store(Request $request) {
        $validated = CheckInput::validate($request->all());

        if (!$validated->original['success']) {
            return $validated;
        }

        Income::create($request->all());

        return response()
            ->json(['message' => 'Income created successfully'], 201);
    }
}
