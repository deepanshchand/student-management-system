# Student Management System

A small PHP and MySQL application for maintaining student records. It includes account-based access to the dashboard, student CRUD operations, search, and a stored contact form.

## Requirements

- XAMPP with Apache and MySQL running
- PHP 8.1 or newer
- MySQL 5.7+ or MariaDB 10.4+
- PHP's `mysqli` extension enabled

## Local setup

1. Put the project inside XAMPP's `htdocs` directory.
2. Create the database and tables by importing `database.sql` in phpMyAdmin, or run this from Command Prompt:

   ```cmd
   mysql -u root -p < database.sql
   ```

3. Copy `config/local.php.example` to `config/local.php`, then add your local database password. This file is intentionally ignored by Git.
4. Open `http://localhost/student-management-system/home/home.php`.
5. Create an account from **Sign Up**, then use the dashboard to manage student records.

## Configuration

Database values can be set in either place:

- `config/local.php` for a local XAMPP installation (recommended for development)
- `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD`, and `DB_DATABASE` environment variables for deployment

If deployed under a different URL path, set `APP_BASE_URL`, for example `/portal`.

## Security and maintenance notes

- Database credentials are kept out of version control.
- Passwords are stored using PHP's `password_hash` and checked with `password_verify`.
- Dashboard and all student record operations require a signed-in account.
- Every state-changing form uses a CSRF token and prepared database statements.
- `test-connection.php` can only run from the command line: `php test-connection.php`.

For production, serve the site through HTTPS, use a dedicated least-privilege database user, and set database environment variables in the server configuration.
