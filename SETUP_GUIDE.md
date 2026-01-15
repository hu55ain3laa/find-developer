# Find Developer - Setup Guide

A Laravel 12 application for finding and managing developers using Livewire for the public interface and Filament 4 for the admin dashboard.

## Features

- 🔍 **Public Search Interface**: Search developers by job title, experience, location, and skills
- 📝 **Developer Registration**: Public registration form for developers (pending approval)
- 📊 **Admin Dashboard**: Manage developers, job titles, and approve/reject registrations
- 🎨 **Modern UI**: Clean and responsive design with plain CSS
- ⚡ **Real-time Search**: Live filtering using Livewire
- 📱 **Responsive**: Works on all devices
- 🔐 **Approval Workflow**: Developers must be approved before appearing publicly
- 🏷️ **Skills Management**: Many-to-many relationship with comprehensive skill tags

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

Run migrations and seed:

```bash
php artisan migrate:fresh --seed --force
```

This will:
- Create all tables (job_titles, developers, skills, developer_skill)
- Seed 6 job titles
- Seed 60+ tech skills
- Seed 8 sample developers with skills

### 4. Build Assets

Compile frontend assets:

```bash
npm run build
```

For development with hot reload:

```bash
npm run dev
```

### 5. Create Admin User

To access the Filament admin panel, create an admin user:

```bash
php artisan make:filament-user
```

Follow the prompts to create your admin account with:
- Name
- Email
- Password

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
  - **Only shows APPROVED developers** (via global scope)

- **Developer Registration**: `http://localhost:8000/register`
  - Public form for developers to register
  - Select skills from predefined list
  - Submissions are automatically set to PENDING status
  - Must be approved by admin to appear in search

### Admin Dashboard

- **Dashboard**: `http://localhost:8000/admin`
  - Manage Job Titles
  - Manage Developers (CRUD operations)
  - **See ALL developers** regardless of status (bypasses global scope)
  - Advanced filtering and sorting
  
- **Developer Management**:
  - View pending registrations
  - **Approve** developers (individual or bulk)
  - **Reject** developers (individual or bulk)
  - Edit developer information
  - Manage skills assignments

## Project Structure

```
app/
├── Enums/
│   └── DeveloperStatus.php       # Status enum (PENDING, APPROVED, REJECTED)
├── Filament/
│   ├── Pages/
│   │   └── DeveloperRegistration.php  # Public registration page
│   └── Resources/
│       ├── Developers/
│       │   ├── DeveloperResource.php
│       │   ├── Schemas/
│       │   │   └── DeveloperForm.php
│       │   ├── Tables/
│       │   │   └── DevelopersTable.php
│       │   └── Pages/
│       └── JobTitles/
│           ├── JobTitleResource.php
│           ├── Schemas/
│           │   └── JobTitleForm.php
│           ├── Tables/
│           │   └── JobTitlesTable.php
│           └── Pages/
├── Livewire/
│   └── DeveloperSearch.php       # Public search component
└── Models/
    ├── Developer.php             # With #[ScopedBy] attribute
    ├── JobTitle.php
    ├── Skill.php
    └── Scopes/
        └── ApprovedScope.php     # Global scope for filtering

database/
├── migrations/
│   ├── *_create_job_titles_table.php
│   ├── *_create_developers_table.php
│   ├── *_create_skills_table.php
│   ├── *_create_developer_skill_table.php
│   └── *_add_status_to_developers_table.php
└── seeders/
    ├── DatabaseSeeder.php
    ├── JobTitlesSeeder.php       # Seeds 6 job titles
    ├── SkillsSeeder.php          # Seeds 60+ skills
    └── DevelopersSeeder.php      # Seeds 8 developers

resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php         # Main layout
│   ├── livewire/
│   │   └── developer-search.blade.php
│   ├── filament/
│   │   └── pages/
│   │       └── developer-registration.blade.php
│   └── search.blade.php          # Search page
└── css/
    └── app.css

public/
└── css/
    └── developer-search.css      # Plain CSS (no Tailwind)
```

## Database Schema

