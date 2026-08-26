### LISTA DE EXERCÍCIOS: FUNÇÕES EM PHP
Julia Guerra Menoni
-- Parte A: Exercícios Teóricos -- 

**1.0 Conceito de função:** *Explique com suas palavras o que é uma função e cite duas vantagens de dividir um programa em funções.*

> Função: Uma função é um bloco de código usada para realizar uma `tarefa específica`. Ela pode ser `reutilizada sempre que necessário`, permitindo que você evite a repetição de código. Ao invés de reescrever o mesmo trecho várias vezes, você define uma função e a chama sempre que for preciso realizar aquela operação.

**2.0 Princípio DRY:** *Por que repetir o mesmo bloco de código em várias partes do sistema pode causar problemas de manutenção? Como uma função ajuda a evitar essa repetição?*

> O DRY`(Don't Repeat Yourself)` diz que todo pedaço de conhecimento deve ter uma representação única no sistema. `Repetir código espalha regras de negócio`, o que gera bugs ao atualizar apenas um lugar, enquanto funções centralizam a lógica em um único `ponto reutilizável`.

**3.0 Parâmetros e retorno:** *Explique a diferença entre um parâmetro e um valor retornado por uma função. Use a função abaixo como exemplo:*

> `Parâmetros são os valores que uma função recebe para realizar uma tarefa`. No exemplo, `$preco` e `$quantidade` são parâmetros. Já o valor retornado é o resultado que a função devolve `após ser executada.` Nesse caso, a função retorna o resultado de `$preco * $quantidade`, que `representa o total da compra.`

```php
function calcularTotal(float $preco, int $quantidade): float {
    return $preco * $quantidade;
}
```
**4.0 Tipagem:** *Identifique o tipo de cada elemento na declaração*
```php
function cadastrar(string $nome, int $idade): bool.
```
>`cadastrar` é o nome da função.
>`string` é o tipo do parâmetro $nome.
* $nome é o primeiro parâmetro.
* int é o tipo do parâmetro $idade.
* $idade é o segundo parâmetro.
* bool é o tipo do valor que a função deve retornar.

**5.0 void e return:** *Qual é a diferença entre uma função que retorna string e uma função que retorna void? Dê um exemplo de uso para cada uma.*
>Uma função que `retorna` string `devolve um texto` usando `return`. Já uma função void executa uma ação, mas não retorna nenhum valor.
>Exemplo com string:
```php
function obterNome(): string {
    return "Mariana";
}
echo obterNome();
```
>Exemplo com void:

```php
function exibirMensagem(): void {
    echo "Olá, Mariana!";
}
exibirMensagem();
```
**6.0 Escopo:** *Por que a função abaixo não consegue acessar $cliente diretamente? Explique duas formas de corrigir o código e indique qual é a mais recomendada.*
>A função não consegue acessar `$cliente` diretamente porque a variável foi criada no escopo global, enquanto a função possui seu próprio escopo. Variáveis globais não ficam automaticamente disponíveis dentro das funções.

>Primeira forma: global
```php
$cliente = "Mariana";

function exibirCliente(): string {
    global $cliente;
    return $cliente;
}

echo exibirCliente();
```
>Segunda forma: como parâmetro
```php
$cliente = "Mariana";

function exibirCliente(string $cliente): string {
    return $cliente;
}
echo exibirCliente($cliente);
```
**7.0 Referência:** *O que muda quando um parâmetro é declarado como float &$valor? Explique a diferença entre alterar uma cópia e alterar a variável original.*
>O & faz com que o parâmetro seja passado por referência. Assim, a função pode modificar diretamente a variável original.

