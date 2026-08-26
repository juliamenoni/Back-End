<?php
declare(strict_types=1);

// Exercício 6: Aplicação de Desconto por Referência

function aplicarDesconto(float &$preco, float $porcentagem): void
{
    $preco = $preco - ($preco * $porcentagem / 100);
}

$preco = 200.00;

echo "Preço antes do desconto: R$ " . number_format($preco, 2, ",", ".") . "\n";

aplicarDesconto($preco, 15);

echo "Preço depois do desconto: R$ " . number_format($preco, 2, ",", ".");