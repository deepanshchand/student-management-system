<?php
require_once __DIR__ . '/../../config/app.php';

$error = '';
$name = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');
    $confirmPassword = (string) ($_POST['confirm_password'] ?? '');

    if ($name === '' || strlen($name) > 100) {
        $error = 'Please enter a name up to 100 characters long.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 4) {
        $error = 'Password must contain at least 4 characters.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        $error = 'Account registration is currently disabled in UI preview mode.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Student Management System</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="signup.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="auth-container">
        <section class="auth-card" aria-labelledby="signup-title">

            <h1 id="signup-title">Create <span>Account</span></h1>

            <p>Register for Student Management System.</p>

            <?php if ($error !== ''): ?>
            <p class="form-alert form-alert-error" role="alert">
                <?= e($error) ?>
            </p>
            <?php endif; ?>

            <form class="auth-form" method="post" novalidate>

                <label for="name">Full Name</label>

                <input type="text" id="name" name="name" placeholder="Enter your full name" autocomplete="name"
                    maxlength="100" value="<?= e($name) ?>" required>

                <label for="email">Email Address</label>

                <input type="email" id="email" name="email" placeholder="Enter your email" autocomplete="email"
                    maxlength="150" value="<?= e($email) ?>" required>

                <label for="password">Password</label>

                <input type="password" id="password" name="password" placeholder="At least 4 characters"
                    autocomplete="new-password" minlength="4" required>

                <label for="confirm_password">Confirm Password</label>

                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"
                    autocomplete="new-password" minlength="4" required>

                <button type="submit">Create Account</button>

            </form>

            <p class="auth-link">
                Already have an account?
                <a href="<?= e(app_url('home/navbar/login.php')) ?>">Login</a>
            </p>

        </section>
    </main>

</body>

</html>
<?php
require_once __DIR__ . '/../../config/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Student Management System</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="signup.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="auth-container">

        <section class="auth-card" aria-labelledby="signup-title">

            <h1 id="signup-title">Create <span>Account</span></h1>

            <p>Register for Student Management System.</p>

            <p class="form-alert form-alert-error" role="status">
                Account registration is disabled in UI preview mode.
            </p>

            <form class="auth-form" onsubmit="return false;">

                <label for="name">Full Name</label>

                <input type="text" id="name" name="name" placeholder="Enter your full name" autocomplete="name"
                    maxlength="100" required>

                <label for="email">Email Address</label>

                <input type="email" id="email" name="email" placeholder="Enter your email" autocomplete="email"
                    maxlength="150" required>

                <label for="password">Password</label>

                <input type="password" id="password" name="password" placeholder="At least 4 characters"
                    autocomplete="new-password" minlength="4" required>

                <label for="confirm_password">Confirm Password</label>

                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"
                    autocomplete="new-password" minlength="4" required>

                <button type="submit" disabled>Create Account</button>

            </form>

            <p class="auth-link">
                Already have an account?
                <a href="<?= e(app_url('home/navbar/login.php')) ?>">Login</a>
            </p>

        </section>

    </main>

</body>

</html>