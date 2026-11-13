# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA - SESSÕES, COOKIES e AUTENTICAÇÃO DE USUÁRIOS

***Julia Guerra Menoni***

## Parte A — Exercícios Teóricos de Fixação

### 1. Protocolo Stateless

> O HTTP é chamado de *stateless* porque não armazena automaticamente as informações das requisições anteriores. Por isso, utilizamos cookies e sessões para manter informações do usuário, como o login, durante a navegação pelo sistema.

### 2. Cookies vs. Sessões

> Os cookies armazenam informações no navegador do usuário, enquanto as sessões guardam os dados no servidor. As sessões são mais seguras para informações confidenciais, pois os dados não ficam diretamente expostos no navegador.

### 3. A Flag HttpOnly

> A configuração `httponly => true` impede que códigos JavaScript acessem o cookie da sessão. Isso dificulta o roubo do identificador de sessão em ataques XSS. Porém, não impede todos os tipos de ataques.

### 4. A Flag SameSite

> O atributo `SameSite=Lax` controla quando os cookies podem ser enviados em requisições feitas a partir de outros sites. Ele ajuda a proteger a aplicação contra ataques CSRF, que tentam realizar ações sem a autorização do usuário.

### 5. Ataque de Fixação de Sessão

> O *Session Fixation* acontece quando um invasor tenta fazer com que o usuário utilize um identificador de sessão que ele já conhece. Para evitar isso, utilizamos `session_regenerate_id(true)` após o login, criando um novo identificador e apagando o anterior.

### 6. MD5 e Rainbow Tables

> MD5 e SHA-256 não são indicados para armazenar senhas porque são algoritmos muito rápidos, facilitando os testes de várias combinações por invasores. As *Rainbow Tables* são tabelas com hashes já calculados, que ajudam a descobrir possíveis senhas originais. Por isso, utilizamos algoritmos próprios para senhas, como Argon2id e Bcrypt.

### 7. O Papel do Salt

> O *Salt* é um valor aleatório utilizado junto com a senha durante a geração do hash. Ele faz com que duas pessoas com a mesma senha tenham hashes diferentes, dificultando a descoberta das senhas. No PHP, o `password_hash()` gera esse valor automaticamente.

### 8. Argon2id vs. Bcrypt

> O Argon2id é considerado uma opção mais moderna porque utiliza memória e processamento para gerar os hashes, dificultando ataques realizados com placas de vídeo e outros equipamentos. O Bcrypt também é seguro, mas não possui o mesmo recurso de custo de memória do Argon2id.

### 9. Timing Attacks

> A função `password_verify()` é utilizada para verificar se uma senha corresponde ao hash armazenado no banco de dados. Ela realiza essa comparação de forma segura, ajudando a evitar ataques de temporização. Já o operador `===` apenas compara valores e não é indicado para verificar senhas armazenadas em hash.
