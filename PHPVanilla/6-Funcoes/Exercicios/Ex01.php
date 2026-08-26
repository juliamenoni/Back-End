<?php
declare(strict_types=1);

// Exercício 1 - Calculadora de IMC

function calcularIMC(float $peso, float $altura): float
{
    return $peso / ($altura * $altura);
}

$imc1 = calcularIMC(70, 1.75);
$imc2 = calcularIMC(55, 1.60);
$imc3 = calcularIMC(90, 1.80);

echo "Exercício 1 - Calculadora de IMC"."\n";

echo "IMC 1: " . number_format($imc1, 2, ',', '.')."\n";

echo "IMC 2: " . number_format($imc2, 2, ',', '.')."\n";

echo "IMC 3: " . number_format($imc3, 2, ',', '.')."\n";