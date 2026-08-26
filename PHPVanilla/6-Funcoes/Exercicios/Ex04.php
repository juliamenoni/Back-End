<?php
declare(strict_types=1);

// Exercício 4 - Formatador de Nome

function formatarNome(string $nome): string
{
    $nome = trim($nome);
    $nome = strtolower($nome);
    return ucfirst($nome);
}

echo "Exercício 4 - Formatador de Nome"."\n";

echo formatarNome("   Pollyanna   ")."\n";
echo formatarNome("Mayne")."\n";
echo formatarNome("JULIA")."\n";

?>