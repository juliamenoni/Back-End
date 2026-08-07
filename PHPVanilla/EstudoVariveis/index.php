<?php 
declare(strict_types=1); // Blinda o sistema contra misturas acidentais de tipos de dados
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo de Variáveis</title>
</head>
<body>
    <h3>Estudo de Variáveis</h3>
    <?php 
// Variaveis são representadas pelo símbolo ($) seguido do nome da variável
// Exemplo:
$nome = "Julia"; // Variável do tipo String
$idade = 16; // Variável do tipo Number (Int -> Inteiro)
$status = true; // Variável do tipo Boolean
$altura = 1.55; // Variável do tipo Number (Float)
$email = null; // Variável do tipo Null
//$endereco; -> Variável indefinida, não é possivel declarar uma variável sem atribuir um valor a ela, então não existe o tipo de variável indefinida.


//Exibir as variáveis na tela
echo "Nome: $nome <br>";
echo "Idade: $idade <br>";
echo "Status: $status <br>";    
echo "Altura: $altura <br>";
echo "Email: $email <br>";

echo "br <h3>  Constantes </h3> <br>";
//Constantes são representadas pela palavra "const" seguida do nome da constante
//Exemplo de consantes
const PI = 3.14; //Constante tipo Number (Float)
const EMPRESA = "Google"; //Constantes do tipo String
define ("Site", "www.google.com"); // Constante do tipo String
// Uma boa prática é utilizar letras maiúsculas para nomear constantes, para diferenciar das variáveis

//Exibir as constantes na tela
echo "Valor de PI: PI <br>";
echo "Nome da Empresa: EMPRESA <br>";
echo "Site: SITE <br>";
//Terando alterar o valor de uma constante, isso irá gerar um erro, pois constantes não podem ser alteradas
// PI = 3.14159
//Redeclarar uma constante também irá gerar um erro
//const SITE = "www.google.com.br"; //Isso é um erro

//Regra de ouro: Sempre coloque a instrução declare (stric_types=1); no ínicio do seu código PHP
//Isso blinda o seu sistema contra mistura acidentais de tipo de dados.

// Utilização de TEXTO (Concatenação VS Interpolação)
//Exemplo de concatenação -> Juntar duas ou mais strings utilizando o operador (.) 
echo "Olá, " . $nome . "! Seja bem-vindo ao nosso site!! <br>";
// Exemplo de Interpolação -> utilização de variáveis dentro de um texto, utiliando aspas duplas
echo "$nome, tem $idade anos e sua altura é $altura metros. <br>"; // forma mais correta de misturar textos e variáveis







?>

</body>
</html>