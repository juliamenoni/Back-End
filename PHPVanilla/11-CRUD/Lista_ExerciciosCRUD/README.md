# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA 

### Parte A: Exercícios Teóricos de Fixação


**1.0 Definição de CRUD: O que significa o acrônimo CRUD e qual é a correspondência direta de cada uma de suas letras com as instruções SQL no PostgreSQL?**

> CRUD significa Create, Read, Update e Delete, que representam as quatro operações básicas em um banco de dados.

* C -> `INSERT`
* R -> `SELECT`
* U -> `UPDATE`
* D -> `DELETE`

Exemplo:
```sql
INSERT INTO produtos (nome, preco) VALUES ('Teclado', 100); --CREATE
 SELECT * FROM produtos; -- READ
  UPDATE produtos SET preco = 120 WHERE id = 1; --UPDATE 
  DELETE FROM produtos WHERE id = 1; --DELETE
```
---
**2.0 Anatomia do SQL Injection: Explique com suas próprias palavras como um atacante consegue alterar a lógica de uma consulta quando o código utiliza concatenação de strings com $_GET ou $_POST.**

> O SQL Injection acontece quando dados enviados pelo usuário são colocados diretamente dentro da consulta SQL por meio de concatenação. Dessa forma, um atacante pode inserir conteúdo capaz de alterar a lógica original da consulta.

Exemplo inseguro:
```php
$id = $_GET['id']; 
$sql = "SELECT * FROM produtos WHERE id = $id";
```

Nesse caso, o valor recebido pelo $_GET é colocado diretamente no SQL. O ideal é utilizar Prepared Statements para separar os dados da instrução SQL.

---

**3.0 Mecanismo das Prepared Statements: Por que o envio de uma consulta em duas etapas (prepare e depois execute) impede que um texto digitado pelo usuário seja executado como instrução SQL pelo banco?**

> As Prepared Statements separam a instrução SQL dos dados enviados pelo usuário. Assim, o conteúdo digitado é tratado como um valor e não como uma instrução SQL.

Exemplo:
```php
$sql = "SELECT * FROM produtos WHERE id = :id"; $stmt = $pdo->prepare($sql); $stmt->execute([':id' => $_GET['id']]);
```
Nesse caso, o valor recebido pelo usuário não é interpretado como código SQL.

---

**4.0 Marcadores Nomeados: Qual é a vantagem de utilizar marcadores nomeados como :sku e :preco em vez de pontos de interrogação posicionais (?) em instruções SQL complexas?**

> Marcadores nomeados, como `:sku` e `:preco`, facilitam a leitura e a manutenção do código, principalmente em consultas que possuem vários parâmetros.

Exemplo:
```php
$sql = "SELECT * FROM produtos
        WHERE sku = :sku AND preco = :preco";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':sku' => $sku,
    ':preco' => $preco
]);
```
---

**5.0 Diferença entre Bindings: Explique a diferença de comportamento entre os métodos `$stmt->bindValue()` e `$stmt->bindParam()`.**

> `bindValue()` vincula o valor atual de uma variável.

> Já `bindParam()` vincula a própria variável, utilizando seu valor no momento da execução.

Exemplo:
```php
// bindValue
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// bindParam
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
```

* bindValue() → vincula o valor.
* bindParam() → vincula a variável.

---

**6.0 Tipagem no PDO: Qual é o risco de omitir o tipo de dado (ex: PDO::PARAM_INT) ao vincular uma variável que deveria ser estritamente numérica em uma cláusula LIMIT?**

> É importante informar o tipo correto do dado. Para valores inteiros, podemos utilizar PDO::PARAM_INT.

Exemplo:

```php
$sql = "SELECT * FROM produtos LIMIT :limite";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);

$stmt->execute();
```

Informar o tipo ajuda a garantir que o valor seja tratado como inteiro, evitando comportamentos inesperados na consulta.

---

**7.0 Padrão DAO: Qual é o benefício do padrão Data Access Object (DAO) em termos de manutenibilidade de software e do princípio de responsabilidade única (SOLID)?**

> O DAO (Data Access Object) separa as operações relacionadas ao banco de dados do restante da aplicação.

Isso facilita a organização e manutenção do código e segue o princípio da Responsabilidade Única (SRP) do `SOLID`.

Exemplo:

```php
class ProdutoDAO
{
    public function buscarTodos($pdo)
    {
        $stmt = $pdo->query("SELECT * FROM produtos");

        return $stmt->fetchAll();
    }
}
```

*Nesse exemplo, o DAO fica responsável pelas operações relacionadas aos dados dos produtos.* 

---

**8.0 Operações de Update: Por que a ausência de uma cláusula WHERE em um comando UPDATE é considerada um incidente gravíssimo em ambientes de produção?**

> A ausência de uma cláusula WHERE em um UPDATE pode fazer com que todos os registros da tabela sejam alterados.

Exemplo perigoso:

```sql
UPDATE produtos
SET preco = 50;

--Nesse caso, o preço de todos os produtos será alterado para 50.

--O correto, quando queremos alterar apenas um registro, seria:

UPDATE produtos
SET preco = 50
WHERE id = 1;
```

Por isso, esquecer o `WHERE` em um ambiente de produção pode causar uma alteração massiva e acidental dos dados.

--- 

**9.0 Impacto da LGPD: De acordo com a Lei Geral de Proteção de Dados (LGPD), quais são as penalidades e impactos que uma organização pode sofrer caso ocorra vazamento de dados de clientes por falha de SQL Injection?**


> Um vazamento de dados causado por uma falha de segurança, como SQL Injection, pode trazer consequências para a organização. Dependendo do caso, podem ocorrer sanções administrativas da ANPD, além de impactos financeiros, jurídicos e de reputação.

Exemplo de código vulnerável:
```php
$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $id";
```
Nesse código, o valor recebido pelo usuário é colocado diretamente na consulta SQL.

Forma mais segura:
```php
$sql = "SELECT * FROM clientes WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $_GET['id']
]);
```

Dessa forma, o valor recebido é tratado como dado, reduzindo o risco de SQL Injection e ajudando a proteger os dados dos clientes.

---