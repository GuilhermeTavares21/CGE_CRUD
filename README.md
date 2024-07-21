# Projeto CRUD com Laravel 

Este é um aplicação Laravel para você anotar tudo o que estiver pensando. Anote seus pensamentos, crie histórias inspiradoras e emocionantes!

A aplicação está disponível em: https://guilhermeprates.com.br/pensamentos

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
DB_CONNECTION=mysql
DB_HOST=srv1577.hstgr.io
DB_PORT=3306
DB_DATABASE=u114805268_cge_crud
DB_USERNAME=u114805268_root
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
