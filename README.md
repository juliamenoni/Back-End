# Curso BackEnd - 225 - Técnico em Desenvolvimento de sistemas - SENAI
29/07/2026
---

Profº Diogo TB

Escola SENAI Americana

2º Semestre 2025

## Objetivos do Curso

- Desenvolver Aplicações web Server Side, utilizando a linguagem PHP;
- Aplicar Sintaxe Nativa PHP (Vanilla);
- Manipulação HTTP;
- Persistência de Dados;
- Segurança contra SQL Injection/CSRF;
- Refatoração em POO (Programação Orientada ao Objeto);
- Arquitetura MVC (Model, View, Controller);
- Utilização do FrameWork Laravel; 

Obs: framework - um conjunto de bibliotecas que oferecem uma solução completa para o desinvolvimento de alguma coisa.

## Cronograma do Semestre

Carga Horária: 1º Semestre 105h e 2º Semestre 120h

Duração: 20 Semanas 1º Semestre e 20 Semanas 2º Semestre

---

### Semana 1: Introdução ao BackEnd e Configuração do Ambiente PHP

#### O que é BackEnd?
 
 O back-end é a parte de uma aplicação que o usuário não vê, mas que faz tudo funcionar por trás das telas.

O Back-End é a parte de um sistema que funciona nos servidores, sendo responsável por executar a lógica da aplicação, processar informações e armazenar dados. 

Além disso, o BackEnd é responsável por atender ás solicitações do Frontend.

Sobre o mercado atual:o cenário é bom, mas mais exigente do que era. Quem conhece só o básico enfrenta mais concorrência. Quem alia backend sólido com IA aplicada, cloud e inglês está num patamar completamente diferente 
vagas internacionais remotas são uma realidade pra esse perfil.

O Backend é formado pelo servidor, banco de dados, lógica de programação com APIs e linguagens de programação/frameworks. Esses componentes trabalham juntos para processar dados, armazenar informações e garantir o funcionamento da aplicação.

# Para que serve
-Processar lógica de negócio: regras, cálculos, validações (ex: calcular frete, aplicar desconto, validar login)

-Gerenciar banco de dados: salvar, buscar, atualizar e deletar informações

-Autenticação e autorização: controlar quem pode acessar o quê (login, senhas, permissões)

-Fornecer APIs: criar "pontes" (endpoints) para o frontend ou outros sistemas consumirem dados

-Integração com serviços externos: pagamentos, e-mails, notificações, APIs de terceiros

-Segurança: proteger dados sensíveis, evitar ataques (SQL injection, XSS, etc.)

-Escalabilidade e performance: garantir que o sistema aguente muitos usuários ao mesmo tempo.


# Principais Tecnologias Linguagens de programação: 
 Ferramentas usadas para escrever o código do servidor, como Python, Node.js (JavaScript), Java e PHP.APIs: Os "caminhos" que permitem que o que você vê no celular converse com o servidor.


 Fintechs e Bancos
Segurança, transações, alta escala 

E-commerce
Catálogo, pedidos, pagamentos

Healthtechs
Prontuários, telemedicina

SaaS / Startups
Backend é o coração do produto

Logística
Rastreio, rotas, tempo real

Educação
Plataformas, conteúdo, usuários

#### O Ciclo de vida da Requisição HTTP

#### O que é HTTP?
**HTTP**, Hypertext Transfer Protocol, é um protocolo de comunicação utilizado para transferencia de informações na WWWW (World Wide Web) e em outros sistemas de redes.

O HTTP é a base para que o cliente e um servidor web troquem de informações. Ele permite a requisição e a respostas de recursos como, imagens, arquivos e textos.

```mermaid
graph TD
A[Navegador]
B[HTTP]
C[Servidor]

A-->|resquest|B
B-->|resquest|C
C-->|resquest|B
B-->|resquest|A
```
---
## Como funciona na Prática o BackEnd

- **Ação do Usuário:** Envia uma solicitação pela UI (Interface do Usuário/ User Interface). 
> Exemplo de UI:
`-Tela do celular;`
`- Navegador da internet;`
`- Alexa;`
`-IOT.`
- **Enviar uma Requisição:** A UI transoforma a ação do Usuário em uma requisição HTTP.
-**O processamento BackEnd:** O código BackEnd recebe o pedido, válida os dados e decide o que fazer. 
>`Ex: Consultar uma informação no BD (Banco de Dados)`.

