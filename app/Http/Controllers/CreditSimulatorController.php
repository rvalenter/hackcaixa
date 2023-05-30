<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditSimulatorRequest;
use App\Service\SimulatorCacheService;

class CreditSimulatorController extends Controller
{
    public function simulator(CreditSimulatorRequest $request)
    {
        $dbParams = SimulatorCacheService::createParamsCache();
        $requestParamsValidated = $request->validated();

        dd($dbParams, $requestParamsValidated);
    }
}
