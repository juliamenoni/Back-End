<?php
declare(strict_types=1);

// EXERCÍCIO 4 - Formatador de Nome

function formatarNome(string $nome): string
{
    $nome = trim($nome);
    $nome = strtolower($nome);
    return ucfirst($nome);
}

echo "Exercício 4 - Formatador de Nome";

echo formatarNome("   Pollyanna   ");
echo formatarNome("Mayne");
echo formatarNome("   Julia    ");