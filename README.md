# VINCENZA


## Descrição
 VINCENZA é uma concessionária online, nosso objetivo é facilitar a vida de quem deseja comprar um carro sem precisar ir para uma loja física, fazemos todo o processo de forma remota, portanto será possível comprar e até mesmo vender seu carro usado para dar de entrada, fazemos parcelas justas além de oferecermos um rico catálogo eficiente.

✅ Requisitos

  + = feito
  +! = parcialmente feito
  ! = não feito


 ! RF01 – O sistema deve permitir o cadastro de usuários >> Samuel
 
 ! RF02 – O usuário deve poder redefinir a senha >> Samuel
 
 +! RF06 – O usuário deve poder alternar para o modo escuro >> Rodrigo terminar
 
 +! RF08 – O sistema deve oferecer suporte a múltiplos idiomas >> Rodrigo terminar
 
 + RF09 – Mostrar possíveis planos de financiamento para compra do carro 
 
 ! RF11 – Informação sobre disponibilidade do veículo no estoque da concessionária >> Samuel
 
 + RF14 – Visualização 360° de todos os carros mais vendidos
 
 + RF15 – Página de oferta de veículos
 
 ! RF16 – Reserva online de veículos >> Rodrigo
 
 + RF18 – Catálogo online de veículos disponíveis

 ! RF19 - Possibilidade de usar um veículo como entrada para adquirir outro veículo, o usuário deve fazer um upload de informações sobre o veículo para que tenha uma análise do nossosistema. >> Samuel, Raul e Rodrigo (ultimo a ser feito)

 ! RF20 - Mostrar os carros mais buscados. >> Raul e Samuel (a decidir)


## Integrantes
Samuel Macedo Cruz Alves - 20302042

Arthur Clark Francisco - 22301216

Rodrigo Gerçóssimo  - 22301617

Gabriel Carvalho  - 22301984

Raul Gonçalves  - 22301771



## Estrutura de Diretórios
(os arquivos html, css, e js está fora da pasta sistema mas posteriormente vamos organizar melhor)
VINCENZA/
├── index.php   
├── App/         
│   ├── Config/               # Configurações do sistema
│   │   └── Database.php      # Configuração do banco de dados
│   ├── Controllers/          # Controladores da aplicação
│   │   ├── CarroController.php
│   │   ├── ClienteController.php
│   │   └── UsuarioController.php
│   ├── Models/               # Modelos de dados
│   │   ├── Carro.php
│   │   ├── Cliente.php
│   │   └── Usuario.php
│   ├── Repositories/         # Camada de acesso a dados
│   │   ├── CarroRepository.php
│   │   ├── ClienteRepository.php
│   │   └── UsuarioRepository.php
│   └── Views/                # Visualizações
│       ├── Carros/
│       │   ├── criar.php
│       │   ├── editar.php
│       │   └── listar.php
│       ├── Clientes/
│       │   ├── criar.php
│       │   ├── editar.php
│       │   └── listar.php
│       └── Usuarios/
│           ├── criar.php
│           ├── editar.php
│           └── listar.php
├── assets/                   # Arquivos estáticos (CSS, JS, imagens)
├── docs/                     # Documentação
└── README.md                 # Este arquivo

## Como Executar o Projeto

### 1. Pré-requisitos
<!-- Liste os requisitos necessários, como linguagens, frameworks, bibliotecas, banco de dados, etc. -->
PHP 7.4 ou superior

MySQL 5.7 ou superior

Apache Web Server

Composer (para gerenciamento de dependências)

### 2. Instalação

```bash
# Clone o repositório
https://github.com/VINCENZAGIT/VINCENZA.git

# Acesse a pasta do projeto
cd VINCENZA

comando-de-instalacao
composer install

### 4. Acesso
<!-- Informe como acessar a aplicação (por exemplo, URL local ou credenciais de teste) --> banco de dados do sistema.
- URL local: http://localhost:3307  
- Usuário padrão: root  
- Senha padrão: mobilelegends@

---

## Observações
<!-- Coloque aqui informações adicionais, como problemas conhecidos, melhorias futuras ou instruções extras -->
Não sabemos como conectar o sistema php com o resto do site mas tudo feito está na pasta sistema.
Nosso modo escuro também não tá funcionando direito vamos revisar isso.
Ademais, melhorias futuras vão consistir em uma melhora na estruturação do projeto e polimento do visual do site, além da finalizaçõ das futuras funcionalidades.