-**Respostas:** O servidor devolve o resultado para a UI. 
>`Ex: Um login autorizado, Confirmação de compra,..`

#### Tipos de Requisisão HTTP

Os tipos de requisição HTTP indicam a ação que o usuário deseja executar no servidor.
As principais são:

-**Get:**
> Pede dados de um lugar especifico do servidor. "Não faz alterações no servidor".

-**Delete:**
> Apaga um dado do servidor.

-**Post:**
> Envia dados novos para *criar* algo ou processar informações no servidor.

-**Put/Patch:**
> Modifica um dado já existente
---
>`Put: Muda os dados de forma integralmente/completa`

>`Patch: Muda os dados de forma parcial`
---
#### Iniciando o PHP 

**PHP** (HyperText PreProcessor) é uma linguagem de programação interpretada e open source, focada no desenvolvimento de sistemas para WEB, e pode ser usada junto com HTML para a criação de páginas web dinãmicas.

O PHP de fato é uma das linguagens de programação mais populares da atualidade. Ela permite que você crie aplicações WEB robustas, de uma maneira muito mais simplificada e direta. A linguagem tem diversos recursos que facilitam e aceleram o `processo de desenvolvimento de sites e sistemas para a web. E além do mais, ela ainda tem um ótimo ecossistema, uma excelente comunidade e um grande mercado de trabalho.

---
#### Instalando o PHP

- Fazer o Download do PHP (php.net)
- ZIP - NTS (Non Thread Safe) 8.5
- Descompactar o Arquivo do PHP na pasta C:\src\php (para descompactar, usar o ZIP7 --> Melhor) --> nunca salvar arquivos ou programas na raiz do sistema (C:)
- Adicionar a Pasta do PHP (C:\src\php) as variáveis de Ambiente do sistema (PATH)
- Verificar a instalação rodando o comando:
```bash
php --version
```
---
Para acessar a página PHP, usar o comando no terminal:
```Bash
php -S localhost:8080
```
---
#### Semana 2 - Varíáveis e constantes e operadores em PHP
#### Criando Minha Primeira Aplicação em PHP

>1.0 Antes de começar a Codar:

* Preparar meu VSCODE
* Criar um profile próprio para PHP
* Instalar Extensões Necessárias para transformar o meu VSCODE em uma IDE
    - PHP Intelephense -> **Permite a utilização de Snippets (atalhos de código)**
    - PHP Debug -> **Ajuda a encontrar erros de código**
    - PHP Cs Fixer -> **Formatação de códigco (identação)**
    - PHP Server -> **Ajuda na criação de um servidor local para PHP**
* Desabilitamos o PHP nativo do VSCODE (@bultinPHP)

>2.0 Hello World (Muito Importante!)

#### Estudo de Variáveis e Constantes em PHP

Declarar variáveis é alocar um espaço na memória que permite a inclusão e manipulação de dados.
 
 **Variáveis**

 - Devem ser declaradas usando um "$" antes do nome da variável
 - São não tipadas (Não precisa declarar o tipo dela na criação)
 - Podem ser String, Numéricas (Int e Float), Booleanas e Nulas. Não permite declaração de Undefined

 >REGRA DE OURO: Usar o "declare(Strict_types=1);" na primeira linha do arquivo -> blinda o sistema contra conflitos de tipos de variáveis

 **Constantes**
 - Não podem ser mudadas ou redeclaradas após a criação
 - Pode ser criada usando "const" ou "define"
 - Não permite interpolação

#### Estudo de Operadores

**Aritméticos**: São usados para realizar cálculos

| Operador | Nome | Exemplo | Resultado |
| - | - | - | - |
| + | Adição | 10+5 | 15 |
| - | Subtração | 10-5 | 5 |
| * | Multiplicação | 10*5 | 50
| / | Divisão | 10/5 | 2 | 
| % | Modulo(resto) |10%3| 1 (10 div 3 da 3, e sobra **1**)
|**| Expoente | 2**3| 8 (2 elevado a 3)

**Relacionais**: Permite o relacionamento entre dois ou mais valores, o resulado de uma operação é sempre uma booleana (Verdadeiro ou Falso).

| Operador | Significado | Exemplo | Resultado |
| - | - | - | - |
| > | Maior que | 18 > 18 | false |
| < | Menor que | 10 > 20 | true | 
| >= | Maior ou igual a | 18 > 18 | true |
| <= | Menor ou igual a | 10 <= 5 | false |
| ==| Comparação de valor | "10"==10 | true |
| === | Comparação estrita | "10"===10 | false |
|!=| Diferente | "10"!10| false |
| !== | Estritamente diferente | "10"!==10| true |

**Lógicos**:
Permite a combinação entre sentenças

- Operador AND (E) -> &&: para o resultado ser verdadeiro, todas as combinações precisam ser verdadeiras
    - true && true => true
    - true && false => false

- Operador OR (OU) -> ||: para o resultado ser verdadeiro, basta apenas uma condição ser verdadeira
    -false || true => true
    -false || false => false

- Operador NOT (NÃO) => !: Inverte a lógica da operação
    - !true => false
    - !false => true

--- 
### Semana 3  Estrutura de dados (Condicionais e repetição)

- **Conteúdo**:
 Estrutura 
 operdadores ternários ->`if`,`else`,`elseif` 
substituto do switch/case -> `match` 
loops -> `for`,`while`,`do-while`,`forach`

## Estruturas de controle de dados ajudam no processo de automatização em programas e sistemas

### Condiciomais (IF,ELSE,ELSEIF)

**Formas de uso**

- uso do `if`apenas:
Exemplo: aplicar desconto de 10% em compras acima de 100 reais.

```mermaid
graph LR

