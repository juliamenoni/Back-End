<?php
declare(strict_types=1);

// Exercício 10 - Controle de Estoque

function retirarEstoque(array &$produto, int $quantidade): bool {
    if ($quantidade <= 0 || $quantidade > $produto["estoque"]) {
        return false;
    }

    $produto["estoque"] -= $quantidade;

    return true;
}

$produto = [
    "nome" => "Caderno",
    "estoque" => 10
];

// Retirada permitida
if (retirarEstoque($produto, 10)) {
    echo "Retirada permitida! \nEstoque: " . $produto["estoque"];
} else {
    echo "Retirada recusada!";
}
?>