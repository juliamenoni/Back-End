<?php
declare(strict_types=1);

// Exercício 8 - Limpeza e Formatação de CPF

function limparCPF(string $cpf): string
{
    return str_replace([".", "-"], "", $cpf);
}

function cpfValido(string $cpf): bool
{
    $cpf = limparCPF($cpf);

    if (strlen($cpf) === 11 && is_numeric($cpf)) {
        return true;
    } else {
        return false;
    }
}

$cpf = "123.456.789-09";

echo "CPF: " . limparCPF($cpf) . "\n";

if (cpfValido($cpf)) {
    echo "CPF válido.";
} else {
    echo "CPF inválido.";
}
?>