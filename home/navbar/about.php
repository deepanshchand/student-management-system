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
                A simple web-based application to manage student
                records efficiently using essential CRUD operations.
            </p>

            <a href="<?= e(app_url('home/dashboard/dashboard.php')) ?>" class="primary-btn">
                Explore Dashboard <span>↗</span>
            </a>
        </section>

        <!-- Page 1: Overview -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">01 / OVERVIEW</span>
                <h2>Project at a Glance</h2>
            </div>

            <div class="overview-card">
                <p>
                    Student Management System helps users store,
                    view, update and delete student information
                    from a centralized database.
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
                    <p>Structures web pages and forms.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">02</span>
                    <h3>CSS3</h3>
                    <p>Provides styling and responsive layouts.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">03</span>
                    <h3>PHP</h3>
                    <p>Processes requests and record operations.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">04</span>
                    <h3>MySQL</h3>
                    <p>Stores and manages student data.</p>
                </article>

            </div>
        </section>

        <!-- Core Features -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">03 / CORE FEATURES</span>
                <h2>Student Record Management</h2>
                <p>Four essential database operations.</p>
            </div>

            <div class="feature-grid">

                <article class="feature-card">
                    <span class="feature-icon">＋</span>
                    <h3>Create</h3>
                    <p>Add new student records.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">⌕</span>
                    <h3>Read</h3>
                    <p>View saved student details.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">✎</span>
                    <h3>Update</h3>
                    <p>Edit existing records.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">×</span>
                    <h3>Delete</h3>
                    <p>Remove unwanted records.</p>
                </article>

            </div>
        </section>

        <!-- Page 2: How It Works -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">04 / WORKFLOW</span>
                <h2>How It Works</h2>
            </div>

            <div class="workflow-list">

                <div class="workflow-step">
                    <span>01</span>
                    <div>
                        <h3>Enter Information</h3>
                        <p>Use the website forms to manage student details.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>02</span>
                    <div>
                        <h3>Process Data</h3>
                        <p>PHP handles the requested operation.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>03</span>
                    <div>
                        <h3>Store in Database</h3>
                        <p>MySQL saves or retrieves the records.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>04</span>
                    <div>
                        <h3>View Updated Records</h3>
                        <p>The dashboard displays the stored information.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Benefits -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">05 / BENEFITS</span>
                <h2>Why This Project?</h2>
            </div>

            <div class="impact-grid">

                <article class="impact-card">
                    <h3>Organized Records</h3>
                    <p>
                        Keep student information together instead
                        of managing scattered manual records.
                    </p>
                </article>

                <article class="impact-card">
                    <h3>Practical Learning</h3>
                    <p>
                        Demonstrates PHP, MySQL and database
                        operations in a real project.
                    </p>
                </article>

            </div>
        </section>

        <!-- Future Scope -->
        <section class="future-section">
            <span class="section-label">06 / FUTURE SCOPE</span>

            <h2>What's Next?</h2>

            <p>
                The project can be extended with additional
                features as requirements grow.
            </p>

            <ul>
                <li>Administrator login and access control</li>
                <li>Search and filter student records</li>
                <li>CSV or PDF export</li>
                <li>Online deployment</li>
            </ul>

            <a href="<?= e(app_url('home/dashboard/dashboard.php')) ?>" class="primary-btn">
                Open Dashboard <span>↗</span>
            </a>
        </section>

        <!-- Footer -->
        <footer class="about-footer">
            <p>
                <strong>Student Management System</strong>
                <span> | </span>
                PHP & MySQL Mini Project
            </p>
        </footer>

    </main>

</body>

</html>