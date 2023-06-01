<?php

namespace Tests\Feature;

use App\Models\Produto;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AppTest extends TestCase
{
//    use RefreshDatabase;

    public function test_execution(): void
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->postJson('/api/simulador', [
            'valorDesejado' => 900.00,
            'prazo' => 5
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'codigoProduto',
            'descricaoProduto',
            'taxaJuros',
            'resultadoSimulacao' => [
                '*' => [
                    'tipo',
                    'parcelas' => [
                        '*' => [
                            'numero',
                            'valorAmortizacao',
                            'valorJuros',
                            'valorPrestacao',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
