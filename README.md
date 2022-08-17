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
- **Manualmente**.
- Downloads - https://codeigniter.com/download
- Ex: app_01

- **Composer**
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











































##



##

- By:  **Daniel Oliveira**

  - `Instagram` - https://www.instagram.com/danieloliv3/
  - `Facebook` - https://web.facebook.com/danielsapup3/
  - `Twitter` - https://twitter.com/danielsapup3/
  - `Linkedin` - https://www.linkedin.com/in/danielsapup3/

  ##
