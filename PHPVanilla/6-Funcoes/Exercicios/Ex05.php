<?php
declare(strict_types=1);

// EExercício 5 - Carrinho de Compras

function calcularCarrinho(array $produtos): float
{
    $total = 0;

    foreach ($produtos as $produto) {
        $total += $produto["preco"] * $produto["quantidade"];
    }

    return $total;
}

$produtos = [
    [
        "nome" => "Caderno",
        "preco" => 25.00,
        "quantidade" => 2
    ],
    [
        "nome" => "Caneta",
        "preco" => 3.50,
        "quantidade" => 4
    ]
];

$total = calcularCarrinho($produtos);

echo "Exercício 5 - Carrinho de Compras"."\n";
echo "Total da compra: R$ " . number_format($total, 2, ',', '.');