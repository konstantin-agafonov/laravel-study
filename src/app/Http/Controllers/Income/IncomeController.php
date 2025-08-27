<?php

namespace App\Http\Controllers\Income;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function store(Request $request) {
        $validated = CheckInput::validate($request);

    }
}
