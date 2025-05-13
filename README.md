
# Laravel Simple Shop

A basic e-commerce website built with Laravel. This project includes user authentication (manually implemented), an admin panel to manage posts, and a simple shopping cart using Laravel sessions.

## ✨ Features

- Manual user registration and login system
- Admin panel with full CRUD for posts
- Simple shopping cart using session
- Database seeding for sample data

## 🧰 Technologies

- Laravel 12
- PHP 8.x
- MySQL
- Blade & Bootstrap 5
- Laravel session (for cart management)

## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/Haniyeh-Keshvari-dev/laravel-project.git
cd laravel-project
```

2. Install dependencies:

```bash
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
```

3. Configure your `.env` file with your database credentials.  
   Then run migrations and seed the database:

```bash
php artisan migrate --seed
```

4. Start the development server:

```bash
php artisan serve
```

Now open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

## 🔐 Test Login Credentials

```text
Admin:
Email: admin@example.com
Password: 12345678

User:
Email: user@example.com
Password: 123456789
```

## 📁 Project Structure

```
app/
├── Http/
│   └── Controllers/
├── Models/
routes/
├── web.php
resources/
├── views/
    ├── auth/
    ├── admin/
    └── cart/
```

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
