### Desenvolvimento Web Avançado 2021 com PHP, Laravel e Vue.JS

##### [WINDOWS] - Preparando-se para o desenvolvimento
[PHP](https://www.php.net/downloads) <br>
Windows downloads - Zip <br>
Extrair o zip em uma pasta e mover para: ```C:\``` <br>

```php
php --version
``` 

<br>

Adicionar o caminho do diretório PHP no path das variáveis de ambiente<br>
php.ini-development renomear para php.ini (Ambiente de Desenvolvimento)<br>

[Composer](https://getcomposer.org/) <br>
Download - Windows Installer - Composer-Setup.exe <br>

```
composer --version
``` 

```
composer self-update
```

[Laravel](https://laravel.com) <br>
Configuração para buscar os pacotes no packagist:
```
composer config -g repo.packagist composer https://packagist.org
```

Configuração GitHub:
```
composer config -g github-protocols https ssh
```

Forçando a instalação do Laravel 7.0.:
```
composer create-project --prefer-dist laravel/laravel projeto_laravel_via_composer "7.0"
```

Localhost:
```
cd public/
```

```php
php -S localhost:80
```

##### Introdução as Rotas, Controllers e Views
```
composer create-project --prefer-dist laravel/laravel app_super_gestao "7.0.0"
```

```php
php artisan list
```

```php
php artisan -V
```

```php
php artisan serve
```

##### Rotas
Organização das Rotas no Laravel: <br>
- API;
- Channels;
- Console; e
- Web.

```php
php artisan route:list
```

##### Controllers
```php
php artisan make:controller PrincipalController
```

```php
php artisan make:controller TesteController
```

```php
php artisan make:controller FornecedorController
```

##### Extensão: laravel-blade

##### Limpar as views compiladas do cache
```php
php artisan view:clear
```

##### csrf (Garante segurança no envio de dados do form)
Cross-site request forgery ou falsificação de solitação entre sites.

##### Model (-m = Migration)
```php
php artisan make:model SiteContato -m
```

##### Executar as Migrations
php.ini - Remover o ; ```;extension=pdo_sqlite```

```php
php artisan migrate
```

##### SGBD MySQL
[Download](https://dev.mysql.com/downloads/installer/) <br>
Custom -> <br>
MySQL Servers -> MySQL Server <br>
Applications -> MySQL Workbench <br>
High Availabity -> Standalone MySQL Server / Classic MySQL Replication <br>
Type and Networking -> Config Type: Development Computer (Reserva menos memória) <br>
Authentication Method -> RECOMMENDED <br>
Accounts and Roles -> Definir a senha <br>
Windows Service -> - [] Start the MySQL Server at System Startup <br><br>
Serviços do Windows -> MySQL80

##### Query
```sql
CREATE DATABASE sg
```

```sql
USE sg
```

##### Testando o PDO
```php
php -r "var_dump(extension_loaded('pdo_mysql'));"
```

Se retornar false, acessar o php.ini e remover o ; da linha: ```;extension=pdo_mysql```