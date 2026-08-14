<?php
declare(strict_types=1);

## NÍVEL 4: "O DESAFIO DO CHEFÃO" (Integração de Regras)
## Exercício 6: Bilheteria Inteligente (Cinema)

$diaSemana = "Quarta";
$isEstudante = true;
$valorBase = 40.00;

// Passo 1 da lista
$valorDia = match ($diaSemana) {
    "Segunda", "Terca" => $valorBase * 0.80,
    "Quarta" => $valorBase * 0.50,
    "Quinta", "Sexta", "Sabado", "Domingo" => $valorBase,
    default => $valorBase
};

// Passo 2 da lista
if ($isEstudante === true) {
    $valorFinal = $valorDia * 0.50;
} else {
    $valorFinal = $valorDia;
}
// Passo 3 da lista
echo "O valor final do ingresso ficou em R$".  number_format($valorFinal,2,".");