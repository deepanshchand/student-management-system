<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fffafa">

    <title>StudentHub | Student Management System</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="navbar/navbar.css">
</head>

<body class="home-page">

    <?php include __DIR__ . '/navbar/navbar.php'; ?>

    <main>
        <section class="home-hero">
            <div class="hero-copy">
                <h1>
                    Student Management
                    <span>System</span>
                </h1>

                <p class="hero-description">
                    Add, view, update and delete student records easily.
                </p>

                <div class="hero-actions">
                    <a href="../dashboard/dashboard.php" class="primary-cta">
                        Open Dashboard
                    </a>

                    <a href="#features" class="secondary-cta">
                        View Features
                    </a>
                </div>
            </div>
        </section>

        <section class="features-section" id="features">
            <div class="section-heading">
                <h2>Student Records</h2>
                <p>Manage all student information in one place.</p>
            </div>

            <div class="feature-grid">

                <article class="feature-card">
                    <div class="feature-icon feature-red">+</div>
                    <h3>Add Student</h3>
                    <p>Add new student details.</p>
                    <a href="../dashboard/dashboard.php">Get Started</a>
                </article>

                <article class="feature-card">
                    <div class="feature-icon feature-black">▤</div>
                    <h3>View Students</h3>
                    <p>View saved student records.</p>
                    <a href="../dashboard/dashboard.php">View Records</a>
                </article>

                <article class="feature-card">
                    <div class="feature-icon feature-red">✎</div>
                    <h3>Update &amp; Delete</h3>
                    <p>Edit or delete student records.</p>
                    <a href="../dashboard/dashboard.php">Manage Records</a>
                </article>

            </div>
        </section>
    </main>

    <footer class="home-footer">
        <a href="home.php" class="home-brand footer-brand">
            <span class="brand-icon">S</span>
            <span>Student<span class="brand-red">Hub</span></span>
        </a>

        <span>© <?php echo date('Y'); ?> StudentHub</span>
    </footer>

</body>

</html>