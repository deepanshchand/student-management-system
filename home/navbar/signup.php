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

                <button type="button">Create Account</button>

            </form>

            <p class="auth-link">
                Already have an account?
                <a href="<?= e(app_url('home/navbar/login.php')) ?>">Login</a>
            </p>

        </section>

    </main>

</body>

</html>