A[Comando] --> B{Condição} --> C[Ação]
```
---
```php
if($valorCompra > 100){
    $valorFinal = $valorCompra * 0.9;
}
```

- Uso do `if` e do `else`
Exemplo: Aplicar um desconto de 10% para compras acima de 100 reais e 5% paraa as demais compras
 
 ```mermaid
 graph LR
 A[Comando] --> B{Condição}
 B --> |true| C[Ação 1]
 B --> |false| D[Ação 2]
 ``` 
 
 ```php
 if ($valorCompra > 100){
    $valorFinal = $valorCompra * 0.9;
 } else {
    $valorFinaç = $valorCompra * 0.95;
 }
 ```

 - Uso `elseif` (if encadeado) -> estrutura usada para manipulação de dados em duas ou mais condicionais.
 Exemplo: compras acima de 200 reais tem 15% de desconto, compras de acima 100 reais tem 10% de desconto e demais compras tem 5% de desconto.
 
 ```mermaid
graph LR

A[Comando] --> B{Condição 1}
B --> |true| C[Ação 1]
B --> |false| D{Condição 2}
D --> |true| E[Ação 2]
D --> |false| F[Ação 3]
```

```php
if ($valorcompra > 200) {
    $valorFinal = $valorCompra * 0.85;
} elseif ($valorCompra > 100) {
    $valorfinal = $valorcompra * 0.9;
} else {
    $valorFinal = $valorCompra * 0.95;
}
```

**OBSERVAÇÃO**: sempre usar `elseif` para situações que precisam de mais de uma condição, ou seja, fazer encadeamento das condições

- Uso *ERRADO* do if:

```php
if ($valorcompra > 200) {
    $valorFinal = $valorCompra * 0.85;
} 
if ($valorCompra > 100) {
    $valorfinal = $valorcompra * 0.9;
} else {
    $valorFinal = $valorCompra * 0.95;
}
```
#### Operadores ternários:
Um atalho para a estrutura condicional `if/else`, normalmente escrita em uma única linha de código.

`condição? verdadeira: falsa`

Perfeito para descisões curtas de uma linha de comando
Exemplo: Verficar se a pessoa é maior de idade (18)
 
 ```php
 $idade = 18;
 // O formato é (condição) ? verdadeiro : falso;
 $status = ($idade>=18) ? "Maior de idade" : "Menor de idade";
 $staus2 =  ($idade>=60) ? "idoso" : ($idade>=18) ? "adulto" : "criança";

 echo $status //
 ```
#### Expressão condicional `match` (PHP 8) 

No mercado atual de PHP, não se usa mais uma `Switch/Case` para chegar valores fixos usa-se o `match`. Ele compra um valor e retornam diretamente o resultado caso atenda a condição.

```mermaid
graph TD
A[Valor] --> B{Condicional}
B --> C[Ação 1]
B --> D[Ação 2]
B --> E[Ação 3]
B --> F[Ação 4]
B --> G[Ação ...]
B --> H[Ação default]

```
//Exemplo: Selecionar o dia da semana a partir de um Nº
```php
$diaSemanaNum = date ("W"); //pega o dia da semana em formato numerico

