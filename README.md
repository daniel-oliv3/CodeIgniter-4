### 1 - PHP, CODEIGNITER DICAS & SOLUÇÕES.

## Sobre esta Playlist...
- Não é uma playlist para aprender **Codelgniter** do `zero`.
- Aprofundar os conhecimentos da framework.
- Dicas e pequenos projetos para desenvolvimento de soluções web.
- Destaque de novidades na evolução do framework.

## Requisitos Necessários.
- HTML, CSS, JS, PHP, MySQL, Terminal, Etc...
- Laragon, Visual Studio Code, HeidiSQL, Git, Composer, Google Chrome.

## Porquê o **CodeIgniter** vc Laravel?
- Ambas são frameworks Full Stack de PHP.
- Laravel é mais conceituada e com mais demanda de mercado.
- **CodeIgniter**: MVC, configuração simples, desenvolvimento rápido, fácil de aprender.
- Laravel: Arquitetura limpa, mais robusto, com grande ecosistema.
- **CodeIgniter** tem uma performace mais rápida do que o laravel.
- **CodeIgniter** para projetos de média escala.
- Laravel para média e grande escala.


### 2 - COMO PREPARAR UM AMBIENTE DE DESENVOLVIMENTO PARA PHP.
## CodeIgniter.
- Site - https://codeigniter.com/
- Documentação - https://codeigniter.com/user_guide/index.html

## Laragon.
- Site - https://laragon.org/

## HeidiSQL.
- Site - https://www.heidisql.com/download.php

### **Versão mais atual do PHP, no HeidiSQL**.
- Site - https://windows.php.net/

- **Baixar**: VS16 x64 Non Thread Safe `Zip`.

- Criar a pasta **php-8.1.9-nts-Win32-vs16-x64** dentro de `C:\laragon\bin\php`, e colar todos os arquivos da pasta zip.

### Terminal (`Laragon`) Cmder.
- Verificando a **versão** do PHP.
```
php -v
```

### Editar as variáveis de ambiente do sistema.
- Variáveis de ambiente/path/editar

