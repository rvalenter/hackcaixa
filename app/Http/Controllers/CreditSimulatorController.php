<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditSimulatorRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class CreditSimulatorController extends Controller
{
    public function simulator(CreditSimulatorRequest $request)
    {
        dd(Produto::get());
        dd($request->validated());
    }
}
