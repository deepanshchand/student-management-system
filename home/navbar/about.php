<?php require_once __DIR__ . '/../../config/app.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F4FAF9">

    <title>About | Student Management System</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="about.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="about-container">

        <!-- Hero -->
        <section class="about-hero">
            <span class="section-label">ABOUT THE PROJECT</span>

            <h1>
                Student
                <span>Management System</span>
            </h1>

            <p>
                A simple and modern web-based interface designed
                to present student information through a clean,
                organized and user-friendly dashboard.
            </p>

            <a href="<?= e(app_url('home/dashboard/dashboard-preview.php')) ?>" class="primary-btn">
                Explore Dashboard <span>↗</span>
            </a>
        </section>

        <!-- Overview -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">01 / OVERVIEW</span>
                <h2>Project at a Glance</h2>
            </div>

            <div class="overview-card">
                <p>
                    Student Management System is a frontend
                    demonstration project that showcases student
                    information, dashboard layouts and website
                    navigation in an organized interface.
                </p>
            </div>
        </section>

        <!-- Technology -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">02 / TECHNOLOGY</span>
                <h2>Built With</h2>
            </div>

            <div class="tech-grid">

                <article class="tech-card">
                    <span class="tech-number">01</span>
                    <h3>HTML5</h3>
                    <p>Structures web pages and content.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">02</span>
                    <h3>CSS3</h3>
                    <p>Provides styling and responsive layouts.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">03</span>
                    <h3>PHP</h3>
                    <p>Maintains dynamic page structure and reusable components.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">04</span>
                    <h3>Frontend UI</h3>
                    <p>Displays sample content and interactive page elements.</p>
                </article>

            </div>
        </section>

        <!-- Core Features -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">03 / CORE FEATURES</span>
                <h2>Website Features</h2>
                <p>Explore the main sections of the website.</p>
            </div>

            <div class="feature-grid">

                <article class="feature-card">
                    <span class="feature-icon">▦</span>
                    <h3>Dashboard</h3>
                    <p>View student information through sample records.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">⌕</span>
                    <h3>Student Overview</h3>
                    <p>Explore an organized student information layout.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">✉</span>
                    <h3>Contact</h3>
                    <p>View contact information and message form.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">◉</span>
                    <h3>Authentication UI</h3>
                    <p>Explore Login and Sign Up page designs.</p>
                </article>

            </div>
        </section>

        <!-- Workflow -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">04 / WEBSITE STRUCTURE</span>
                <h2>Explore the Website</h2>
            </div>

            <div class="workflow-list">

                <div class="workflow-step">
                    <span>01</span>
                    <div>
                        <h3>Home Page</h3>
                        <p>Start with the main landing page.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>02</span>
                    <div>
                        <h3>Dashboard</h3>
                        <p>Explore the dashboard and sample student records.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>03</span>
                    <div>
                        <h3>About & Contact</h3>
                        <p>Learn about the project and view contact details.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>04</span>
                    <div>
                        <h3>Login & Sign Up</h3>
                        <p>Explore the authentication page interfaces.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Benefits -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">05 / BENEFITS</span>
                <h2>Project Highlights</h2>
            </div>

            <div class="impact-grid">

                <article class="impact-card">
                    <h3>Clean Interface</h3>
                    <p>
                        A structured and user-friendly design
                        for presenting student information.
                    </p>
                </article>

                <article class="impact-card">
                    <h3>Practical Learning</h3>
                    <p>
                        Demonstrates PHP page structure,
                        HTML components and CSS styling.
                    </p>
                </article>

            </div>
        </section>

        <!-- Future Scope -->
        <section class="future-section">
            <span class="section-label">06 / FUTURE SCOPE</span>

            <h2>What's Next?</h2>

            <p>
                The frontend interface can be extended with
                additional functionality in future versions.
            </p>

            <ul>
                <li>Database integration</li>
                <li>User authentication</li>
                <li>Student record management</li>
                <li>Search and filter functionality</li>
            </ul>

            <a href="<?= e(app_url('home/dashboard/dashboard-preview.php')) ?>" class="primary-btn">
                Open Dashboard <span>↗</span>
            </a>
        </section>

        <!-- Footer -->
        <footer class="about-footer">
            <p>
                <strong>Student Management System</strong>
                <span> | </span>
                Frontend UI Preview
            </p>
        </footer>

    </main>

</body>

</html>