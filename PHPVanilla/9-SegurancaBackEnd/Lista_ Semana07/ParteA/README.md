
# XSS e Segurança em PHP

 ## 1. Conceituação OWASP: o que significa XSS?

 `**XSS (Cross-Site Scripting)**` é uma vulnerabilidade que permite que dados fornecidos por um usuário sejam interpretados pelo navegador como código, geralmente JavaScript.

 Ela é considerada uma vulnerabilidade que afeta o lado do cliente porque o código malicioso acaba sendo executado no navegador da vítima. Porém, a prevenção também é responsabilidade do Back-End, principalmente quando o servidor gera HTML utilizando dados fornecidos pelo usuário.

 A proteção deve ser feita de acordo com o contexto, principalmente utilizando `**validação de entrada e codificação adequada na saída**`.

---

 ## 2. XSS Refletido vs. XSS Gravado (Stored)

 ### XSS Refletido (Reflected)

 O conteúdo malicioso é enviado pelo atacante em uma requisição e é imediatamente refletido na resposta do servidor. Normalmente, a vítima precisa acessar uma URL ou realizar uma ação que contenha o conteúdo malicioso.

 ### XSS Gravado (Stored)

 O conteúdo malicioso é armazenado pela aplicação, geralmente em um banco de dados, e posteriormente apresentado para outros usuários.

* Exemplos de locais onde isso pode acontecer:

 - Comentários
- Mensagens
- Perfis
- Fóruns
- Campos de cadastro

 Por isso, **um Stored XSS pode ter um potencial de impacto maior**, especialmente quando o conteúdo é exibido para muitos usuários ou administradores. Porém, a gravidade real depende do contexto, dos privilégios das vítimas e de quais funcionalidades são afetadas.

---

 ## 3. Mecanismo de Escapamento com `htmlspecialchars()`

 A função `htmlspecialchars()` transforma caracteres especiais em entidades HTML.

 Por exemplo:

```php
$texto = '<script>alert("XSS")</script>';
echo htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
```

 O resultado será interpretado pelo HTML aproximadamente como:

```php
&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;
```
O navegador não executa o conteúdo porque `&lt;` e `&gt;` são interpretados como **texto**, e não como os delimitadores de uma tag HTML.

 Assim, em vez de criar:

```
<script>
```
o navegador recebe algo equivalente a texto contendo `<script>`Portanto, o conteúdo deixa de ser interpretado como uma tag HTML.

---

 ## 4. Flag `ENT_QUOTES`

 A flag `ENT_QUOTES` faz com que `htmlspecialchars()` também escape **aspas simples e duplas**.

 Exemplo:

```php
htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
```

 Isso é especialmente importante em atributos HTML:

```php
<input type="text" value="<?= htmlspecialchars($valor, ENT_QUOTES, 'UTF-8') ?>">
```

 > Sem o tratamento das aspas, um valor malicioso poderia tentar fechar o atributo `value` e adicionar outros atributos HTML. Por isso, ao inserir dados de usuários em atributos HTML, é importante utilizar a codificação apropriada, incluindo o tratamento das aspas.

---

 ## 5. Por que não utilizar `FILTER_SANITIZE_STRING` no PHP 8.3?
   
 O `FILTER_SANITIZE_STRING` não deve ser utilizado em projetos modernos porque foi deprecated no PHP 8.1.
> Deprecated -> função ou código ainda funciona, mas não é mais recomendado para uso

Além disso, ele não é uma proteção adequada contra XSS. Para evitar XSS, devemos tratar o dado de acordo com o local onde ele será exibido. Por exemplo, quando colocamos um valor dentro de HTML, podemos utilizar:

```php
htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
```
Assim, o conteúdo fornecido pelo usuário é tratado como texto e não como código HTML.

---

 ## 6. Validação de E-mail: `empty()` vs. `filter_var()`

 As duas funções possuem objetivos diferentes.

 ### `empty()`

```
empty($email);
```

 Verifica se o valor é considerado vazio pelo PHP. Ela **não valida se o conteúdo é um e-mail válido**.

* Por exemplo:

```php
$email = "abc";
empty($email); // false
```

 O valor não está vazio, mas também não representa um endereço de e-mail válido.

 ### `filter_var()`


```php
filter_var($email, FILTER_VALIDATE_EMAIL);
```

 É utilizado para verificar se o valor possui um formato de e-mail considerado válido pelo filtro do PHP.

* Exemplo:

```php
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo "E-mail inválido";
}
```

 >A validação de formato não garante que o endereço realmente exista ou que a caixa postal esteja ativa.

---

 ## 7. Roubo de Sessão através de XSS

 Se uma aplicação possui XSS, o JavaScript malicioso pode ser executado no contexto do site da vítima. Historicamente, um dos objetivos poderia ser tentar obter o cookie de sessão através de JavaScript. Entretanto, cookies configurados com `HttpOnly` não podem ser acessados diretamente por JavaScript através de `document.cookie`.

 Exemplo:

```
Set-Cookie: PHPSESSID=...; HttpOnly; Secure
```

 O `HttpOnly` reduz o risco de roubo direto do cookie através de JavaScript, mas **não corrige a vulnerabilidade XSS**. Um XSS ainda pode permitir que o atacante execute ações no contexto da vítima, manipule a página e acesse informações que estejam disponíveis para o código executado.

>Por isso, `HttpOnly` deve ser considerado uma camada adicional de proteção, e não uma substituição para a correção do XSS.

---

 ## 8.Por que **strip_tags()** não substitui **htmlspecialchars()**?

 >`strip_tags()` e `htmlspecialchars()` possuem objetivos diferentes.

 **strip_tags()** tenta remover tags HTML:

```php
$nome = strip_tags($_POST['nome']);
```

Já **htmlspecialchars()** transforma caracteres especiais para que sejam tratados como **dados**, e não como HTML:

```php
$nome = htmlspecialchars(
    $_POST['nome'],
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);
```

 Por exemplo:

```php
echo '<input value="' .
     htmlspecialchars($nome, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') .
     '">';
```
*A sanitização realizada na entrada não deve ser considerada substituta da codificação na saída. Isso ocorre porque o mesmo dado pode ser utilizado posteriormente em diferentes contextos.*



