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

```php
php artisan make:model Fornecedor
```

##### Executando as Migrations
php.ini - Remover o ; ```;extension=pdo_sqlite```

Listagem das migrates e informa se já foi executada
```php
php artisan migrate:status
```

Reverte todas as migrações do banco - do mais novo para o antigo - rollback
```php
php artisan migrate:reset
```

Reverte todas as migrações e na sequência roda o migrate, criando um banco de dados zerado
```php
php artisan migrate:refresh
```

Faz o drop de todos os objetos do banco de dados + o migrate para recriar os objetos
```php
php artisan migrate:fresh
```

(UP) Mais antiga para a mais atual
```php
php artisan migrate
```

(UP) Rodar uma migration com o caminho (--path)
```php
php artisan migrate --path="database/migrations/2022_01_15_205953_create_produtos_table"
```

(DOWN) Da mais atual para a mais antiga
```php
php artisan migrate:rollback
```

(DOWN) Passos - batch - step
```php
php artisan migrate:rollback --step=2
```

```php
php artisan make:migration create_fornecedores_table
```

```php
php artisan make:migration alter_fornecedores_novas_colunas
```

```php
php artisan make:migration create_produtos_table
```

```php
php artisan make:migration create_produto_detalhes_table
```

```php
php artisan make:migration create_unidades_table
```

```php
php artisan make:migration ajuste_produtos_filiais
```

```php
php artisan make:migration alter_fornecedores_nova_coluna_site_com_after
```

signed - aceita valores negativos <br>
unsigned - não aceita valores negativos

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
```
CREATE DATABASE sg
```

```
USE sg
```

```
SELECT * FROM migrations;
```

```
DESCRIBE fornecedores;
```

```
DESCRIBE site_contatos;
```

```
DESCRIBE produtos;
```

```
DESCRIBE produto_detalhes;
```

##### Testando o PDO
```php
php -r "var_dump(extension_loaded('pdo_mysql'));"
```

Se retornar false, acessar o php.ini e remover o ; da linha: ```;extension=pdo_mysql```

##### Eloquent ORM - Laravel utiliza Active Record 
Dois padrões: Data Mapper e Active Record

##### Tinker
Console interativo nativo do Laravel <br>
```php
php artisan tinker
```

```php
$contato = new \App\SiteContato();
```

```php
$contato->nome = 'Lucas';
```

```php
$contato->telefone = '(51) 98611-4444';
```

```php
$contato->email = 'lucas@contato.com.br';
```

```php
$contato->motivo_contato = 1;
```

```php
$contato->mensagem = 'Olá! Gostaria de mais detalhes sobre o Super Gestão.';
```

Método vem da classe Model
```php
print_r($contato->getAttributes());
```

Método vem da classe Model
```php
$contato->save();
```

```php
$contato2 = new \App\SiteContato();
```

```php
$contato2->nome = 'Fulano';
```

```php
$contato2->telefone = '(51) 98611-0000';
```

```php
$contato2->email = 'fulano@contato.com.br';
```

```php
$contato2->motivo_contato = 2;
```

```php
$contato2->mensagem = 'Estou gostando muito do Super Gestão.';
```

```php
print_r($contato2->getAttributes());
```

```php
$contato2->save();
```

```php
php artisan tinker
$f = new \App\Fornecedor();
$f->nome = 'Fornecedor XYZ';
$f->site = 'fornecedorxyz.com.br';
$f->uf = 'RS';
$f->email = 'contato@fornecedorxyz.com.br';
print_r($f->getAttributes());
$f->save();
```

```php
php artisan tinker
\App\Fornecedor::create(['nome' => 'Fornecedor ABC', 'site' => 'fornecedorabc.com.br', 'uf' => 'SP', 'email' => 'contato@fornecedor.com.br']);
```

```php
php artisan tinker
// $fornecedores = \App\Fornecedor::all();
use \App\Fornecedor;
$fornecedores = Fornecedor::all();
print_r($fornecedores->toArray());
foreach($fornecedores as $f) { echo $f->nome; echo ' - '; }
```

```php
php artisan tinker
use \App\Fornecedor;
$fornecedores2 = Fornecedor::find(2);
echo $fornecedores2->nome;
$fornecedores2 = Fornecedor::find([1, 2, 3, 4]);
foreach($fornecedores2 as $f) { echo $f->nome; echo ' - '; }
```

```php
/**
 * where (comparação) operadores lógicos
 * >
 * >=
 * <
 * <=
 * <>
 * ==
 * like
 */

php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::where('id', '>', 1);
$contatos = SiteContato::where('id', '>', 1)->get();
```

```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::whereIn('motivo_contato', [1, 3])->get();
$contatos = SiteContato::whereNotIn('motivo_contato', [1, 3])->get();
```