**Sem &, a função trabalha com uma cópia do valor**
```php
function alterar(float $valor): void {
    $valor = 50.0;
}

$preco = 100.0;
alterar($preco);
echo $preco; // 100
```
**Com &, a alteração afeta a variável original**
```php
function alterar(float &$valor): void {
    $valor = 50.0;
}

$preco = 100.0;
alterar($preco);
echo $preco; // 50
```
**8.0 Funções nativas:** *Escolha cinco funções da tabela deste material e descreva: categoria, finalidade, parâmetros principais e valor retornado.*
| Função                | Categoria   | O que faz                                                      | Como usar                                      |
| --------------------- | ----------- | -------------------------------------------------------------- | ---------------------------------------------- |
| `strlen()`            | Strings     | Retorna a quantidade de caracteres de um texto.                | `$tamanho = strlen($texto);`                   |
| `strtoupper()`        | Strings     | Converte o texto para letras maiúsculas.                       | `$resultado = strtoupper($texto);`             |
| `strtolower()`        | Strings     | Converte o texto para letras minúsculas.                       | `$resultado = strtolower($texto);`             |
| `ucfirst()`           | Strings     | Converte a primeira letra do texto para maiúscula.             | `$resultado = ucfirst($texto);`                |
| `trim()`              | Strings     | Remove espaços e quebras de linha no início e no fim do texto. | `$limpo = trim($texto);`                       |
| `str_replace()`       | Strings     | Substitui uma parte do texto por outra.                        | `$novo = str_replace("-", "", $cpf);`          |
| `substr()`            | Strings     | Extrai uma parte do texto a partir de uma posição.             | `$inicio = substr($texto, 0, 3);`              |
| `explode()`           | Strings     | Divide um texto e cria um array usando um separador.           | `$palavras = explode(" ", $nome);`             |
| `implode()`           | Arrays      | Junta os itens de um array em um único texto.                  | `$lista = implode(", ", $nomes);`              |
| `count()`             | Arrays      | Conta a quantidade de itens de um array.                       | `$total = count($produtos);`                   |
| `in_array()`          | Arrays      | Verifica se um valor existe dentro de um array.                | `$existe = in_array("SP", $estados, true);`    |
| `array_push()`        | Arrays      | Adiciona um ou mais itens ao final de um array.                | `array_push($nomes, "Ana");`                   |
| `array_pop()`         | Arrays      | Remove e retorna o último item de um array.                    | `$ultimo = array_pop($nomes);`                 |
| `sort()`              | Arrays      | Ordena um array em ordem crescente e reorganiza suas chaves.   | `sort($notas);`                                |
| `array_keys()`        | Arrays      | Retorna um array contendo as chaves de outro array.            | `$chaves = array_keys($produtos);`             |
| `number_format()`     | Números     | Formata um número com casas decimais e separadores definidos.  | `$preco = number_format($valor, 2, ',', '.');` |
| `round()`             | Números     | Arredonda um número para a quantidade de casas informada.      | `$media = round($nota, 2);`                    |
| `max()`               | Números     | Retorna o maior valor de uma lista ou array.                   | `$maior = max($notas);`                        |
| `min()`               | Números     | Retorna o menor valor de uma lista ou array.                   | `$menor = min($notas);`                        |
| `is_numeric()`        | Validação   | Verifica se o valor é um número ou uma string numérica.        | `if (is_numeric($entrada)) { ... }`            |
| `isset()`             | Validação   | Verifica se uma variável existe e não possui valor `null`.     | `if (isset($usuario)) { ... }`                 |
| `empty()`             | Validação   | Verifica se uma variável está vazia.                           | `if (empty($pedido)) { ... }`                  |
| `date()`              | Data e hora | Formata uma data ou hora conforme uma máscara.                 | `$hoje = date('d/m/Y');`                       |
| `file_exists()`       | Arquivos    | Verifica se um arquivo ou diretório existe.                    | `if (file_exists('dados.txt')) { ... }`        |
| `file_get_contents()` | Arquivos    | Lê todo o conteúdo de um arquivo ou endereço.                  | `$conteudo = file_get_contents('dados.txt');`  |
| `file_put_contents()` | Arquivos    | Grava conteúdo em um arquivo, criando-o se necessário.         | `file_put_contents('log.txt', $mensagem);`     |

**9.0 Previsão de saída:** *Qual será o resultado exibido pelo código abaixo? Explique o motivo.*

```php
function aplicarDesconto(float $preco): float {
    return $preco * 0.90;
}

$valor = 100.00;
echo aplicarDesconto($valor);
echo $valor;
```
> O resultado será:

`90.100`

Isso acontece porque aplicarDesconto(100.00) calcula:

>`100 × 0.90 = 90`

O primeiro echo imprime 90. Depois, $valor continua valendo 100.00, pois $preco não foi passado por "referência". A função recebeu uma cópia do valor.

```php
 echo aplicarDesconto($valor); // 90
echo $valor;                  // 100
```
Como não há espaço nem quebra de linha entre os dois echo, aparece: **90100**

**10.0 Documentação:** *Pesquise na documentação oficial do PHP a função strlen() e anote sua sintaxe, o parâmetro recebido e o tipo de retorno.*

>Segundo a documentação oficial do PHP, a sintaxe é:

```php
strlen(string $string): int
```
>Parâmetro: `$string, do tipo string.`

>Finalidade: `retorna o tamanho de uma string em bytes.`

>Tipo de retorno: `int.`

```php
Exemplo
$nome = "Mariana";
echo strlen($nome);
```
O resultado será:
>`7`