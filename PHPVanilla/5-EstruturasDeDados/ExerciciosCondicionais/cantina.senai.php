<?php
declare(strict_types=1);

$produtos = [
1 => ["nome" => "Coxinha", "preco" => 6.00, "estoque" => 10],
2 => ["nome" => "Suco", "preco" => 5.00, "estoque" => 8],
3 => ["nome" => "Sanduíche", "preco" => 12.00, "estoque" => 5],
4 => ["nome" => "Bolo", "preco" => 7.50, "estoque" => 6]
];

$pedido = [];
$opcao = 0;

do{
echo "===============================";
echo "Escolha a opção\n";
echo "1 - Listar Produtos\n";
echo "2 - Adicionar produtos ao pedido\n";
echo "3 - Exibir resumo do pedido\n";
echo "3 - Finalizar Compra\n";
echo "0 - Sair\n";
echo "===============================";
$opcao = readline();
//Usar uma estrutura para abrir possibilidade de código

} while($opcao==0);