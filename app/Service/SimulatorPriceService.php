<?php

namespace App\Service;

class SimulatorPriceService
{
    public static function calc($userDataValidated, $targetSimulator): array
    {
        $amount = $userDataValidated['valorDesejado'];
        $fee = $targetSimulator['PC_TAXA_JUROS'];
        $installments = $userDataValidated['prazo'];

        $numberInstallments = ($amount * $fee) / (1 - pow(1 + $fee, -$installments));

        $portions = [];

        for ($i = 1; $i <= $installments; $i++) {
            $amountFee = $amount * $fee;
            $amortizationAmount = $numberInstallments - $amountFee;
            $portion = [
                'numero' => $i,
                'valorAmortizacao' => number_format($amortizationAmount, 2, ',', '.'),
                'valorJuros' => number_format($amountFee, 2, ',', '.'),
                'valorPrestacao' => number_format($numberInstallments, 2, ',', '.')
            ];
            $portions[] = $portion;
            $amount -= $amortizationAmount;
        }

        return $portions;
    }
}
