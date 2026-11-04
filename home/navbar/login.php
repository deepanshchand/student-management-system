<?php
require_once __DIR__ . '/../../config/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Student Management System</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="auth-container">

        <section class="auth-card" aria-labelledby="login-title">

            <h1 id="login-title">Welcome <span>Back</span></h1>

            <p>Login to your Student Management System account.</p>

            <p class="form-alert form-alert-error" role="status">
                Login functionality is disabled in UI preview mode.
            </p>

            <form class="auth-form" onsubmit="return false;">

                <label for="email">Email Address</label>

                <input type="email" id="email" name="email" placeholder="Enter your email" autocomplete="email"
                    maxlength="150" required>

                <label for="password">Password</label>

                <input type="password" id="password" name="password" placeholder="Enter your password"
                    autocomplete="current-password" required>

                <button type="submit" disabled>Login</button>

            </form>

            <p class="auth-link">
                Don't have an account?
                <a href="<?= e(app_url('home/navbar/signup.php')) ?>">Sign Up</a>
            </p>

        </section>

    </main>

</body>

</html>