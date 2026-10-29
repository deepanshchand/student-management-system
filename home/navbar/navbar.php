<?php require_once __DIR__ . '/../../config/app.php'; ?>
<nav class="home-navbar" aria-label="Primary navigation">

    <a href="<?= e(app_url('home/home.php')) ?>" class="home-brand">
        <span class="brand-icon">S</span>
        <span>Management <span class="brand-red">System</span></span>
    </a>

    <div class="home-nav-links">
        <a href="<?= e(app_url('home/home.php')) ?>" class="nav-home">Home </a>
        <a href="<?= e(app_url('home/navbar/about.php')) ?>">About</a>
        <a href="<?= e(app_url('home/navbar/contact.php')) ?>">Contact Us</a>

        <?php if (is_logged_in()): ?>
        <span class="nav-user" title="Signed in account">Hi, <?= e(current_user_name()) ?></span>
        <a href="<?= e(app_url('home/dashboard/dashboard.php')) ?>" class="nav-dashboard">Dashboard ↗</a>
        <form class="logout-form" method="post" action="<?= e(app_url('home/navbar/logout.php')) ?>">
            <?= csrf_field() ?>
            <button type="submit" class="nav-logout">Log out</button>
        </form>
        <?php else: ?>
        <a href="<?= e(app_url('home/navbar/login.php')) ?>">Login</a>
        <a href="<?= e(app_url('home/navbar/signup.php')) ?>" class="nav-signup">Sign Up</a>
        <?php endif; ?>
    </div>

</nav>