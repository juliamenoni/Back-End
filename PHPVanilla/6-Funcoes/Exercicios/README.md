### LISTA DE EXERCÍCIOS: FUNÇÕES EM PHP
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

>