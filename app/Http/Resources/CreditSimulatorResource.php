<?php

namespace App\Http\Resources;

use App\Service\AzureBusService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditSimulatorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $simulation = $this->parseSimulator($request);
        $this->eventHub($simulation);

        return $simulation;
    }

    public function parseSimulator(Request $request)
    {
        return [
            "codigoProduto" => $this['targetSimulator']['CO_PRODUTO'],
            "descricaoProduto" => $this['targetSimulator']['NO_PRODUTO'],
            "taxaJuros" => $this['targetSimulator']['PC_TAXA_JUROS'],
            "resultadoSimulacao" => [
                [
                    "tipo" => "SAC",
                    "parcelas" => $this['sac']
                ], [
                    "tipo" => "PRICE",
                    "parcelas" => $this['price']
                ],
            ]
        ];
    }

    public function eventHub(array $simulation)
    {
        AzureBusService::bus(json_encode($simulation));
    }
}
