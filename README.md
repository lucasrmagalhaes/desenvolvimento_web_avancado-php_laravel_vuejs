**Configurando o Vue.JS no Laravel**

Iniciar o projeto Laravel
```
composer create-project --prefer-dist laravel/laravel=8.5.9 
```

Instalar o pacote UI
```
composer require laravel/ui:^3.2.1
```

Gerar o esqueleto do projeto com Vue.JS e autenticação web nativa (scaffold / esqueleto)
```php
php artisan ui vue --auth
```

Baixar as dependências de front-end
```
npm install
```

Produzindo o bundle de front-end
```
npm run dev
```
