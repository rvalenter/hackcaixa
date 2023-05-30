<?php

namespace App\Service;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;

class SimulatorDbParamsService
{
    public static function fetchDbParams(): Collection
    {
        return Produto::get();
    }
}
