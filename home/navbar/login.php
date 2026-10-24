<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | StudentHub</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="auth-container">
        <section class="auth-card">
            <h1>Welcome <span>Back</span></h1>
            <p>Login to your StudentHub account.</p>

            <form class="auth-form" method="post">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
            </form>

            <p class="auth-link">
                Don't have an account?
                <a href="signup.php">Sign Up</a>
            </p>
        </section>
    </main>

</body>

</html>