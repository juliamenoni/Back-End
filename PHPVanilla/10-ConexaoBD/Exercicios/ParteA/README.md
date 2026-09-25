# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA - `CONEXÃO BANCO DE DADOS PDO`
Lista de fixação - Julia G. Menoni 1DEV46B T2 25/09/2026

* **Parte A: Exercícios Teóricos de Fixação**

---

*1.0 - Abstração de Dados: O que é o PDO no PHP e por que ele é preferível em relação a extensões especializadas procedurais como o antigo pgsql em projetos corporativos?*
>O PDO (PHP Data Objects) é uma camada de acesso a bancos de dados do PHP que fornece uma interface única para trabalhar com diferentes SGBDs, como PostgreSQL, MySQL e SQLite. Ele é preferível em projetos corporativos porque permite trocar o SGBD com menos alterações no código e oferece recursos importantes de segurança e manutenção, como prepared statements, tratamento padronizado de erros e orientação a objetos. Extensões procedurais específicas, como pgsql, ficam mais acopladas ao PostgreSQL.
---
*2.0 - Ciclo do DSN: Explique o que é a string DSN e detalhe a finalidade de cada um dos parâmetros configurados para o `PostgreSQL (host, port, dbname).`*
>DSN (Data Source Name) é a string que informa ao PDO qual banco de dados deve ser acessado e onde ele está localizado.

Exemplo:
```php
$dsn = "pgsql:host=localhost;port=5432;dbname=meu_banco";
```
* `host` ->  endereço do servidor onde o PostgreSQL está rodando. Ex.: localhost.
* `port` -> porta utilizada pelo PostgreSQL para receber conexões.
* `dbname` -> nome do banco de dados específico ao qual a aplicação deseja se conectar.
---

*3.0 - Padrão de Portas: Qual é a porta padrão de escuta do SGBD `PostgreSQL (5432)` e como ela é referenciada dentro da string de conexão?* 
>A porta padrão do PostgreSQL é 5432. Ela aparece no DSN por meio do parâmetro port:

```php
$dsn = "pgsql:host=localhost;port=5432;dbname=meu_banco";
```
Nesse caso, o PDO tentará estabelecer a conexão com o PostgreSQL na porta 5432.

--- 
*4.0 - Flags de Integridade: O que acontece quando definimos o atributo `PDO::ATTR_ERRMODE` com o valor `PDO::ERRMODE_EXCEPTION?` Qual seria o comportamento padrão caso essa flag não fosse definida?*
```php
//Ao configurar
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
```
>o PDO passa a lançar uma PDOException quando ocorre um erro, permitindo que o programa trate o problema com try/catch.

Exemplo: 
```php
try {
    $pdo = new PDO($dsn, $usuario, $senha, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // tratamento do erro
}
```
Sem essa configuração, o comportamento padrão é PDO::ERRMODE_SILENT. Nesse modo, o PDO não lança exceções automaticamente; o código precisa verificar os erros por outros mecanismos, como errorCode() e errorInfo().

---
*5.0 - Fetch Mode: Qual é a vantagem de utilizar `PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC` para o consumo de memória RAM do servidor?* 
```php
//Com
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
```
>cada registro retornado é convertido em um array associativo, usando apenas os nomes das colunas como chaves.

Exemplo:
```php
[
    "id" => 1,
    "nome" => "Maria"
]
```
Isso evita a duplicação de dados que ocorre quando são retornados simultaneamente índices numéricos e associativos, podendo reduzir o consumo de memória RAM, especialmente em consultas com muitos registros.

---
*6.0 - Padrão Singleton: Por que abrir uma nova conexão com `new PDO()` a cada consulta executada no PostgreSQL pode esgotar o limite de `max_connections` do servidor?*
```php
new PDO(...)
```
> A cada consulta pode gerar várias conexões simultâneas com o PostgreSQL. O servidor possui um limite configurado em:
`max_connections`

Quando muitas conexões ficam abertas, esse limite pode ser atingido. Novas conexões passam então a ser recusadas. O Singleton permite reutilizar uma única instância de conexão durante o ciclo de execução da aplicação, evitando a criação desnecessária de várias conexões.

---

*7.0 - Encapsulamento do Singleton: Por que o construtor da classe `ConexaoBanco` precisa ser declarado como private e quais métodos mágicos devem ser bloqueados para garantir a unicidade da instância?*
```php
//O construtor deve ser:
private function __construct()
```
para impedir que outras partes do programa façam:
```php
new ConexaoBanco();
```
e criem novas instâncias. Para preservar a unicidade, também é comum bloquear:
```php
private function __clone() {}
private function __wakeup() {}
```
A instância única normalmente é disponibilizada por um método estático como:
```php
public static function getInstance()
```
---
*8.0 - Segurança de Credenciais: Por que nunca devemos deixar o usuário e senha do banco de dados salvos de forma estática `(hardcoded)` dentro dos scripts PHP do projeto?*
Não devemos colocar usuário e senha diretamente no código:
```php
$usuario = "admin";
$senha = "123456";
```
> porque essas informações podem acabar expostas por repositórios Git, backups, logs, compartilhamento de código ou configurações incorretas do servidor. Além disso, se a senha estiver espalhada por vários arquivos, sua alteração fica mais difícil. Uma abordagem mais segura é utilizar variáveis de ambiente ou um sistema de gerenciamento de segredos, mantendo as credenciais fora do código-fonte.

---
*9.0 - Tratamento de Exceções & LGPD: Por que a exibição direta de `$e->getMessage()` de uma `PDOException` na tela do navegador é considerada uma falha grave de segurança `(Information Disclosure)`?*
>A exibição de `$e->getMessage()` pode revelar informações internas do banco e do sistema, facilitando ataques. Por isso, em produção, deve-se registrar o erro em logs protegidos e mostrar ao usuário apenas uma mensagem genérica.

---