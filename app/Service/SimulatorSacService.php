<?php

namespace App\Service;

class SimulatorSacService
{
    public static function calc(array $userDataValidated, array $targetSimulator): array
    {
        $amount = $userDataValidated['valorDesejado'];
        $fee = $targetSimulator['PC_TAXA_JUROS'];
        $installments = $userDataValidated['prazo'];

        $numberInstallments = $amount / $installments;

        $portions = [];

        for ($i = 1; $i <= $installments; $i++) {
            $amountFee = $amount * $fee;
            $amortizationAmount = $numberInstallments + $amountFee;

            $portion = [
                'numero' => $i,
                'valorAmortizacao' => number_format($numberInstallments, 2, ',', '.'),
                'valorJuros' => number_format($amountFee, 2, ',', '.'),
                'valorPrestacao' => number_format($amortizationAmount, 2, ',', '.')
            ];

            $portions[] = $portion;

            $amount -= $numberInstallments;
        }

        return $portions;
    }
}
