# Exercícios Teóricos de Fixação

*I1DEV46B T2 - Julia Guerra Menoni* - 11/09/2026
---

>1.0- Diferença Estrutural: Explique a diferença física entre onde os dados são anexados em uma requisição GET e em uma requisição POST.

*Resposta*: No `GET`, os dados do formulário são anexados à URL, depois do ?, no formato de parâmetros de consulta. Exemplo: **pagina.php?nome=Joao&idade=20.**
No `POST`, os dados são enviados no body da requisição HTTP, não ficando expostos na URL.

>2.0- Segurança e Privacidade: Por que senhas de usuário nunca devem ser enviadas via método GET? Cite pelo menos dois locais onde essa senha ficaria gravada de forma insegura.

*Resposta*: Senhas não devem ser enviadas via GET porque ficam visíveis na URL e podem ser armazenadas em locais como:

- Histórico do navegador;
- Logs do servidor/proxy;
- URLs salvas em favoritos ou compartilhadas.

**O correto é utilizar `POST` e, para proteger a senha durante o transporte.**


>3.0- Coalescência Nula: Por que a instrução $nome = $_POST['nome']; dispara um Warning na primeira vez que a página é carregada no navegador? Como o operador ?? resolve isso?

*Resposta*: Na primeira vez que a página é carregada, normalmente ainda não existe um envio POST. Portanto, $_POST['nome'] não existe. 

Exemplo:
```php
$nome =  $_POST["nome"];
```
- o PHP gera um warning "nome inexistente". 

- O operador `??` permite fornecer um valor padrão:

```php
$nome = $_POST["nome"] ?? "";
```

Isso significa: use `$_POST['nome']`se existir; caso contrário, use uma string vazia.

>4.0- Idempotência: O que significa dizer que uma requisição GET é idempotente? Por que atualizar ou deletar dados no banco usando links GET é uma má prática de segurança?

*Resposta*: Uma operação é **idempotente** quando executá-la *uma* ou *várias vezes* produz o **mesmo efeito final**. O `GET` é projetado para ser idempotente, para consultar recursos sem alterá-los.

- Usar links GET para atualizar ou excluir dados é uma má prática.
 
 *Porque uma simples visita ao link pode provocar uma alteração no banco. Além disso, mecanismos automáticos, pré-carregamento do navegador, crawlers ou bots podem acessar a URL sem que o usuário tenha realmente pretendido executar aquela ação.*

Para alterações, normalmente devem ser usados métodos apropriados, como:
- POST;
- PUT/PATCH;
- DELETE. 

>5.0- Validação Client vs Server: Um desenvolvedor júnior afirma que o formulário dele é 100% seguro porque colocou required e type="email" em todas as tags HTML. Explique por que essa afirmação é falsa.

*Resposta*: A afirmação é falsa porque required, `type="email"` e outras validações HTML acontecem no lado do cliente. O usuário pode desativar o **JavaScript/validação** do navegador, alterar a requisição usando `DevTools` ou simplesmente enviar uma requisição diretamente ao servidor.

Portanto, o servidor deve sempre validar e tratar os dados novamente antes de utilizá-los ou armazená-los.

>6.0- XSS e Sanitização: Qual é o risco de exibir dados vindos de um $_POST diretamente na tela sem utilizar htmlspecialchars()?

*Resposta*: Exibir diretamente um valor vindo de `$_POST` pode permitir XSS (Cross-Site Scripting). Um atacante poderia enviar conteúdo contendo HTML e, se a aplicação o inserir diretamente na página, esse código poderá ser interpretado pelo navegador.

```php
$nome =  $_POST["nome"];
//escrevendo dessa forma, o código pode gerar um aviso de erro.

// a forma correta de escrita é
$nome = $_POST["nome"] ?? "";
// se $_POST´["nome] não existir, use uma string vazia.
```

>7.0- Sticky Forms: O que é a técnica de Sticky Forms e qual é o seu impacto na experiência do usuário (UX)?

*Resposta*: Sticky Forms é uma técnica em que o formulário mantém os valores que o usuário já digitou, especialmente quando ocorre um erro de validação.

Por exemplo, se o usuário preenche `10 campos` e erra apenas o e-mail (esquece de colocar o @ -fulano`@`email.com), os outros 9 campos *continuam preenchidos* após o formulário ser enviado. Evitando o usuário de preencher duas vezes o mesmo formulário

>8.0- DevTools: Como você utilizaria a aba Network do navegador para comprovar que um formulário foi enviado via POST e não via GET?

*Resposta*: Para verificar se um formulário foi enviado por POST:

- Abra o DevTools do navegador;
- Entre na aba Network;
- Envie o formulário;
- Localize a requisição correspondente à página;
- Clique nela e procure o campo `Request Method`.

 >**Se aparecer POST, o formulário foi enviado via POST.**

>**Se aparecer GET, foi enviado via GET.**

---
