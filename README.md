<h3 align="center">Desenvolvimento Web Avançado 2022 com PHP, Laravel e Vue.JS</h3>

---

**[WINDOWS] - Preparando-se para o desenvolvimento**
* [PHP](https://www.php.net/downloads)

Windows downloads - Zip <br>
Extrair o zip em uma pasta e mover para: ```C:\``` <br>

```php
php --version
```

Adicionar o caminho do diretório PHP no path das variáveis de ambiente <br>
php.ini-development renomear para php.ini (Ambiente de Desenvolvimento)

* [Composer](https://getcomposer.org/)
- Download 
    - Windows Installer 
        - Composer-Setup.exe

```
composer --version
``` 

```
composer self-update
```

**Configurando a memória limite do PHP**
```
php -r "echo ini_get('memory_limit');"
php --ini

-1 = Ilimitado
memory_limit = -1 
```

**Modificando a versão do Composer**
```
composer --version
composer --help

C:\ProgramData\ComposerSetup\bin\

Versão do curso: 1.10.7
```

* [Laravel](https://laravel.com)

**Configuração para buscar os pacotes no packagist:**
```
composer config -g repo.packagist composer https://packagist.org
```

**Configuração GitHub:**
```
composer config -g github-protocols https ssh
```

**Forçando a instalação do Laravel 7.0.:**
```
composer create-project --prefer-dist laravel/laravel projeto_laravel_via_composer "7.0"
```

**Localhost:**
```
cd public/
```

```php
php -S localhost:80
```

**Introdução as Rotas, Controllers e Views**
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

**Rotas - Organização das Rotas no Laravel:**
- API;
- Channels;
- Console; e
- Web.

```php
php artisan route:list
```

**Controllers**
```php
php artisan make:controller PrincipalController
```

```php
php artisan make:controller TesteController
```

```php
php artisan make:controller FornecedorController
```

**Extensão: laravel-blade**

**Limpar as views compiladas do cache**
```php
php artisan view:clear
```

**csrf (Garante segurança no envio de dados do form)**
- Cross-site request forgery ou falsificação de solitação entre sites.

**Model (-m = Migration)**
```php
php artisan make:model SiteContato -m
```

```php
php artisan make:model Fornecedor
```

**Executando as Migrations**
- php.ini - Remover o ; ```;extension=pdo_sqlite```

**Listagem das migrates e informa se já foi executada**
```php
php artisan migrate:status
```

**Reverte todas as migrações do banco - do mais novo para o antigo - rollback**
```php
php artisan migrate:reset
```

**Reverte todas as migrações e na sequência roda o migrate, criando um banco de dados zerado**
```php
php artisan migrate:refresh
```

**Faz o drop de todos os objetos do banco de dados + o migrate para recriar os objetos**
```php
php artisan migrate:fresh
```

**(UP) Mais antiga para a mais atual**
```php
php artisan migrate
```

**(UP) Rodar uma migration com o caminho (--path)**
```php
php artisan migrate --path="database/migrations/2022_01_15_205953_create_produtos_table"
```

**(DOWN) Da mais atual para a mais antiga**
```php
php artisan migrate:rollback
```

**(DOWN) Passos - batch - step**
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

**SGBD MySQL**
* [Download](https://dev.mysql.com/downloads/installer/)

Custom -> <br>
MySQL Servers -> MySQL Server <br>
Applications -> MySQL Workbench <br>
High Availabity -> Standalone MySQL Server / Classic MySQL Replication <br>
Type and Networking -> Config Type: Development Computer (Reserva menos memória) <br>
Authentication Method -> RECOMMENDED <br>
Accounts and Roles -> Definir a senha <br>
Windows Service -> - [x] Start the MySQL Server at System Startup <br><br>
Serviços do Windows -> MySQL80

**Query**
```
cd c:/xampp/mysql/bin
```

```
mysql.exe -u root -p
```

```
CREATE DATABASE sg;
```

```
USE sg;
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

**Testando o PDO**
```php
php -r "var_dump(extension_loaded('pdo_mysql'));"
```

Se retornar false, acessar o php.ini e remover o ; da linha: ```;extension=pdo_mysql```

**Eloquent ORM - Laravel utiliza Active Record**
- Dois padrões: Data Mapper e Active Record

**Tinker - Console interativo nativo do Laravel**
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

**Método vem da classe Model**
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

```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::whereBetween('id', [3, 6])->get();
$contatos = SiteContato::whereNotBetween('id', [3, 6])->get();
```

```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::where('nome', '<>', 'Fernando')->whereIn('motivo_contato', [1, 2])->whereBetween('created_at', ['2022-01-15 23:27:54', '2022-01-15 23:29:57'])->get();
```

```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::where('nome', '<>', 'Fernando')->orWhereIn('motivo_contato', [1, 2])->orWhereBetween('created_at', ['2022-01-15 23:27:54', '2022-01-15 23:29:57'])->get();
```

---

**Selecionando registros com whereNull() e whereNotNull()**
```php
php artisan tinker
use \App\SiteContato
$contatos = SiteContato::whereNull('updated_at')->get();
$contatos = SiteContato::whereNotNull('updated_at')->get();
$contatos = SiteContato::whereNotNull('updated_at')->orWhereNull('created_at')->get();
```

---

**Selecionando registros com base em parâmetros do tipo data e hora**
```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::whereDate('created_at', '2022-01-15')->get();
$contatos = SiteContato::whereDay('created_at', '15')->get();
$contatos = SiteContato::whereMonth('created_at', '01')->get();
$contatos = SiteContato::whereYear('created_at', '2022')->get();
$contatos = SiteContato::whereTime('created_at', '=', '23:27:54')->get();
$contatos = SiteContato::whereTime('created_at', '>', '23:00:00')->get();
```

---

**Selecionando registros com whereColumn()**
```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::whereColumn('created_at', 'updated_at')->get(); // Não compara valores nulos
$contatos = SiteContato::whereColumn('created_at', '=', 'updated_at')->get();
$contatos = SiteContato::where('id', '>', 0)->whereColumn('created_at', 'updated_at')->get();
```

---

**Selecionando registros aplicando precedência em operações lógicas**
```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::where(
    function($query) { 
        $query->where('nome', 'Lucas')
        ->orWhere('nome', 'Fulano');
    }
)->where(
    function($query) { 
        $query->whereIn('motivo_contato', [1, 2])
        ->orWhereBetween('id', [4, 6]); 
    }
)->get();
```

---

**Ordenando registros**
```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::all();
$contatos = SiteContato::orderBy('nome', 'asc')->get();
$contatos = SiteContato::orderBy('nome', 'desc')->get();
$contatos = SiteContato::orderBy('motivo_contato')->orderBy('nome', 'desc')->get();
```

---

**Introdução as Collections**

[Collections](https://laravel.com/docs/9.x/collections)

---

**Collection first, last e reverse**
```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::where('id', '>', 3)->get();
$contatos->first();
$contatos->last();
$contatos->reverse(); // ordem reversa
```

---

**Collection toArray e toJson**
```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::all()->toArray();
$contatos = SiteContato::all()->toJson();
```

---

**Collection pluck**
```php
php artisan tinker
use \App\SiteContato;
$contatos = SiteContato::all()->pluck('email');
$contatos = SiteContato::all()->pluck('email', 'nome');
```

---

**Atualizando registros (save)**
```php
php artisan tinker
use \App\Fornecedor;
$fornecedor = Fornecedor::find(1);
$fornecedor->nome = 'Fornecedor 123';
$fornecedor->site = 'fornecedor123.com.br';
$fornecedor->email = 'contato@fornecedor123.com.br';
print_r($fornecedor);
$fornecedor->save();
```

---

**Atualizando registros (fill e save)**
```php
php artisan tinker
use \App\Fornecedor;
$fornecedores2 = Fornecedor::find(2);
$fornecedores2->fill(['nome' => 'Fornecedor 789', 'site' => 'fornecedor789.com.br', 'email' => 'fornecedor789@gmail.com']);
$fornecedores2->save();
```

---

**Atualizando registros (where e update)**
```php
php artisan tinker
use \App\Fornecedor;
Fornecedor::whereIn('id', [1, 2])->update(['nome' => 'Fornecedor Teste', 'site' => 'teste.com.br']);
```

---

**Deletando registros (delete e destroy)**
```php
php artisan tinker

use \App\SiteContato;

$contato = SiteContato::find(4);
$contato->delete();

SiteContato::where('id', 7)->delete();

SiteContato::destroy(5);
```

---

**Deletando registros com SoftDelete**
```php
php artisan make:migration alter_fornecedores_softdelete

php artisan migrate:status
php artisan migrate

php artisan tinker

use \App\Fornecedor;

$fornecedor = Fornecedor::find(2);
$fornecedor->delete(); // Removido mas segue na tabela

Fornecedor::all();

$fornecedor = Fornecedor::find(1);
$fornecedor->forceDelete(); // Removido da tabela
```

---

**Selecionando e restaurando registros deletados com SoftDelete**
```php
php artisan tinker

use \App\Fornecedor;

Fornecedor::withTrashed()->get();

Fornecedor::create(['nome' => 'Fornecedor 1', 'site' => 'fornecedor1.com.br', 'uf' => 'RS', 'email' => 'contato@fornecedor1.com.br']);

Fornecedor::onlyTrashed()->get();

$fornecedor = Fornecedor::withTrashed()->get();
$fornecedor[0]->restore();
```

---

**Gravando os dados do formulário no banco de dados**
```php
$contato = new SiteContato();

$contato->nome = $request->input('nome');
$contato->telefone = $request->input('telefone');
$contato->email = $request->input('email');
$contato->motivo_contato = $request->input('motivo_contato');
$contato->mensagem = $request->input('mensagem');

print_r($contato->getAttributes());

$contato->save();
```

---

**Validação de quantidades mínimas e máximas de caracteres (min e max)**

* [Validation](https://laravel.com/docs/9.x/validation)
* [Available Validation Rules](https://laravel.com/docs/9.x/validation#available-validation-rules)

---

**Criando o Seeder de Fornecedor**
```php
php artisan make:seeder FornecedorSeeder
```

**Execução de Todos os Seeders**
```php
php artisan db:seed
```

**Criando o Seeder de SiteContato**
```php
php artisan make:seeder SiteContatoSeeder
```

**Execução do Seeder SiteContato**
```php
php artisan db:seed --class=SiteContatoSeeder
```

---

**Criando a Factory SiteContato**
```php
php artisan make:factory SiteContatoFactory --model=SiteContato
```

---

**Criando a Model e Migration de Motivo Contato**

```
php artisan make:model MotivoContato -m
```

**Criando o Seeder de MotivoContato**
```php
php artisan make:seeder MotivoContatoSeeder
```

**Verificando o status**
```php
php artisan migrate:status
```

**Executando o migrate**
```php
php artisan migrate
```

**Execução do Seeder MotivoContato**
```php
php artisan db:seed --class=MotivoContatoSeeder
```

---

**Adicionando a FK motivo_contatos no site_contatos**
```php
php artisan make:migration alter_table_site_contatos_add_fk_motivo_contatos
```

```php
php artisan migrate:status
```

```php
php artisan migrate
```

---

**Limpar os registros**
```
TRUNCATE site_contatos;
```

---

**Criando um middleware**
* [Middleware](https://laravel.com/docs/8.x/middleware)

```php
php artisan make:middleware LogAcessoMiddleware
```

---

**Migration e Model de LogAcesso**
```php
php artisan make:model LogAcesso -m
```

```php
php artisan migrate:status
php artisan migrate
```

```
SELECT * FROM log_acessos;
```

```php
php artisan route:list
```

---

**Encadeamento de middlewares (criando um middleware de autenticação)**
```php
php artisan make:middleware AutenticacaoMiddleware
```

---

**Implementando o formulário de Login**
```php
php artisan make:controller LoginController
```

---

**Validando a existência do usuário e senha no Banco de Dados**
```
INSERT INTO users(name, email, password) values('Lucas', 'lucas@contato.com.br', '1234');
```

---

**Implementando o menu de opções da área protegida da aplicação**
```php
php artisan make:controller HomeController
```

```php
php artisan make:controller ClienteController
```

```php
php artisan make:controller ProdutoController
```

**Implementando o cadastro de fornecedores parte 5 (remoção de registros)**
```php
Fornecedor::find($id)->delete();
Fornecedor::find($id)->forceDelete(); // Ignora o soft delete
```

---

**Controladores com resources**
- index() -> Exibir lista de registros
- create() -> Exibir formulário de criação de registro
- store() -> Receber formulário de criação de registro
- show() -> Exibir registro específico
- edit() -> Exibir formulário de edição do registro
- update() -> Receber formulário de edição do registro
- destroy() -> Receber dados para remoção do registro


```php
php artisan make:controller --help

php artisan make:controller --resource ProdutoController --model=Produto
yes
```

---

**Criando rotas associadas aos resources de um controlador**
```php
php artisan route:list
```

---

**Implementando o cadastro de produtos parte 1 (index)**
```php
php artisan make:model Unidade
```

```php
php artisan tinker
```

```
use App\Unidade;
```

```
Unidade::create(['unidade' => 'UN', 'descricao' => 'Unidade']);
```

```
use App\Produto;
```

```
Produto::create(['nome' => 'Geladeira', 'descricao' => 'Geladeira/Refrigerador', 'peso' => 60, 'unidade_id' => 1]);
Produto::create(['nome' => 'TV', 'descricao' => 'Smart TV LED 42', 'peso' => 8, 'unidade_id' => 1]);
```

---

**Eloquent ORM 1 para 1 - Implementando produto detalhes parte 1**
```php
php artisan make:model ProdutoDetalhe
```

```php
php artisan make:controller --resource ProdutoDetalheController
```
