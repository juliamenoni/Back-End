# Sistema de Manutenção do SENAI - TPM Industrial

Objetivo: Para consolidae os conceitos de Model, Controller e Blade.

## Cenário do projeto

Na indústria paradas não planejadas de máruinas críticas custam milhares de reais por minuto ou horas.
A aplicação deve gerenciar:
1. **Equipamentos Industriais** : tag de patrimônio, setor fabril, criticidade (Alta , Média, Baixa) e status operacional
2. **Ordens de Serviço(O.S)** : Tipo de manutenção(Preventiva, Corretiva, Preditiva), prioridade, técnico responsável, data limite e status (ABERTA, EM_ANDAMENTO, CONCLUIDA)
3. **Painel de Indicadores(Dashboard)**: Calcular em tempo real, equipamentos em operação, ordens de emergência e taca de conformidade de manutenção


## Configuração de ambiente de Trabalho e Desenvolvimento
 
- Configurar o .env

1. APP_KEY
2. Informações da Base de Dados (Banco de Dados)

- Criar o Banco de Dados

CREATE DATABASE senai_manutencao;

## Criar os Models

php artisan make:model NomeDoModelo -m

Equipamento (tag, nome, setor, criticidade, status)

OrdemServico (codigo, titulo, (int)equipamentoId, tipo, prioridade, status, tecnico, dataAbertura, prazoLimite)

Criar os Controllers via Artisan

`php artisan make:controller NomeController --resource`