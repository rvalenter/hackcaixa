<?php

namespace App\Http\Resources;

use App\Service\AppRedirectService;
use App\Service\AzureBusService;
use App\Service\SimulatorPriceService;
use App\Service\SimulatorSacService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditSimulatorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $this->withoutWrapping();

        if ($this['targetSimulator']) {
            $simulation = $this->parseSimulator();
            $this->eventHub($simulation);

            return $simulation;
        }

        return AppRedirectService::noResultsForParams();
    }

    public function parseSimulator()
    {
        return [
            "codigoProduto" => $this['targetSimulator']['CO_PRODUTO'],
            "descricaoProduto" => $this['targetSimulator']['NO_PRODUTO'],
            "taxaJuros" => $this['targetSimulator']['PC_TAXA_JUROS'],
            "resultadoSimulacao" => [
                [
                    "tipo" => "SAC",
                    "parcelas" => SimulatorSacService::calc($this['userDataValidated'], $this['targetSimulator'])
                ], [
                    "tipo" => "PRICE",
                    "parcelas" => SimulatorPriceService::calc($this['userDataValidated'], $this['targetSimulator'])
                ],
            ]
        ];
    }

    public function eventHub(array $simulation)
    {
        if (env('EVENTHUB_STORE')) {
            AzureBusService::bus(json_encode($simulation));
        }
    }
}
