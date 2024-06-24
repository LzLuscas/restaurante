# Sabor Bonsucesso
Bem-vindo ao repositório do Sabor Bonsucesso! Este projeto é um site completo para um restaurante, desenvolvido com tecnologias front-end (HTML, CSS, JavaScript) e back-end (PHP) e utilizando MySQL para o banco de dados. O site oferece funcionalidades tanto para clientes quanto para administradores, proporcionando uma experiência de usuário eficiente e uma gestão simplificada para o restaurante.

## Funcionalidades INFORMAÇÕES PRECISAM DE REVISÃO

### Para os Clientes
- **Visualização do cardápio:** Explore nosso cardápio completo com descrições e preços.
- **Realização de compras:** Faça pedidos diretamente pelo site (é necessário estar logado).
- **Cadastro:** Crie uma conta com verificação de e-mail para maior segurança.
- **Login:** Acesse sua conta com autenticação de dois fatores para maior segurança.
- **Fale Conosco:** Envie mensagens e feedbacks através do formulário de contato.

### Para o Administradores
- **Gestão do cardápio:** Adicione, edite ou remova itens do cardápio facilmente.
- **Consulta de usuários:** Veja uma lista completa dos usuários cadastrados.
- **Consulta de pagamentos:** Acesse registros detalhados de pagamentos efetuados.
- **Gestão de pedidos:** Visualize, gerencie e altere o status dos pedidos feitos.
- **Logs de entrada:** Consulte registros de logins no sistema.
- **Fale Conosco:** Visualize mensagens enviadas pelos clientes.

## Tecnologias Utilizadas INFORMAÇÕES PRECISAM DE REVISÃO adicionar frameworks, librarys e APIs

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Banco de Dados:** MySQL

## Pré-requisitos de instalação ALTERAR PARA POR INFORMAÇÕES REAIS

- PHP 7.4+
- MySQL 5.7+
- Servidor local (XAMPP, WAMP, etc.)

## Instalação ALTERAR PARA POR INFORMAÇÕES REAIS

1. **Clone o repositório:**
    ```bash
    git clone https://github.com/seuusuario/sabor-bonsucesso.git
    ```

2. **Navegue até o diretório do projeto:**
    ```bash
    cd sabor-bonsucesso
    ```

3. **Configure o banco de dados:**
    - Crie um banco de dados MySQL e importe o arquivo `database.sql` que se encontra no diretório `/sql`.
    - Configure as credenciais de acesso ao banco de dados no arquivo `config.php`.

4. **Inicie o servidor local:**
    - Se estiver usando o XAMPP ou WAMP, mova os arquivos do projeto para o diretório apropriado (`htdocs` ou `www`).

5. **Acesse o site:**
    - Abra o navegador e digite `http://localhost/sabor-bonsucesso`.

## Estrutura do Projeto INFORMAÇÕES PRECISAM DE REVISÃO

- `/css`: Arquivos de estilos CSS
- `/js`: Scripts JavaScript
- `/php`: Scripts PHP para o backend
- `/sql`: Scripts SQL para configuração do banco de dados
- `/img`: Imagens usadas no site

## Screenshots ALTERAR PARA POR INFORMAÇÕES REAIS

![Página Inicial](screenshots/home.png)
![Página do Cardápio](screenshots/menu.png)
![Página de Login](screenshots/login.png)

## Rotas e Endpoints ALTERAR PARA POR INFORMAÇÕES REAIS

- **GET /menu**: Exibe o cardápio
- **POST /login**: Autenticação de usuário
- **POST /register**: Registro de novo usuário
- **POST /order**: Realização de pedido (requer autenticação)
- **GET /admin/orders**: Consulta de pedidos (administrador)
- **POST /contact**: Envio de mensagem pelo formulário "Fale Conosco"

## FAQ

**Como posso resetar minha senha?**
- Acesse a página de login e clique em "Esqueci minha senha". Você receberá um e-mail com instruções.

**Posso acessar o site sem estar logado?**
- Sim, mas algumas funcionalidades, como fazer pedidos, requerem que você esteja logado.

## Contato ALTERAR PARA POR INFORMAÇÕES REAIS

Para suporte ou dúvidas, entre em contato pelo e-mail: suporte@saborbonsucesso.com

---

Desenvolvido por [Gabriel Quaresma](https://github.com/qu4resm4), [Lucas](https://github.com/), [Oseias](https://github.com/), [Bruno](https://github.com/), [Jorge Luiz](https://github.com/) e [Jorge José](https://github.com/).
