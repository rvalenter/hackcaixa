<?php

namespace App\Service;

use Illuminate\Support\Facades\Cache;

class SimulatorCacheService
{
    public static function createParamsCache()
    {
        if (!Cache::has('Produto')) {
            Cache::put('Produto', SimulatorDbParamsService::fetchDbParams(), now()->addDay());
        }

        return Cache::get('Produto');
    }
}