- colar o caminho `C:\laragon\bin\php\php-8.1.9-nts-Win32-vs16-x64\` 

## Visual Studio Code.
- Site - https://code.visualstudio.com/

### Extenções no Vscode
- PHP tools

## FiraCode.
- Fonts para o editor.
- Site - https://github.com/tonsky/FiraCode/releases

## Monoid.
- Site - https://larsenwork.com/monoid/

## Composer.
- Site - https://getcomposer.org/
- Verifica a versão instalada do compser.

```
composer -v
```

## Git.
- Git Bash (Terminal).
- Site - https://git-scm.com/download/



### 3 - CRIAR UM PROJETO MANUALMENTE OU COM O COMPOSER.
**Manualmente**.
- Downloads - https://codeigniter.com/download
- Ex: app_01

**Composer**.
- Install - https://codeigniter.com/user_guide/installation/installing_composer.html#installation
```
composer create-project codeigniter4/appstarter app_02
```
- Ex: app_02

### 4 - AMBIENTE DE PRODUÇÃO VS AMBIENTE DE DESENVOLVIMENTO.
- Ex: app_03


### 5 - CONECTAR O CODEIGNITER A UMA BASE DE DADOS.
- Ex: app_04

## Sparks.
```
php spark make:model Usuario
```
- Cria o arquivo models Usuarios.php na pasta: `app/Models/Usuarios.php`.


### 6 - CI AUTH INTRODUÇÃO.
**Sistema de Autenticação e Autorização**.
- Autenticação (`authentication`).
    - Permite verificar se o usúsario pode ou não entrar no sistema.
- Autorização (`authorization`).
    - Permite verificar se que áreas ou funcionalidades um usuário pode aceder.

**Sistema de Autenticação e Autorização**.
- É um sistema tradicional de **login** com muitos detalhes.
    - Preparação do projeto.
    - Migrações (`migrations`).
    - Criar contas de usuário.
    - Confirmação via email.
    - Encriptação de dados pessoais e senhas.
    - Recuperação de senha.
    - Alteração de senha.
    - Login/Logout.
    - Controle de autorizações.
    - ... e muito mais.

**Link** - https://codeigniter.com/download
- Ex: app_05
- Localhost: http://localhost/CodeIgniter-4/app_05/public/
- Extenção VsCode - `PHP Intelephense`.

- Rotas `app/Config/Routes.php`

## PHP Spark.
```
php spark
```
- Cria o ficheiro do controlador
```
php spark make:controller Main
```

### 7 - CI AUTH BASE DE DADOS E MIGRATIONS.
- Ex: app_06

```
php spark make:migration Usuarios
```

```
php spark migrate
```

### 8 - CI AUTH SEEDING E ENCRIPTAÇÃO
- Ex: app_07

```
php spark make:seeder usuarios
```

**Extenção Visual Studio code**
    - `Random String Generator` 
- Visual Studio code, 
- Ctrl + p, ">generate", ... random string/password, , .

```
php spark db:seed Usuarios
```

```
php spark migrate:rollback
```

```
php spark migrate
```

**Comando para pesquisar na tabela descriptado**
- SELECT AES_DECRYPT(username, UNHEX(SHA2('3y8FHYGfThUpcvE0AC25Sj5OlsD17Ab8', 512))) usuario, passwrd FROM users


### 9 - CI AUTH FORMULÁRIO DE LOGIN.
- Ex: app_08

## Bootstrap.
- Site: https://getbootstrap.com/ 


### 10 - CI AUTH MODEL E VERIFICAÇÃO DE LOGIN.
- Ex: app_09

**Validação do formulário**.
- Model users
    - Buscar os dados do utilizador a partir do formulário submetido.
    - Retorno de true ou false, consoane login ok ou nok.

```
php spark make:model User
```

### 11 - CI AUTH ANÁLISE DE LOGIN COM HELPER.
- Ex: app_10

- Usuario logado?
    - Não -> mostra quadro login
    - Sim -> mostra página interior



### 12 - CI AUTH CAPTAÇÃO DE DADOS APÓS LOGIN COM SUCESSO.
- Ex: app_11

- Logout: Google Chrome, `F12/Application/Storage/Clear site data`

### 13 CI AUTH REFATORAR O CÓDIGO.
- Ex: app_12

```
php spark make:controller UserController
```

### 14 - CI AUTH USANDO FILTERS.
- Ex: app_13

- Filters: https://codeigniter.com/user_guide/incoming/filters.html?highlight=filters

**Filters**
```
php spark make:filter User/UserFilter
```
- Localhost: http://localhost/CodeIgniter-4/app_13/public/
- Localhost: http://localhost/CodeIgniter-4/app_13/public/index.php/home

### 15 - CI AUTH MELHORAR AS REGRAS DE NEGÓCIO DA APLICAÇÃO.
- Ex: app_14


### 16 - CI AUTH IMPLEMENTAÇÃO DOS FILTERS.
- Ex: app_15

```
php spark make:filter UserLoggedInFilter
```

### 17 - CI AUTH INTRODUÇÃO À VALIDAÇÃO DO FORMULÁRIO.
- Ex: app_16

- Localhost: http://localhost/CodeIgniter-4/app_16/public/

**Validation Rules**
- https://codeigniter.com/user_guide/libraries/validation.html#available-rules


### 18 - CI AUTH MOSTRAR OS ERROS DE VALIDAÇÃO.
- Ex: app_17

- Bootstrap 5 - https://getbootstrap.com/docs/5.0/utilities/text/


### 19 - CI AUTH VALIDAÇÃO DA PASSWORD E REGEX.
- Localhost: http://localhost/CodeIgniter-4/app_18/public/
- Ex: app_18

**Lista completa spark**
- Spark

```
php spark
```

**db:seed**
- Executa o propagador especificado para preencher dados conhecidos no banco de dados.

```
php spark db:seed usuarios
```

- Teste para **expression regular** `expressão regular`.
- https://regex101.com/

- Regular Expression: `(?=.*\d)(?=.*[a-z])(?=.*[A-Z])`

- https://codeigniter.com/user_guide/libraries/validation.html#available-rules

**regex_match**
- Falha se o campo não corresponder ao normal
expressão.


### 20 - CI AUTH METODOLOGIAS PARA FACILITAR O DESENVOLVIMENTO.
- Facilitar o Login de usuarios na aplicacão em desenvolvimento.
- Ex: app_19

- Localhost: http://localhost/CodeIgniter-4/app_19/public/index.php/login_frm

- Ex: app_20

- Localhost: http://localhost/CodeIgniter-4/app_20/public/index.php/login_frm

### 21 - CI AUTH LOGOUT.
- Ex: app_21

- Localhost: http://localhost/CodeIgniter-4/app_21/public/index.php/login_frm

- http://localhost/CodeIgniter-4/app_21/public/index.php/versessao


### 22 - CI AUTH AREAS COM ACESSO CONTROLADO.
- Ex: app_22

- Localhost: http://localhost/CodeIgniter-4/app_22/public/index.php/login_frm


### 23 - CI AUTH AUTORIZAÇÃO.
- Ex: app_23

- Localhost: http://localhost/CodeIgniter-4/app_23/public/index.php/login_frm

```
php spark db:seed usuarios
```

- http://localhost/CodeIgniter-4/app_23/public/index.php/versessao

```
php spark make:filter User/UserIsAdmin
```

### 24 - CI AUTH ELEMENTOS DO INTERFACE.
- Ex: app_24

- Localhost: http://localhost/CodeIgniter-4/app_24/public/index.php/login_frm

### 25 - CI AUTH PREPARAÇÃO DA CRIAÇÃO DE CONTA DE USUÁRIO.
- Ex: app_25

- Localhost: http://localhost/CodeIgniter-4/app_25/public/index.php/login_frm

```txt
Formulário de nova conta
    Usuario
    Password
    Repetir password

    [Criar]

    |
    |
    |
    v

    Verifica se já existe user com email indicado
        Sim - Não pode criar conta

        Não

        - Criar um código (Purl)
        - Criar a conta nos users
        - Enviar um email com purl (link)
        - Conta está ativa
