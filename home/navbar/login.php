<?php

require_once __DIR__ . '/../../config/database-connection.php';

if (is_logged_in()) {
    redirect('home/dashboard/dashboard.php');
}

$error = '';
$email = '';
$flash = get_flash();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');

    if (!verify_csrf_token()) {
        $error = 'Your form has expired. Please try again.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address and password.';
    } else {
        $statement = $conn->prepare(
            'SELECT id, name, password_hash FROM users WHERE email = ? LIMIT 1'
        );
        $statement->bind_param('s', $email);
        $statement->execute();
        $user = $statement->get_result()->fetch_assoc();
        $statement->close();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $error = 'Invalid email address or password.';
        } else {
            session_regenerate_id(true);
            $_SESSION['user_id'] = (int) $user['id'];
            $_SESSION['user_name'] = (string) $user['name'];
            set_flash('success', 'Welcome back, ' . $user['name'] . '!');
            redirect('home/dashboard/dashboard.php');
        }
    }
}
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

            <?php if ($flash !== null): ?>
            <p class="form-alert form-alert-<?= e($flash['type']) ?>" role="status"><?= e($flash['message']) ?></p>
            <?php endif; ?>
            <?php if ($error !== ''): ?>
            <p class="form-alert form-alert-error" role="alert"><?= e($error) ?></p>
            <?php endif; ?>

            <form class="auth-form" method="post" novalidate>
                <?= csrf_field() ?>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" autocomplete="email"
                    maxlength="150" value="<?= e($email) ?>" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    autocomplete="current-password" required>

                <button type="submit">Login</button>
            </form>

            <p class="auth-link">
                Don't have an account?
                <a href="<?= e(app_url('home/navbar/signup.php')) ?>">Sign Up</a>
            </p>
        </section>
    </main>

</body>

</html>
