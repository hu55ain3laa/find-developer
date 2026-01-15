# Find Developer

A modern Laravel application for finding and managing developers. Built with **Livewire** for the public interface and **Filament** for the admin dashboard.

## 🚀 Quick Start

```bash
# Install dependencies
composer install && npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations and seed data
php artisan migrate --seed

# Build assets and start server
npm run build
php artisan serve
```

Visit `http://localhost:8000` to see the application!

## 📚 Complete Setup Guide

For detailed installation instructions, features, and troubleshooting, see [SETUP_GUIDE.md](SETUP_GUIDE.md).

## ✨ Features

- 🔍 **Smart Search**: Search developers by name, email, location, skills, job title, and experience
- 📊 **Admin Dashboard**: Full CRUD operations powered by Filament
- ⚡ **Real-time Filtering**: Live search using Livewire
- 🎨 **Modern UI**: Beautiful, responsive design with Tailwind CSS
- 📱 **Mobile Friendly**: Works seamlessly on all devices

## 🛠️ Tech Stack

- **Laravel 12**: PHP framework
- **Livewire 3**: Real-time frontend components
- **Filament 4**: Admin panel
- **Tailwind CSS**: Utility-first CSS framework
- **SQLite**: Default database (easily switchable)

## 📖 Usage

### Public Interface
- Browse and search for developers
- Filter by job title and years of experience
- View developer profiles with skills and contact info

### Admin Dashboard (`/admin`)
- Manage job titles
- Add, edit, and delete developers
- Advanced filtering and sorting

**Create admin user:**
```bash
php artisan make:filament-user
```

## 📁 Project Structure

```
app/
├── Filament/Resources/    # Admin resources
├── Livewire/              # Livewire components
└── Models/                # Eloquent models

resources/
├── views/                 # Blade templates
├── css/                   # Tailwind CSS
└── js/                    # JavaScript

database/
├── migrations/            # Database schema
└── seeders/              # Sample data
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the MIT license.

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