```

##

```
php spark migrate:rollback
```

```
php spark migrate
```

```
php spark db:seed usuarios
```

### 26 - CI AUTH FORMULÁRIO DE CRIAÇÃO DA CONTA DE USUÁRIO.
- Ex: app_26

- Localhost: http://localhost/CodeIgniter-4/app_26/public/index.php/login_frm

- Localhost: http://localhost/CodeIgniter-4/app_26/public/index.php/new_user_account_frm

- Validation: https://codeigniter.com/user_guide/libraries/validation.html?highlight=validation#available-rules

```txt
matches  |  Yes  | O valor deve corresponder ao valor do campo
no parâmetro.  | matches[field]
```

### 27 - CI AUTH VERIFICAR SE CONTA JÁ EXISTE.
- Ex: app_27


### 28 - CI AUTH CRIAR CONTA DE UTILIZADOR COM PURL.
- Ex: app_28

- Localhost: http://localhost/CodeIgniter-4/app_28/public/index.php/login_frm

```txt

Create new user account
    - Guardar os dados de username e password
    - Gerar um purl (Guardado na base de dados)
    - retornar o purl

Send email with purl to validation email address
    - Preparar um email com o purl
    - Enviar o email para username

```

### 29 - CI AUTH COMO CRIAR UM PURL.
- Ex: app_29

- http://localhost/CodeIgniter-4/app_29/public/index.php/login_frm
- http://localhost/CodeIgniter-4/app_29/public/index.php/teste


### 30 - CI AUTH ENVIO DO EMAIL COM O PURL
- Ex: app_30

- http://localhost/CodeIgniter-4/app_30/public/index.php/login_frm

- https://codeigniter.com/user_guide/incoming/routing.html
- https://codeigniter.com/user_guide/libraries/email.html?highlight=email%20class

- Sending Email
```php
//Exemplo
$email = \Config\Services::email();

$email->setFrom('your@example.com', 'Your Name');
$email->setTo('someone@example.com');
$email->setCC('another@another-example.com');
$email->setBCC('them@their-example.com');

$email->setSubject('Email Test');
$email->setMessage('Testing the email class.');

$email->send();
```

### 31 - CI AUTH PREPARAÇÃO DAS LÓGICAS DE CONCLUSÃO DO REGISTO.
- Ex: app_31

- http://localhost/CodeIgniter-4/app_31/public/index.php/login_frm

```sql
SELECT AES_DECRYPT(username, UNHEX(SHA2('sCAI7xPKtgwxfWLBcuvTU5tEnGJYENce', 512))) usuario, purl FROM users
```

```txt
Verificar se o purl é válido (Tamanho)
Verificar se existe o purl na base de dados.
    - Não: Redirecionar para a pagina inicial
    - Sim: 
        Passa a ativo = 1
        Atualiza o updated_at
        remove o purl

        Apresenta uma mensagem a indicar que a conta foi confirmada

```

### 32 - CI AUTH LÓGICAS PARA CONCLUSÃO DO REGISTO
- Ex: app_32

- http://localhost/CodeIgniter-4/app_32/public/index.php/login_frm














































##



##

- By:  **Daniel Oliveira**

  - `Instagram` - https://www.instagram.com/danieloliv3/
  - `Facebook` - https://web.facebook.com/danielsapup3/
  - `Twitter` - https://twitter.com/danielsapup3/
  - `Linkedin` - https://www.linkedin.com/in/danielsapup3/

  ##
