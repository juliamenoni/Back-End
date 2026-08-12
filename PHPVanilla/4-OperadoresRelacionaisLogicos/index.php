<?php
declare(strict_types=1);

//Motor de Análise de créditos

// Regras de negócio:
// Regra da idade: O cliente precisa ter 18 anos ou mais e menos de 70 anos
// Regra da Parcela: (Renda): O valor da parcela do empréstimo NÃO pode ser maior que 30% da renda mensal do cliente
// Regra VIP: Se o cliente tiver um "Score de Crédito" maior que 800, ele tem aprovação automática (As Regras de Idade e Renda não importam)
// Aprovação Final: O Crédito é liberado se (Regra1 e Regra2 forem verdadeira) OU se (Regra 3 for verdadeira).

//1. Dados que vieram do aplicativo do celular do cliente
$idadeCliente = 25;
$rendaMensal = 4000.00;
$valoEmprestimo = 10000.00;
$numeroParcelas = 24;
$scoreCredito = 750; // a pontuação vai de 0 a 1000

//2. Cálculos Aritiméticos
$taxaJuros = 0.02; //Juros do 2°mês
$valorJurostotal = $valoEmprestimo * $taxaJuros * $numeroParcelas;// Juros Simples
$valorTotalPagar = $valoEmprestimo + $valorJurostotal;
$valorParcela = $valorTotalPagar / $numeroParcelas;

//3. O Cérebro da Operação: Avaliação das regras de negócio
// Regra 1: Maior Igual 18 e menor que 70
$idadeValida = ($idadeCliente>=18) && ($idadeCliente<70);

// Regra 2: Parcela não pode ser maior que 30% que a renda (renda*0.30)
$limiteRenda = $rendaMensal * 0.30;
$rendaSuficiente = ($valorParcela <= $limiteRenda);

// Regra 3: ClienteVIP (Score > 800)
$isClienteVip = ($scoreCredito > 800);

//Aprovação Final = idade e renda -> Verdadeiras ou é clienteVIP
 $aprovado = ($idadeValida && $rendaSuficiente) || $isClienteVip;


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de crédito</title>
</head>
<body>
    <h2>Análise de Crédito</h2>
    <hr>    
    <?php echo "<h4> Valor da Parcela: R$ ". number_format($valorParcela, 2, ",","."). '</h4>';?>
    <h4>Idade Válida: <?php echo ($idadeValida ? "sim" : "não") ?> </h4>
    <h4>Renda Suficiente: <?php echo ($rendaSuficiente ? "sim" : "não") ?> </h4>
    <h4>Cliente VIP: <?php echo ($isClienteVip ? "sim" : "não") ?> </h4>
    <h4>Resultado Final: <?php echo ($aprovado ? "sim" : "não") ?> </h4>

</body>
</html>