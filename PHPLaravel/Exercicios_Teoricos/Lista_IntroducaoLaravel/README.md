# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA - INTRODUÇÃO AO FRAMEWORK LARAVEL 11.X E ARTISAN CLI


***Julia Guerra Menoni - 1DEV46BT2***

## `Parte A: Questões Teóricas de Fixação`

### 1. Evolução Arquitetural: Quais foram os principais aprendizados técnicos obtidos na construção do MVC artesanal da Semana 12 que permitiram que você compreendesse o Laravel 11 com facilidade?

Na construção do MVC artesanal, aprendemos a separar as responsabilidades do sistema entre Model, View e Controller. Isso facilitou o entendimento de como o Laravel organiza seus arquivos, gerencia rotas e conecta as diferentes partes da aplicação.

### 2. A Nova Arquitetura do Laravel 11: O que mudou na estrutura de inicialização do Laravel 11 em relação às versões anteriores (Laravel 9 e 10)? Onde fica o novo ponto central de configuração?

O Laravel 11 simplificou sua estrutura, reduzindo a quantidade de arquivos de configuração inicial. O principal ponto de configuração passou a ser o arquivo `bootstrap/app.php`, onde são configuradas rotas, middlewares e tratamento de exceções.

### 3. Padrão 12-Factor App: Por que é uma violação grave de segurança gravar senhas de banco de dados diretamente dentro do arquivo config/database.php em vez de utilizar o arquivo .env?

Gravar senhas diretamente no código é um risco porque elas podem ser expostas quando o projeto é compartilhado ou enviado ao Git. O arquivo `.env` permite armazenar informações sensíveis separadamente do código-fonte.

### 4. O Papel da APP_KEY: Qual é o risco técnico de alterar a APP_KEY de uma aplicação que já está em produção há meses com usuários reais cadastrados?

Alterar a APP_KEY pode invalidar dados criptografados anteriormente, como cookies e sessões dos usuários. Isso pode fazer com que usuários precisem entrar novamente no sistema e dados criptografados antigos não possam mais ser recuperados.

### 5. Isolamento de Diretórios: Por que um servidor web de produção (Nginx/Apache) deve apontar rigorosamente para a pasta public/ e nunca para a raiz do projeto Laravel?

O servidor deve apontar apenas para a pasta `public/` porque ela contém os arquivos que podem ser acessados externamente. Isso protege arquivos internos, como `.env`, configurações, código-fonte e dependências.

### 6. Artisan CLI: Qual é a diferença prática entre executar um script PHP procedural com php arquivo.php e executar comandos através do php artisan?

O comando `php arquivo.php` executa um script PHP diretamente. Já o `php artisan` executa comandos próprios do Laravel, permitindo utilizar recursos do framework, como rotas, modelos, configurações e banco de dados.

### 7. O Arquivo .env.example: Por que manter o arquivo .env.example sempre atualizado é indispensável para o sucesso de equipes de desenvolvimento que utilizam Git?

O `.env.example` serve como modelo para configurar o ambiente de outros desenvolvedores. Mantê-lo atualizado facilita a instalação do projeto e permite que toda a equipe utilize as mesmas configurações básicas sem compartilhar senhas.

### 8. Motor de Templates Blade: Qual é a diferença entre a diretiva Blade {{ $variavel }} e a diretiva {!! $variavel !!} em termos de proteção contra ataques Cross-Site Scripting (XSS)?

A diretiva `{{ $variavel }}` escapa automaticamente o conteúdo HTML, ajudando a evitar ataques XSS. Já `{!! $variavel !!}` exibe o conteúdo sem escapar, podendo executar códigos HTML ou JavaScript maliciosos.

### 9. Responsabilidade do Controller: Em uma aplicação profissional com Laravel, por que um método de Controller deve ser curto (≤ 20 linhas) e não deve conter consultas SQL cruas ou regras de negócio extensas?

O Controller deve ter métodos curtos porque sua responsabilidade é receber requisições e direcioná-las para as operações necessárias. Consultas e regras de negócio extensas dificultam a manutenção e podem ser separadas em Models, Services ou Form Requests.

### 10. A Ferramenta Tinker: Para que serve o comando php artisan tinker e em quais situações ele economiza tempo do desenvolvedor durante testes de laboratório?

O comando `php artisan tinker` abre um terminal interativo para executar códigos PHP dentro do Laravel. Ele permite testar modelos, consultar configurações e experimentar operações sem precisar criar arquivos ou rotas temporárias.

---