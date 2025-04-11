<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Book Web Application

This is the website e-commerce for books. It is a Laravel-based web application for managing and exploring books. The application provides features for users to view, search, and interact with book-related content.

## Features

- User authentication and profile management.
- Book browsing and detailed views.
- Responsive design with Tailwind CSS.
- Database management using Laravel migrations and seeders.
- RESTful routes for efficient navigation.

## Requirements

- PHP 8.0 or higher
- Composer
- Node.js and npm
- MySQL or another supported database

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```bash
   cd book_web
   ```

3. Install PHP dependencies:
   ```bash
   composer install
   ```

4. Install JavaScript dependencies:
   ```bash
   npm install
   ```

5. Set up the environment file:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database and application settings.

6. Generate the application key:
   ```bash
   php artisan key:generate
   ```

7. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

8. Build front-end assets:
   ```bash
   npm run dev
   ```

9. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

- Access the application at `http://localhost:8000`.
- Explore the book catalog and user features.

## Testing

Run the test suite using Pest:
```bash
php artisan test
```

## Contributing

Contributions are welcome! Please follow the [Laravel contribution guide](https://laravel.com/docs/contributions).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
