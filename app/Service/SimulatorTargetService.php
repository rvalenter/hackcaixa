<?php

declare(strict_types = 1);

namespace App\Service;

use Illuminate\Support\Collection;

class SimulatorTargetService
{
    public static function target(array $userDataValidated)
    {
        return SimulatorCacheService::createParamsCache()
            ->where('VR_MINIMO', '<=', $userDataValidated['valorDesejado'])
            ->where('VR_MAXIMO', '>=', $userDataValidated['valorDesejado'])
            ->where('NU_MINIMO_MESES', '<=', $userDataValidated['prazo'])
            ->where('NU_MAXIMO_MESES', '>=', $userDataValidated['prazo'])
            ->first();
    }
}
