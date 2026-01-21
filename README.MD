# 🎬 MyMovieLib

A Symfony 6.4 web application for managing films and actors.

---

## 📸 Screenshots

### Films Gallery
Browse your movie collection with a beautiful card-based interface, showing movie posters, genres, release years, and cast information.

![Films Gallery](docs/films-gallery.png)

### Actor Profile
View detailed actor information including nationality, salary, and their filmography.

![Actor Profile](docs/actor-profile.png)

### Add New Actor
Simple form to add new actors to your database and associate them with films.

![Add Actor Form](docs/add-actor-form.png)

### Add New Film
Create new film entries with title, poster image, release date, and genre.

![Add Film Form](docs/add-film-form.png)

---

## ✨ Features

- 🎥 **Film Management** - Add, edit, and delete films with poster images
- 🎭 **Actor Management** - Manage actors with nationality and salary information
- 🔗 **Film-Actor Association** - Link actors to their films
- 🏷️ **Genre Categories** - Organize films by genre (Western, Crime, Drama, etc.)
- 🎨 **Modern UI** - Clean and responsive card-based interface

---

## 📑 Table of Contents

- [Requirements](#requirements)
- [Getting Started](#getting-started)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)
- [Running Tests](#running-tests)
- [Useful Commands](#useful-commands)
- [Project Structure](#project-structure)
- [License](#license)

---

## 📋 Requirements

- **PHP** >= 8.1
- **Composer** >= 2.0
- **PostgreSQL** >= 16
- **Symfony CLI** (recommended)

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/your-username/projet_film_symfony.git
cd projet_film_symfony
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure environment variables

Copy the `.env` file and adjust the database connection:

```bash
cp .env .env.local
```

Edit `.env.local` and update the `DATABASE_URL`:

```dotenv
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
```

### 4. Create the database

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

---

## ⚙️ Configuration

| Variable | Description | Default |
|----------|-------------|---------|
| `APP_ENV` | Application environment | `dev` |
| `APP_SECRET` | Secret key for security | - |
| `DATABASE_URL` | PostgreSQL connection string | - |

---

## ▶️ Running the Application

### Using Symfony CLI (recommended)

```bash
symfony server:start
```

The application will be available at `http://127.0.0.1:8000`

### Using PHP built-in server

```bash
php -S 127.0.0.1:8000 -t public
```

---

## 🧪 Running Tests

```bash
php bin/phpunit
```

Or with verbose output:

```bash
php bin/phpunit --verbose
```

---

## 📝 Useful Commands

| Command | Description |
|---------|-------------|
| `php bin/console cache:clear` | Clear the application cache |
| `php bin/console doctrine:migrations:migrate` | Run database migrations |
| `php bin/console doctrine:migrations:diff` | Generate a migration |
| `php bin/console make:entity` | Create a new entity |
| `php bin/console make:controller` | Create a new controller |
| `php bin/console debug:router` | List all routes |
| `composer dump-autoload` | Regenerate autoload files |

---

## 📁 Project Structure

```
projet_film_symfony/
├── assets/              # Frontend assets (CSS, JS)
├── bin/                 # Console executables
├── config/              # Configuration files
├── migrations/          # Database migrations
├── public/              # Web root directory
├── src/                 # Application source code
│   ├── Controller/      # Controllers
│   ├── Entity/          # Doctrine entities
│   ├── Repository/      # Doctrine repositories
│   └── Kernel.php       # Application kernel
├── templates/           # Twig templates
├── tests/               # Test files
├── translations/        # Translation files
├── var/                 # Cache and logs
└── vendor/              # Composer dependencies
```

---

## 📄 License

This project is proprietary software.