### Job Titles Table
- `id`: Primary key
- `name`: Job title name (unique)
- `slug`: URL-friendly slug (unique, auto-generated)
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
- `portfolio_url`: Portfolio website (optional)
- `github_url`: GitHub profile (optional)
- `linkedin_url`: LinkedIn profile (optional)
- `location`: Location string (optional)
- `expected_salary_from`: Unsigned big integer in IQD (optional)
- `expected_salary_to`: Unsigned big integer in IQD (optional)
- `is_available`: Boolean availability flag
- `status`: String (pending, approved, rejected) - default: pending
- `timestamps`

### Skills Table
- `id`: Primary key
- `name`: Skill name
- `slug`: URL-friendly slug (unique, auto-generated)
- `is_active`: Boolean flag
- `timestamps`

### Developer_Skill Table (Pivot)
- `id`: Primary key
- `developer_id`: Foreign key to developers
- `skill_id`: Foreign key to skills
- `timestamps`

## Developer Workflow

1. **Registration**: Developer submits form at `/register`
   - Status automatically set to PENDING
   - Not visible in public search yet

2. **Admin Review**: Admin views pending developers in dashboard
   - Filters by status: PENDING
   - Reviews developer information

3. **Approval/Rejection**: Admin takes action
   - **Approve** (record action or bulk action) → Status: APPROVED
   - **Reject** (record action or bulk action) → Status: REJECTED
   - Success notification displayed

4. **Public Visibility**: Only APPROVED developers appear in search
   - Implemented via `#[ScopedBy([ApprovedScope::class])]` on Developer model
   - Automatic filtering in all queries
   - Admin bypasses scope to see all

## Global Scope Implementation

The `Developer` model uses Laravel's attribute-based scoping:

```php
#[ScopedBy([ApprovedScope::class])]
class Developer extends Model
{
    // ...
}
```

**Impact:**
- **Public search**: Automatically shows only APPROVED developers
- **Admin panel**: Uses `withoutGlobalScopes()` to see all developers
- **No manual filtering needed** in most queries

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

Use the Filament admin panel or run the seeder:

```php
use App\Models\JobTitle;

JobTitle::create([
    'name' => 'Data Scientist',
    'description' => 'Expert in data analysis and machine learning',
    'is_active' => true,
]);
// Slug is auto-generated from name
```

### Adding Skills

Edit `database/seeders/SkillsSeeder.php` and re-seed:

```php
Skill::create([
    'name' => 'Python',
    'slug' => 'python',
    'is_active' => true,
]);
```

### Adding Developers Programmatically

```php
use App\Models\Developer;
use App\Models\Skill;
use App\Enums\DeveloperStatus;

$developer = Developer::withoutGlobalScopes()->create([
    'name' => 'Jane Doe',
    'email' => 'jane@example.com',
    'job_title_id' => 1,
    'years_of_experience' => 5,
    'is_available' => true,
    'status' => DeveloperStatus::APPROVED,
]);

// Attach skills
$skillIds = Skill::whereIn('name', ['Laravel', 'React'])->pluck('id');
$developer->skills()->attach($skillIds);
```

**Note:** Use `withoutGlobalScopes()` when creating developers to bypass the APPROVED filter.

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
php artisan migrate:fresh --seed --force
```

### Global Scope Issues

If you need to query developers without the APPROVED filter:

```php
// Query all developers
Developer::withoutGlobalScopes()->get();

// Query only pending
Developer::withoutGlobalScopes()->pending()->get();

// Query only rejected
Developer::withoutGlobalScopes()->rejected()->get();
```

### Seeding Individual Seeders

Run specific seeders:

```bash
php artisan db:seed --class=JobTitlesSeeder
php artisan db:seed --class=SkillsSeeder
php artisan db:seed --class=DevelopersSeeder
```

## Filament 4 Architecture

This project uses Filament 4's modular structure:

- **Resources**: Define model and navigation
- **Schemas**: Define form layouts (separate classes)
- **Tables**: Define table configurations (separate classes)
- **Pages**: Handle listing, creating, editing

**Key differences from Filament 3:**
- `Schema` instead of `Form` for form definitions
- `$schema->components()` instead of `$form->schema()`
- Component namespaces: `Filament\Schemas\Components` and `Filament\Forms`

## License

This project is open-sourced software licensed under the MIT license.
