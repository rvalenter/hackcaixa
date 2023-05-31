<?php

namespace App\Http\Resources;

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
//        return parent::toArray($request);
        return $this->parseSimulator($request);
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

    public function eventHub()
    {

    }
}
