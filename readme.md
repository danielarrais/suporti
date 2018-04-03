# Suporti

Trabalho apresentado para a disciplina Linguagens e Técnicas de Programação V 2018/1, em 02 de abril de 2018

## Linguagem

O projeto tratasse de um sistema simples de chamado, desenvolvido com **Laravel** **5.3.** 
Ele contém: rotas, formularios de cadastros, sistemas de autenticação e autorização, migrations para geração das tabelas etc.

## Executar o projeto

Para rodar o projeto, basta executar o comando `php artisan serve` no CMD/Terminal, dentro da pasta do projeto.

**Obs.:** o PHP, no caso, deve está configurado nas variáveis de ambiente. Caso não esteja, deve ser passado no comando, em vez de php, todo o caminho do executável dele.

## Configuração do banco de dados

Ele suporta SQLite, PGgres e Mysql. Para configurar basta alterar os valores no arquivo **.env**, de acordo com a conexão a ser utilizada.
Feito isso, basta rodar o comando `php artisan migrate` para que as tabelas sejam geradas. Como não há seeders no projeto, o banco é gerado, porém não é alimentado.

Por isso há um script para o MySQL com a estrutura do banco e seus inserts. No caso no SQlite, já há um banco no projeto com alguns valores básicos inseridos, para o PGree, a inserção deve ser feita manual.

