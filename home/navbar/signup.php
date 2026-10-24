<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | StudentHub</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="signup.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="auth-container">
        <section class="auth-card">
            <h1>Create <span>Account</span></h1>
            <p>Register for StudentHub.</p>

            <form class="auth-form" method="post">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"
                    required>

                <button type="submit">Create Account</button>
            </form>

            <p class="auth-link">
                Already have an account?
                <a href="login.php">Login</a>
            </p>
        </section>
    </main>

</body>

</html>