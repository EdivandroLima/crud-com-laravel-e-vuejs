# CRUD com Laravel e Vue.js
Projeto para praticar Laravel+Vue.sj

Demonstração do projeto online: [Clique aqui](https://app-geprodutos.herokuapp.com/)

## Tecnologias utilzadas
- [x] Laravel
- [x] Vue.js
- [x] Bootstrap
- [x] Fontawesome

## Instalação
**Instale as dependências**

```$ composer install --no-scripts```

**Copie o arquivo .env.example**

```$ copy .env.example .env```

**Crie uma nova chave para a aplicação** 

```$ php artisan key:generate```

**Configure o banco de dados (utilizei o MySQL) no arquivo .env e rodar os migrations com:**

```$ php artisan migrate --seed```

**Criar um link simbólico**

```$ php artisan storage:link```

**Iniciando a aplicação**

```$ php artisan serve```