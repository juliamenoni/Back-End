# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA - Controllers e Routes no LARAVEL

***Julia Guerra Menoni - 1DEV46BT2***

---

## `Parte A – Questões Teóricas de Fixação`

### 1. Semântica RESTful: Por que uma ação de exclusão de dados nunca deve ser implementada através de uma requisição HTTP do tipo GET? Explique o risco associado a robôs de busca.

O método GET deve ser usado apenas para consultar dados, nunca para excluir. Robôs de busca podem acessar links automaticamente e, se a exclusão fosse feita por GET, poderiam apagar dados sem a intenção do usuário.

### 2. Idempotência: O que significa o conceito de idempotência no protocolo HTTP e por que o método PUT é considerado idempotente enquanto o POST não é?

Idempotência significa que executar uma requisição várias vezes produz o mesmo resultado final que executá-la uma única vez. O PUT é idempotente porque atualiza um recurso para um estado definido. Já o POST pode criar vários registros se for executado repetidamente.

### 3. Resource Controllers: Quais são as 7 ações canônicas geradas pelo comando php artisan make:controller --resource e qual é a responsabilidade de cada uma?

As 7 ações canônicas são:

- **index:** Lista todos os registros.
- **create:** Exibe o formulário de cadastro.
- **store:** Salva um novo registro.
- **show:** Exibe os detalhes de um registro.
- **edit:** Exibe o formulário de edição.
- **update:** Atualiza um registro existente.
- **destroy:** Exclui um registro.

### 4. Injeção de Dependências: Como o Service Container do Laravel entrega automaticamente uma instância de Request ao método do controller sem que tenhamos que instanciá-la com new Request()?

O Service Container identifica os parâmetros do método do controller e fornece automaticamente uma instância de Request. Assim, não precisamos criar o objeto manualmente com `new Request()`.

### 5. Method Spoofing: Por que os navegadores web não conseguem enviar requisições nativas de PUT e DELETE através de formulários HTML convencionais? Como o Laravel contorna essa limitação?

Os formulários HTML convencionais aceitam apenas GET e POST. O Laravel contorna essa limitação usando `@method('PUT')` ou `@method('DELETE')`, identificando o método desejado através de um campo oculto.

### 6. Ataques CSRF: O que é um ataque do tipo Cross-Site Request Forgery e como a diretiva Blade @csrf impede que sites maliciosos forjem requisições em nome do usuário?

É um ataque em que um site malicioso tenta executar ações em nome de um usuário autenticado. A diretiva `@csrf` gera um token de segurança que o Laravel verifica para confirmar que a requisição é legítima.

### 7. Constraints de Rota: Para que servem métodos de restrição como whereNumber('id') ou whereAlphaNumeric('codigo') e qual código de status HTTP o Laravel retorna quando o formato é violado?

Servem para restringir os valores aceitos em uma rota, garantindo que os parâmetros tenham formatos específicos. Se o formato não corresponder, o Laravel retorna o erro HTTP **404 (Not Found)**.

### 8. Rotas Nomeadas: Cite duas vantagens corporativas de utilizar a função auxiliar route('clientes.show', $id) nas views em vez de escrever strings estáticas como "/clientes/{$id}".

Duas vantagens são:

- **Facilidade de manutenção:** Se o endereço da rota mudar, não precisamos alterar todos os links nas views.
- **Organização:** Facilita identificar e reutilizar rotas pelo nome, evitando erros de digitação.

### 9. Single Responsibility no Controller: Por que a validação de formulários com $request->validate() ou Form Requests deve ser mantida enxuta dentro do controller para respeitar o limite de 20 linhas por função?

A validação deve ser enxuta para evitar que o controller acumule muitas responsabilidades. Isso facilita a manutenção, a leitura e a reutilização do código. Validações maiores podem ser colocadas em Form Requests.

### 10. A Ferramenta route:list: Como o comando php artisan route:list auxilia equipes multidisciplinares a documentar e auditar os endpoints disponíveis em uma API ou aplicação web?

O comando `php artisan route:list` mostra todas as rotas cadastradas, seus métodos HTTP, endereços e controllers responsáveis. Isso facilita a documentação, a organização e a auditoria dos endpoints pela equipe.