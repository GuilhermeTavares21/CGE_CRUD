# Projeto CRUD com Laravel 

Esta é uma aplicação Laravel para você anotar tudo o que estiver pensando. Anote seus pensamentos, crie histórias inspiradoras e emocionantes!


## Pré-requisitos

Certifique-se de ter os seguintes pré-requisitos instalados em sua máquina:

- PHP >= 7.3
- Composer
- Node.js

## Instalação

Siga os passos abaixo para configurar e rodar o projeto localmente:

### 1. Clone o repositório

```bash
git clone https://github.com/GuilhermeTavares21/CGE_CRUD.git
cd CGE_CRUD
```

### 2. Instale as dependências do PHP e Node.js

```bash
composer install
npm install
```

### 3. Crie um arquivo '.env'
Crie um arquivo .env na raiz do projeto e copie o conteúdo do arquivo .env.example para ele. Atualize as informações do banco de dados no arquivo .env:

```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### 4. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 5. Inicie o servidor de desenvolvimento

```bash
php artisan serve
```

A aplicação estará disponível em http://localhost:8000.
