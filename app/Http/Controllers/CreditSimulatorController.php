<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditSimulatorRequest;
use App\Service\SimulatorCacheService;
use App\Service\SimulatorPriceService;
use App\Service\SimulatorSacService;
use App\Service\SimulatorTargetService;

class CreditSimulatorController extends Controller
{
    public function simulator(CreditSimulatorRequest $request)
    {
        $userDataValidated = $request->validated();
        $targetSimulator = SimulatorTargetService::target($userDataValidated);
        $price = SimulatorPriceService::calc($userDataValidated, $targetSimulator);
        $sac = SimulatorSacService::calc($userDataValidated, $targetSimulator);


        dd($price, $sac);
    }
}
