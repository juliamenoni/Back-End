<?php
declare(strict_types=1);

// Exercício 2 - Classificação de IMC

$imc1 = calcularIMC(100, 1.75);
$imc2 = calcularIMC(95, 1.60);
$imc3 = calcularIMC(40, 1.80);

function classificarIMC(float $imc): string
{
    if ($imc < 18.5) {
        return "Abaixo do peso";
    } elseif ($imc <= 24.9) {
        return "Peso normal";
    } elseif ($imc <= 29.9) {
        return "Sobrepeso";
    } else {
        return "Obesidade";
    }
}

echo "Exercício 2 - Classificação de IMC";
echo "IMC 1: " . number_format($imc1, 2, ',', '.') .
     " - " . classificarIMC($imc1);

echo "IMC 2: " . number_format($imc2, 2, ',', '.') .
     " - " . classificarIMC($imc2);

echo "IMC 3: " . number_format($imc3, 2, ',', '.') .
     " - " . classificarIMC($imc3);

