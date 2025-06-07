# 📆 agenda_tarefas

**agenda_tarefas** é uma aplicação web para gerenciamento de tarefas, permitindo cadastrar, listar, editar e excluir tarefas com informações como datas, descrição e status.

## 🛠️ Funcionalidades

- ✅ Cadastro de tarefas com título, descrição, datas de início e término, e status.
- 📋 Listagem dinâmica de tarefas com exibição responsiva.
- ✏️ Edição do status da tarefa por meio de modal.
- 🗑️ Exclusão de tarefas com confirmação.
- 🔄 Interface dinâmica usando AJAX (jQuery).
- 🎨 Interface moderna com TailwindCSS.

## 💻 Tecnologias utilizadas

- **Frontend:** HTML, CSS (Tailwind), JavaScript (jQuery)
- **Backend:** PHP
- **Banco de Dados:** MySQL (MariaDB)

## 📂 Estrutura do Projeto

```
agenda_tarefas/
├── index.html                  # Página principal com interface do sistema
├── cadastrar_tarefa_simples.php # Endpoint para cadastrar tarefa
├── listar_tarefas_simples.php  # Endpoint para listar tarefas (não enviado, mas usado)
├── atualizar_status.php        # Endpoint para atualizar o status de uma tarefa
├── excluir_tarefa.php          # Endpoint para excluir uma tarefa
├── conexao.php                 # Script de conexão com o banco de dados
├── tarefas.sql                 # Script SQL para criação e popularização da tabela
```

## 🧪 Como executar o projeto localmente

### Pré-requisitos

- PHP 7.4 ou superior
- MySQL/MariaDB
- Navegador moderno

### Passo a passo

1. Clone ou copie os arquivos para seu servidor local.
2. Importe o banco de dados com o arquivo `tarefas.sql`:

```sql
CREATE DATABASE agenda_tarefas;
USE agenda_tarefas;
-- Execute o conteúdo do arquivo tarefas.sql aqui
```

3. Atualize o arquivo `conexao.php` com as credenciais do seu banco de dados:

```php
$host = 'localhost';
$usuario = 'seu_usuario';
$senha = 'sua_senha';
$banco = 'agenda_tarefas';
```

4. Inicie o servidor PHP:

```bash
php -S localhost:3000
```

5. Acesse o sistema em: [http://localhost:3000/index.html](http://localhost:3000/index.html)

## 📝 Exemplo de uso

1. Preencha o formulário para adicionar uma nova tarefa.
2. Visualize todas as tarefas listadas abaixo.
3. Utilize os botões de editar (✏️) e excluir (🗑️) ao lado de cada tarefa.

## 📌 Observações

- O projeto ainda pode ser expandido com autenticação de usuários, filtros por data/status, ou envio de notificações.
- O código utiliza modais para interação com status e exclusão, melhorando a experiência do usuário.

## 📃 Licença

Este projeto é livre para fins educacionais.
