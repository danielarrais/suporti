# Suporti

Trabalho apresentado para a disciplina Linguagens e Técnicas de Programação V 2018/1, em 02 de abril de 2018

## Linguagem

O projeto tratasse de um sistema simples de chamado, desenvolvido com **Laravel** **5.3.** 
Ele contém: rotas, formularios de cadastros, sistemas de autenticação e autorização, migrations para geração das tabelas etc.

## Executar o projeto

Antes de rodar o comando de execução, deve-se executar o comando `composer update`, para que as extensões necessárias sejam baixadas pelo **composer**. Após isso, o comando `composer dump-autoload` deve ser executado para que o composer gere os **autoloads**.

**Obs.:** esse comando necessitam do **composer** instalado na máquina, e configurado nas váriaveis de ambiente.
Ele pode ser baixado aqui: https://getcomposer.org/. Depois de baixado, ele deve ser adicionado as variáveis de ambiente do SO. No windows a pasta bin do composer fica em *C:\ProgramData\ComposerSetup\bin*.

Para rodar o projeto, basta executar o comando `php artisan serve` no CMD/Terminal, dentro da pasta do projeto.

**Obs.:** o PHP, no caso, deve está configurado nas variáveis de ambiente. Caso não esteja, deve ser passado no comando, em vez de php, todo o caminho do executável dele.

## Configuração do banco de dados

Ele suporta SQLite, PGgres e Mysql. Para configurar basta alterar os valores no arquivo **.env**, de acordo com a conexão a ser utilizada.
Feito isso, basta rodar o comando `php artisan migrate` para que as tabelas sejam geradas. Como não há seeders no projeto, o banco é gerado, porém não é alimentado.

Por isso há um script ([ScriptWithInserts.sql](https://gitlab.com/danielarraiscarvalho/suporti/blob/master/ScriptWithInserts.sql "ScriptWithInserts.sql")) para MySQL com a estrutura de criação das tabelas e seus respectivos inserts. No caso no SQlite, já há um banco no projeto com a estrutura pronta e alguns valores básicos inseridos, para o PGree, a inserção deve ser feita manual.

## Usuários básicos do sistema

##### **Usuario MASTER:**

login: **da@gmail.com**
senha: **123456**

##### **Usuario USER (comum):**

login: **sa@gmail.com**
senha: **123456**

**Obs.:** esses usuário só estão disponíveis para quem utilizou o script [ScriptWithInserts.sql](https://gitlab.com/danielarraiscarvalho/suporti/blob/master/ScriptWithInserts.sql "ScriptWithInserts.sql") para o MySQL ou o banco SQLite já disponibilizado.