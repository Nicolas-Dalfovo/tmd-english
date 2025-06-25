# 📚 TMD English - Escola de Inglês

![Laravel](https://img.shields.io/badge/Laravel-10-red)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue)
![SQLite](https://img.shields.io/badge/Database-SQLite-green)
![Bootstrap](https://img.shields.io/badge/Frontend-Bootstrap_5-purple)

## 📖 Sobre o Projeto

O **TMD English** é uma aplicação web desenvolvida em Laravel que permite aos usuários gerenciar um catálogo completo de uma escola de inglês. Sistema completo com CRUD, relacionamentos, busca e interface moderna seguindo a identidade visual da escola.

## ✨ Funcionalidades

- ✅ **CRUD Completo** para Alunos e Cursos
- ✅ **Relacionamento Many-to-Many** entre tabelas
- ✅ **Sistema de Busca** por nome/email
- ✅ **Filtros** por nível e status
- ✅ **Interface Responsiva** com Bootstrap 5
- ✅ **Templates Blade** reutilizáveis
- ✅ **Dashboard** com estatísticas
- ✅ **Identidade Visual** da TMD English
- ✅ **Galeria de Imagens** da sala de aula

## 🛠️ Tecnologias

- **Backend**: Laravel 10, PHP 8.1+
- **Frontend**: Blade Templates, Bootstrap 5, Bootstrap Icons
- **Banco de Dados**: SQLite (padrão) / MySQL
- **Estilização**: CSS customizado com gradientes
- **Fontes**: Cormorant Garamond, Gill Sans

## 🚀 Como Executar com XAMPP

### Pré-requisitos

- **XAMPP** com PHP 8.1+ (recomendado: versão mais recente)
- **Composer** (gerenciador de dependências PHP)
- **Git** (para clonar o repositório)

### 📥 Instalação do XAMPP

1. **Baixar XAMPP:**
   - Acesse: https://www.apachefriends.org/
   - Baixe a versão com **PHP 8.1 ou superior**
   - Instale seguindo as instruções do instalador

2. **Verificar Instalação:**
   ```bash
   # Abrir XAMPP Control Panel
   # Iniciar Apache
   # Testar: http://localhost (deve mostrar página do XAMPP)
   ```

### 📥 Instalação do Composer

1. **Baixar Composer:**
   - Acesse: https://getcomposer.org/download/
   - Baixe e instale o Composer para Windows

2. **Verificar Instalação:**
   ```bash
   composer --version
   ```

### 🔧 Configuração do Projeto

#### 1. **Clonar o Repositório**
```bash
git clone https://github.com/seu-usuario/tmd-english.git
cd tmd-english
```

#### 2. **Mover para o XAMPP**
```bash
# Copiar a pasta do projeto para:
C:\xampp\htdocs\tmd-english
```

#### 3. **Instalar Dependências**
```bash
# Navegar para o diretório do projeto
cd C:\xampp\htdocs\tmd-english

# Instalar dependências do Composer
composer install
```

#### 4. **Configurar Ambiente**
```bash
# Copiar arquivo de configuração
copy .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

#### 5. **Configurar Banco de Dados**

**Opção A: SQLite (Recomendado)**
```bash
# Criar arquivo do banco SQLite
echo. > database\database.sqlite

# Editar .env para usar SQLite
# DB_CONNECTION=sqlite
# Comentar outras linhas DB_*
```

**Opção B: MySQL**
```bash
# 1. Iniciar MySQL no XAMPP Control Panel
# 2. Acessar phpMyAdmin: http://localhost/phpmyadmin
# 3. Criar banco: tmd_english
# 4. Editar .env:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=tmd_english
# DB_USERNAME=root
# DB_PASSWORD=
```

#### 6. **Executar Migrations e Seeders**
```bash
# Executar migrations (criar tabelas)
php artisan migrate

# Executar seeders (dados de exemplo)
php artisan db:seed
```

#### 7. **Configurar Virtual Host (Recomendado)**

**Editar httpd-vhosts.conf:**
```apache
# Arquivo: C:\xampp\apache\conf\extra\httpd-vhosts.conf
# Adicionar no final:

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/tmd-english/public"
    ServerName tmd-english.local
    <Directory "C:/xampp/htdocs/tmd-english/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**Editar arquivo hosts:**
```
# Arquivo: C:\Windows\System32\drivers\etc\hosts
# Adicionar linha:
127.0.0.1 tmd-english.local
```

**Habilitar mod_rewrite:**
```apache
# Arquivo: C:\xampp\apache\conf\httpd.conf
# Descomentar linha:
LoadModule rewrite_module modules/mod_rewrite.so
```

#### 8. **Reiniciar Apache**
- No XAMPP Control Panel, clicar em "Stop" e depois "Start" no Apache

#### 9. **Acessar a Aplicação**
```
# Com Virtual Host:
http://tmd-english.local

# Sem Virtual Host:
http://localhost/tmd-english/public
```

## 🔧 Solução de Problemas Comuns

### ❌ Erro: "could not find driver"

**Problema:** Driver SQLite não habilitado no PHP

**Solução:**
```bash
# 1. Localizar php.ini
php --ini

# 2. Editar php.ini e descomentar:
extension=pdo_sqlite
extension=sqlite3

# 3. Reiniciar Apache no XAMPP
```

### ❌ Erro: "Your Composer dependencies require a PHP version >= 8.1"

**Problema:** Versão do PHP muito antiga

**Solução:**
- Atualizar XAMPP para versão com PHP 8.1+
- Ou usar: `composer install --ignore-platform-reqs` (não recomendado)

### ❌ Erro: "Failed to open stream" (storage)

**Problema:** Permissões da pasta storage

**Solução:**
```bash
# Criar pastas necessárias
mkdir storage\framework\sessions
mkdir storage\framework\views
mkdir storage\framework\cache
mkdir storage\logs

# Dar permissões (Windows)
icacls storage /grant Everyone:F /T
```

### ❌ Erro: 404 Not Found

**Problema:** Apache não encontra o projeto

**Solução:**
1. Verificar se o projeto está em `C:\xampp\htdocs\tmd-english`
2. Verificar se Apache está rodando
3. Configurar Virtual Host (ver seção 7)
4. Verificar se `mod_rewrite` está habilitado

### ❌ Erro: "Undefined variable $students"

**Problema:** Controller não está enviando variável para a view

**Solução:**
```php
// No CourseController.php, método create():
public function create()
{
    $students = Student::all();
    return view('courses.create', compact('students'));
}
```

## 📊 Estrutura do Banco de Dados

### Tabelas Principais

**Students:**
- id (Primary Key)
- name (string)
- email (string, unique)
- phone (string)
- level (enum: beginner, intermediate, advanced)
- status (enum: active, inactive, pending)
- created_at, updated_at

**Courses:**
- id (Primary Key)
- name (string)
- description (text)
- level (enum: beginner, intermediate, advanced)
- duration_weeks (integer)
- price (decimal)
- max_students (integer)
- start_date, end_date (date)
- schedule (string)
- created_at, updated_at

**course_student (Pivot Table):**
- course_id (Foreign Key)
- student_id (Foreign Key)
- created_at, updated_at

### Relacionamentos

- **Students ↔ Courses**: Many-to-Many (um aluno pode ter vários cursos, um curso pode ter vários alunos)

## 🎨 Interface e Design

- **Cores Principais**: Azul marinho (#0A2463) e Dourado (#E6AF2E)
- **Fontes**: Cormorant Garamond (títulos) e Gill Sans (textos)
- **Layout**: Responsivo com Bootstrap 5
- **Componentes**: Cards, modais, formulários validados
- **Navegação**: Navbar fixa com logo da TMD English

## 📱 Páginas Disponíveis

- **Home** (`/`): Dashboard com estatísticas e destaques
- **Sobre** (`/sobre`): História da escola e metodologia
- **Alunos** (`/students`): CRUD completo de alunos
- **Cursos** (`/courses`): CRUD completo de cursos
- **Contato** (`/contato`): Formulário e informações de contato

## 🔐 Dados de Exemplo

Após executar `php artisan db:seed`, o sistema terá:

**Alunos de Exemplo:**
- João Silva (Intermediário, Ativo)
- Maria Santos (Iniciante, Ativo)
- Pedro Costa (Avançado, Ativo)
- Ana Oliveira (Intermediário, Pendente)
- Carlos Lima (Iniciante, Ativo)

**Cursos de Exemplo:**
- English Basics (Iniciante)
- Intermediate Conversation (Intermediário)
- Advanced Business English (Avançado)

## 🌐 Acesso Externo (Rede Local)

Para permitir que outras pessoas acessem o site na rede local:

1. **Configurar Apache para rede:**
```apache
# httpd.conf - alterar:
Listen 80
# Para:
Listen 0.0.0.0:80
```

2. **Descobrir seu IP:**
```bash
ipconfig
# Anotar IP (ex: 192.168.1.100)
```

3. **Liberar Firewall:**
- Windows Defender → Permitir Apache

4. **Outras pessoas acessam:**
```
http://192.168.1.100/tmd-english/public
# ou
http://192.168.1.100 (se virtual host configurado)
```

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch (`git checkout -b feature/nova-funcionalidade`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova funcionalidade'`)
4. Push para a branch (`git push origin feature/nova-funcionalidade`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Autor

**Seu Nome**
- GitHub: [@seu-usuario](https://github.com/seu-usuario)
- LinkedIn: [Seu Perfil](https://linkedin.com/in/seu-perfil)

## 📞 Suporte

Se encontrar problemas:

1. Verifique a seção "Solução de Problemas Comuns"
2. Consulte a documentação do Laravel: https://laravel.com/docs
3. Abra uma issue no GitHub

---

⭐ Se este projeto te ajudou, deixe uma estrela!

## 🔄 Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recriar banco de dados
php artisan migrate:fresh --seed

# Verificar rotas
php artisan route:list

# Iniciar servidor de desenvolvimento
php artisan serve --port=8000

# Ver logs
tail -f storage/logs/laravel.log
```

