<?php

declare(strict_types = 1);

namespace App\Service;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SimulatorCacheService
{
    public static function createParamsCache(): Collection
    {
        if (!Cache::has('Produto')) {
            Cache::put('Produto', SimulatorDbParamsService::fetchDbParams(), now()->addDay());
        }

        return self::parseParams();
    }

    public static function parseParams(): Collection
    {
        return Cache::get('Produto')->map(function ($cache) {
            return [
                "CO_PRODUTO" => $cache->CO_PRODUTO,
                "NO_PRODUTO" => $cache->NO_PRODUTO,
                "PC_TAXA_JUROS" => $cache->PC_TAXA_JUROS,
                "NU_MINIMO_MESES" => intval($cache->NU_MINIMO_MESES),
                "NU_MAXIMO_MESES" => intval($cache->NU_MAXIMO_MESES),
                "VR_MINIMO" => floatval($cache->VR_MINIMO),
                "VR_MAXIMO" => floatval($cache->VR_MAXIMO),
            ];
        });
    }
}
