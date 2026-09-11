<?php
declare(strict_types=1);

$email="";
$loginValidade = false;
$erros=[];

//Pegar os dados do formulário;
//Verifica se o formulário está enviando os dados como post.
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = trim($_POST["email"] ?? ""); // Limpar os espaços vazios antes e depois do texto
    $senha = trim($_POST["senha"] ?? "");

// Validção de dados => encontrando erros

//erro => EMAIL
    if($email === "" || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $erros["email"] = "Informe um Email válido!";
    }
// erro => SENHA
        if(strlen($senha) < 6){
            $erro["senha"] = "A senha deve ter no mínimo 6 dígitos!";
        }

// se senha e email estão OK
    if(empty($erros)){
        $emailCorreto = "adimin@senai.br";
        $senhaCorreta = "senhaSegura123";
    
        //validando o email e a senha
        if($email === $emailCorreto && $senhaCorreta){
            $loginValidade = true;
        } else{
            $erros["login"] = "Credenciais Inválidas";
        }
    
     }
}

?>

