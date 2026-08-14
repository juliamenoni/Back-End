<?php
declare(strict_types=1);

## NÍVEL 3: AVANÇADO (A Expressão match do PHP 8)
## Exercício 5: Calculadora de Tarifas Logísticas

$siglaEstado = "PE";

$valorFrete = match ($siglaEstado) {
    "SP", "RJ", "MG", "ES" => 35.00,
    "PR", "SC", "RS" => 45.00,
    "BA", "CE", "PE" => 60.00,
    default => 80.00
};

echo "Para o estado " . $siglaEstado . ", o frete é R$ "
    . number_format($valorFrete, 2, ',', '.');

?> 