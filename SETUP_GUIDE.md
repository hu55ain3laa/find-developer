# Find Developer - Setup Guide

A Laravel application for finding and managing developers using Livewire for the public interface and Filament for the admin dashboard.

## Features

- 🔍 **Public Search Interface**: Search developers by job title, experience, location, and skills
- 📊 **Admin Dashboard**: Manage developers and job titles using Filament
- 🎨 **Modern UI**: Clean and responsive design with Tailwind CSS
- ⚡ **Real-time Search**: Live filtering using Livewire
- 📱 **Responsive**: Works on all devices

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite (or any database supported by Laravel)

## Installation

### 1. Install Dependencies

```bash
composer install
npm install
```

### 2. Environment Setup

Create a `.env` file (if not already created):

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 3. Database Setup

The project uses SQLite by default. The database file should already exist at `database/database.sqlite`.

If not, create it:

```bash
touch database/database.sqlite
```

Run migrations:

```bash
php artisan migrate
```

### 4. Seed Sample Data

Populate the database with sample developers and job titles:

```bash
php artisan db:seed --class=DevelopersSeeder
```

Or seed everything including a test user:

```bash
php artisan db:seed
```

### 5. Build Assets

Compile frontend assets:

```bash
npm run build
```

For development with hot reload:

```bash
npm run dev
```

### 6. Start the Application

Start the Laravel development server:

```bash
php artisan serve
```

Visit the application at: `http://localhost:8000`

## Usage

### Public Interface

- **Homepage**: `http://localhost:8000`
  - Search for developers by name, email, location, or skills
  - Filter by job title
  - Filter by years of experience (min and max)
  - Toggle to show only available developers
  - View detailed developer profiles with skills, links, and contact info

### Admin Dashboard

- **Dashboard**: `http://localhost:8000/admin`
  - You'll need to create a Filament admin user first (see below)
  - Manage Job Titles
  - Manage Developers (CRUD operations)
  - Advanced filtering and sorting

### Create Admin User

To access the Filament admin panel, create an admin user:

```bash
php artisan make:filament-user
```

Follow the prompts to create your admin account with:
- Name
- Email
- Password

## Project Structure

```
app/
├── Filament/
│   └── Resources/          # Filament admin resources
│       ├── DeveloperResource.php
│       ├── JobTitleResource.php
│       └── [Resource]/Pages/
├── Livewire/               # Livewire components
│   └── DeveloperSearch.php
└── Models/                 # Eloquent models
    ├── Developer.php
    └── JobTitle.php

database/
├── migrations/             # Database migrations
│   ├── *_create_job_titles_table.php
│   └── *_create_developers_table.php
└── seeders/                # Database seeders
    └── DevelopersSeeder.php

resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php   # Main layout
│   ├── livewire/
│   │   └── developer-search.blade.php
│   └── search.blade.php    # Search page
├── css/
│   └── app.css             # Tailwind CSS
└── js/
    └── app.js              # JavaScript entry point
```

## Database Schema

### Job Titles Table
- `id`: Primary key
- `name`: Job title name (unique)
- `slug`: URL-friendly slug (unique)
- `description`: Optional description
- `is_active`: Boolean flag for active titles
- `timestamps`

### Developers Table
- `id`: Primary key
- `name`: Developer name
- `email`: Email address (unique)
- `phone`: Phone number (optional)
- `job_title_id`: Foreign key to job_titles
- `years_of_experience`: Integer (years)
- `bio`: Text biography (optional)
- `skills`: JSON array of skills
- `portfolio_url`: Portfolio website (optional)
- `github_url`: GitHub profile (optional)
- `linkedin_url`: LinkedIn profile (optional)
- `location`: Location string (optional)
- `expected_salary_from`: Unsigned big integer, expected salary minimum in IQD (optional)
- `expected_salary_to`: Unsigned big integer, expected salary maximum in IQD (optional)
- `is_available`: Boolean availability flag
- `timestamps`

## Development

### Running in Development Mode

Use the provided composer script for easy development:

```bash
composer dev
```

This will concurrently run:
- Laravel development server
- Queue worker
- Log viewer (Pail)
- Vite dev server with hot reload

### Testing

Run PHPUnit tests:

```bash
composer test
```

Or directly:

```bash
php artisan test
```

## Customization

### Adding More Job Titles

Use the Filament admin panel or create them programmatically:

```php
use App\Models\JobTitle;

JobTitle::create([
    'name' => 'Data Scientist',
    'description' => 'Expert in data analysis and machine learning',
    'is_active' => true,
]);
```

### Adding Developers

Use the Filament admin panel or seed them:

```php
use App\Models\Developer;

Developer::create([
    'name' => 'Jane Doe',
    'email' => 'jane@example.com',
    'job_title_id' => 1,
    'years_of_experience' => 5,
    'skills' => ['PHP', 'Laravel', 'Vue.js'],
    'is_available' => true,
]);
```

## Troubleshooting

### Livewire Not Working

Make sure Livewire assets are published:

```bash
php artisan livewire:publish --assets
```

### Filament Issues

Clear cache and rebuild:

```bash
php artisan filament:optimize-clear
php artisan optimize:clear
```

### CSS Not Loading

Rebuild assets:

```bash
npm run build
```

### Database Issues

Reset and re-seed the database:

```bash
php artisan migrate:fresh --seed
```

## License

This project is open-sourced software licensed under the MIT license.
