# Laravel React Starter Kit (Multi-Tenant SaaS)

A robust, modern starter kit designed for building multi-tenant SaaS applications. This project seamlessly integrates a powerful Laravel backend with a reactive React frontend, leveraging Inertia.js to bridge the gap without the need for a separate API. It comes pre-configured with industry-standard tools for multi-tenancy, authentication, UI components, and developer experience.

## ✨ Features

- **Frameworks:** Laravel 13 & React 19
- **Routing & State:** Inertia.js v2 (No API required)
- **Multi-Tenancy:** Automated tenant routing and database separation using `stancl/tenancy` v3
- **Authentication:** Headless authentication powered by Laravel Fortify
- **Styling:** Tailwind CSS v4
- **UI Components:** Accessible, unstyled React components via Radix UI
- **Language:** Fully typed with TypeScript
- **Tooling:** Vite for lightning-fast HMR, ESLint & Prettier for code quality, Pest for testing

## 📋 Prerequisites

Before you begin, ensure you have the following installed on your local machine:
- PHP ^8.3
- Composer
- Node.js & npm (or yarn/bun)
- A supported database (SQLite, MySQL, PostgreSQL)

## 🚀 Getting Started

Follow these steps to get your development environment set up quickly.

### 1. Clone the Repository

```bash
git clone https://github.com/EngMohammed40/laravel-react-starter-kit-multi-tenant
cd react-starterkit-saas
```

### 2. Setup Project

```bash
# Install PHP dependencies
composer install

# Setup environment file
cp .env.example .env
php artisan key:generate

# Run database migrations
php artisan migrate

# Install Node dependencies and build assets
npm install
npm run build
```

### 3. Start the Development Server

You can start the Laravel backend, Vite development server, and queue listener all at once using our custom composer script:

```bash
composer dev
```

If you prefer to start them manually, open separate terminal tabs and run:
- `php artisan serve`
- `npm run dev`
- `php artisan queue:listen`

Your application should now be accessible at `http://localhost:8000`.

## 🛠️ Commands & Tooling

We provide several helpful commands for testing and linting to maintain code quality:

### Backend (Composer)
- `composer lint`: Run Laravel Pint to automatically fix PHP code styling.
- `composer lint:check`: Check PHP code styling without modifying files.
- `composer test`: Run the Pest test suite.
- `composer ci:check`: Run all linting, formatting, and tests.

### Frontend (NPM)
- `npm run lint`: Run ESLint and automatically fix issues.
- `npm run format`: Format React/TypeScript files using Prettier.
- `npm run types:check`: Run TypeScript compilation check.

## 🏢 Multi-Tenancy Architecture

This boilerplate uses `stancl/tenancy` for its multi-tenancy core. By default, it supports database-level or schema-level separation. 
- Tenant routes are typically located in `routes/tenant.php`.
- Central/Admin domain routes remain in `routes/web.php`.
- Upon user registration, you can hook into the core logic to automatically provision a new tenant and domain.

## 📄 License

This starter kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
