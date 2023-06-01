<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditSimulatorRequest;
use App\Http\Resources\CreditSimulatorResource;
use App\Service\SimulatorPriceService;
use App\Service\SimulatorSacService;
use App\Service\SimulatorTargetService;

class CreditSimulatorController extends Controller
{
    public function simulator(CreditSimulatorRequest $request)
    {
        $userDataValidated = $request->validated();
        $targetSimulator = SimulatorTargetService::target($userDataValidated);

        return new CreditSimulatorResource([
            'targetSimulator' => $targetSimulator,
            'userDataValidated' => $userDataValidated,
        ]);
    }
}
