### Desenvolvimento Web Avançado 2021 com PHP, Laravel e Vue.JS

##### [WINDOWS] - Preparando-se para o desenvolvimento
[PHP](https://www.php.net/downloads) <br>
Windows downloads - Zip <br>
Extrair o zip em uma pasta e mover para: ```C:\``` <br>
```php --version``` <br>
Adicionar o caminho do diretório PHP no path das variáveis de ambiente<br>
php.ini-development renomear para php.ini (Ambiente de Desenvolvimento)<br><br>

[Composer](https://getcomposer.org/) <br>
Download - Windows Installer - Composer-Setup.exe <br>
```composer --version``` 

```composer self-update```

[Laravel](https://laravel.com) <br>
Configuração para buscar os pacotes no packagist:
```composer config -g repo.packagist composer https://packagist.org```

Configuração GitHub:
```composer config -g github-protocols https ssh```

Forçando a instalação do Laravel 7.0.:
```composer create-project --prefer-dist laravel/laravel projeto_laravel_via_composer "7.0"```

Localhost:
```cd public/```

```php -S localhost:8000```

##### Introdução as Rotas, Controllers e Views
```composer create-project --prefer-dist laravel/laravel app_super_gestao "7.0.0"```

```php artisan list```

```php artisan -V```

```php artisan serve```

##### Rotas
Organização das Rotas no Laravel: <br>
- API;
- Channels;
- Console; e
- Web.

```php artisan route:list```

##### Controllers
```php artisan make:controller PrincipalController```

```php artisan make:controller TesteController```