$nomeDiaSemana = match ($diaSemanaNu) {
    "0" => "Domingo"
    "1" => "Segunda"
    "2" => "Terça"
    "3" => "Quarta"
    "4" => "Quinta"
    "5" => "Sexta"
    "6" => "Sábado"
    "default" => "Dia inválidp"
};
 echo " Hoje é : $nomeDiaSemana";
 ```
---
##### Laços de repetição

Um laço de repetição faz com que um bloco de código rode várias vezes até que uma condição mande parar

- O laço `while`(Enquanto) -> Ele verifica se a condição é verdadeira ANTES de entrar no laço. Ideal quando você não sabe exatamente quantas vezes vai rodar o laço

```mermaid
graph LR

    A[Início: contador = 0] --> B{Verdade?}
    B -- Sim --> C[Repete]
    C --> D[Executa código]
    D --> B
    B -- Não --> E[Fim do Laço]

```
Exemplo de aplicação do while:

Exemplo de aplicação do while: Jogo de adivinhação de um nº Secreto
```php
$tentativas = rand(1,10);
$numeroEscolhido = 0;
$tentativas = 0;
while($numeroEscolhido != $numeroSecreto){
echo "Tente Novamente"
// vou escolher outro Nº para adivinhar
numeroEscolhido = rand(1,10)
tentativas++;
}
echo "Acertou Miseravi! o nº secreto é $numeroEscolhido";

```

- O laço `do-while`(faça enquanto)

A diferença é que ele executa o bloco pelo menos uma vez, mesmo que a condição seja false desde o início, pois ele só pergunta no final. 

```mermaid

flowchart LR

    A([Início]) --> B[Ação]
    B --> C{Condição}
    C --true--> B
    C --false--> D([Fim])
```

Exemplo: Jogo de Adivinhação de um Nº
```php
$tentativas = rand(1,10);
do{
    $numeroEscolhido = rand(1,10);
    if(numeroEscolhido == numeroSecreto){
        echo "Parabéns, Acertou!!";
        break;
    }

    echo "Tente Novamente!!";
}while(numeroEscolhido != numeroSecreto);
```
##### O freio de emergências `break` e `continue`
As vezes precisamos interferir no laço enquanto ele está rodando
-`break`-> **Para Tudo** Quebra o laço inteiro e o vai embora
- `continue`-> **Pula a rodada** Ele ignora o código daquela rodada específica e pula logo para a próxima repetição.

Exemplo de aplicação de código: Sistema de controle de elelvador

```php
for($andar = 1; $andar<=10; $andar++){
    if($andar == 4) {
        echo "Andar $andar está em obras. Passando direto!";
        continue;
    }
    echo "Elevador psrou no andar $andar"
}
```
---
##### Laço de repetição `for`
Use o `for`quando você sabe quantas vezes precisa repetir uma ação ou quando precisa controle uma contador. Ele possui tr~es partes:

- Inicialização,
- Condição,
- Incremento.

for(inicialização;condição; incremento){
    ação
 }
 ```mermaid 
 flowchart LR
    A[Início: i=0] --> B{i<10?>}
    B --true--> C[Ação]
    C --> D[i++/i--]
    D --> B
    B --false--> E[Fim]
```
    
    Exemplo: Exibir todos os meses do ano

 ```php
for ($mes=1; $mes<=12>; $mes++){
    echo "Mês $mes";
}
```
Nesse Exemplo, `$mes` começa em 1, o laço continua enquanto `$mes`for menor ou igual a 12 e, ao final de cada repetição, `$mes++`aumenta o contador em 1.
##### Laço de repetição `foreach`
Use o `foreach`quando precisar percorrer cada item de um *array*. Ele acessa os elementos diretamente, sem que você precise controlar o contador.

Exemplo: Imprimir todos os items de um vetor 

```php
$frutas = ["maça","banana","uva","pera"];
foreach($frutas as $frutas){
    echo "Frutas: $frutas";
}
```
Outro Exemplo: Acessar a chave e o valor de cada item:

```php
$precos = [
"Caderno" => 25.90,
"Caneta" => 5.50,
"Mochila" => 99.0
]; // vetor não ordenado chave => valor

foreach($preços as $produtos => $preco){
    echo "$produto: R$ number_format($preco,2)";
}
```
---
---

##### Desafio: Simulador de cobrança (FINANSENAI)