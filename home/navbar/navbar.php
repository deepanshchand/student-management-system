<?php require_once __DIR__ . '/../../config/app.php'; ?>

<nav class="home-navbar" aria-label="Primary navigation">

    <a href="<?= e(app_url('home/home.php')) ?>" class="home-brand">
        <span class="brand-icon">S</span>
        <span>Management <span class="brand-red">System</span></span>
    </a>

    <div class="home-nav-links">

        <a href="<?= e(app_url('home/home.php')) ?>" class="nav-home">Home</a>

        <a href="<?= e(app_url('home/navbar/about.php')) ?>">About</a>

        <a href="<?= e(app_url('home/navbar/contact.php')) ?>">Contact Us</a>

        <a href="<?= e(app_url('home/dashboard/dashboard-preview.php')) ?>" class="nav-dashboard">
            Dashboard ↗
        </a>

        <a href="<?= e(app_url('home/navbar/login.php')) ?>">
            Login
        </a>

        <a href="<?= e(app_url('home/navbar/signup.php')) ?>" class="nav-signup">
            Sign Up
        </a>

    </div>

</nav>