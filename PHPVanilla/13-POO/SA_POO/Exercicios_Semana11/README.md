# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA

***Julia Guerra Menoni - 1DEV46BT2***

## `Parte A — Exercícios Teóricos de Fixação`

### 1. Procedural vs. OO

Manter regras financeiras em arrays e scripts procedurais pode deixar o código desorganizado, aumentar a chance de erros e dificultar a manutenção. Também fica mais difícil proteger os dados e garantir que as operações sigam as regras corretas. A orientação a objetos ajuda a organizar melhor essas funcionalidades.

### 2. Ciclo de Vida do Objeto

Quando executamos `new ContaCorrente(...)`, um novo objeto é criado na memória. O método `__construct()` é executado automaticamente para definir os valores iniciais dos atributos e preparar o objeto para ser utilizado.

### 3. A Pseudo-Variável `$this`

O `$this->saldo` acessa o atributo `saldo` que pertence ao objeto atual. Já `$saldo` é uma variável local, que existe somente dentro do método ou bloco onde foi criada. Assim, o `$this` permite acessar os dados do próprio objeto.

```php
class Financeiro {
    // Atributo
    private float $saldo;

    // Método de acesso
    public function setSaldo(float $valor) {
        $this->saldo += $valor;
    }
}

$financeiro = new Financeiro();
$financeiro->setSaldo(20.00);
```

### 4. Encapsulamento e Invariantes

Um método público `setSaldo()` permitiria modificar o saldo diretamente, sem verificar se a operação é válida. Isso poderia causar erros nos valores da conta. O ideal é utilizar métodos específicos, como depósito e saque, que respeitem as regras financeiras.

### 5. Modificadores de Acesso

O `private` permite acessar atributos e métodos somente dentro da própria classe. Já o `protected` permite o acesso também pelas classes filhas que herdam da classe principal usando `extends`.

### 6. Constructor Property Promotion

Esse recurso permite declarar os atributos diretamente nos parâmetros do construtor, sem precisar criar várias declarações e atribuições separadas. Isso diminui a quantidade de código e facilita a leitura da classe.

### 7. Propriedades `readonly`

A palavra-chave `readonly` impede que um atributo tenha seu valor alterado depois de ser inicializado. Ela é útil para informações que devem permanecer iguais durante a execução do objeto, como um CPF.

### 8. Classes Abstratas

A classe `ContaBancaria` é abstrata porque funciona como um modelo geral para outros tipos de contas, reunindo características em comum. Já `ContaCorrente` e `ContaPoupanca` são classes concretas, pois podem ser utilizadas para criar objetos normalmente.

### 9. Polimorfismo

Isso acontece porque as classes `ContaCorrente` e `ContaPoupanca` herdam de `ContaBancaria`. Assim, o método pode receber qualquer uma delas pelo parâmetro `ContaBancaria $destino`, sem precisar verificar qual é o tipo exato da conta.

### 10. Exceções de Domínio

Retornar `false` ou `null` pode dificultar a identificação do motivo pelo qual um saque não foi realizado. Utilizar uma exceção específica, como `SaldoInsuficienteException`, permite informar o erro com mais clareza e facilita o tratamento de situações em que as regras financeiras não são atendidas.