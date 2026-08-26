<?php
declare(strict_types=1);

// Exercício 9 - Cadastro de Clientes

function buscarCliente(array $clientes, string $nome): ?array {
    foreach ($clientes as $cliente) {
        if ($cliente["nome"] == $nome) {
            return $cliente;
        }
    }

    return null;
}

$clientes = [
    ["nome" => "Mariana", "idade" => 20],
    ["nome" => "Carlos", "idade" => 25],
    ["nome" => "João", "idade" => 30]
];

// Cliente encontrado
$resultado = buscarCliente($clientes, "Carlos");

if ($resultado != null) {
    echo "Cliente encontrado: " . $resultado["nome"] . "\n";
} else {
    echo "Cliente não encontrado.\n";
}

// Cliente não encontrado
$resultado = buscarCliente($clientes, "Ana");

if ($resultado != null) {
    echo "Cliente encontrado: " . $resultado["nome"];
} else {
    echo "Cliente não encontrado.";
}
?>