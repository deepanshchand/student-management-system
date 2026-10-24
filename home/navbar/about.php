<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F8FBFF">

    <title>About</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="about.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="about-container">

        <!-- Hero Section -->
        <section class="about-hero">
            <span class="section-label">ABOUT OUR PROJECT</span>

            <h1>
                Student
                <span>Management System.</span>
            </h1>

            <p>
                This is a simple and efficient student management
                system designed to organize student information through
                a clean interface and essential record management features.
            </p>

            <a href="/student-management-system/home/dashboard/dashboard.php" class="primary-btn">
                Explore Dashboard <span>↗</span>
            </a>
        </section>

        <!-- Project Overview -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">01 / OVERVIEW</span>
                <h2>What is Student Management System?</h2>
            </div>

            <div class="overview-card">
                <p>
                    Student Management System is a web-based Student Management System
                    developed to simplify the process of maintaining
                    student records. It provides a centralized place
                    to add, view, edit and delete student information.
                </p>

                <p>
                    The project combines HTML and CSS for the user
                    interface, PHP for server-side processing, and
                    MySQL for storing and managing student records.
                </p>
            </div>
        </section>

        <!-- Technology Stack -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">02 / TECHNOLOGY</span>
                <h2>Technology Stack</h2>
                <p>Technologies used to build Student Management System.</p>
            </div>

            <div class="tech-grid">

                <article class="tech-card">
                    <span class="tech-number">01</span>
                    <h3>HTML5</h3>
                    <p>Structures the website content and pages.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">02</span>
                    <h3>CSS3</h3>
                    <p>Creates the layout, styling and responsive design.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">03</span>
                    <h3>PHP</h3>
                    <p>Processes requests and performs CRUD operations.</p>
                </article>

                <article class="tech-card">
                    <span class="tech-number">04</span>
                    <h3>MySQL</h3>
                    <p>Stores and manages student records in a database.</p>
                </article>

            </div>
        </section>

        <!-- CRUD Functionality -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">03 / FUNCTIONALITY</span>
                <h2>Core Features</h2>
                <p>Four essential operations for managing student records.</p>
            </div>

            <div class="feature-grid">

                <article class="feature-card">
                    <span class="feature-icon">＋</span>
                    <h3>Create</h3>
                    <p>Add new student records to the database.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">↗</span>
                    <h3>Read</h3>
                    <p>View and access saved student information.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">✎</span>
                    <h3>Update</h3>
                    <p>Edit existing student details when required.</p>
                </article>

                <article class="feature-card">
                    <span class="feature-icon">×</span>
                    <h3>Delete</h3>
                    <p>Remove student records that are no longer needed.</p>
                </article>

            </div>
        </section>

        <!-- Project Structure -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">04 / ARCHITECTURE</span>
                <h2>Project Structure</h2>
                <p>A modular arrangement that keeps files organized.</p>
            </div>

            <div class="structure-card">
                <div class="structure-root">
                    <span>📁</span> student-management-system/
                </div>

                <div class="structure-item">
                    <span>📁</span>
                    <div>
                        <strong>home/</strong>
                        <p>Contains the website's home page and dashboard.</p>
                    </div>
                </div>

                <div class="structure-item nested">
                    <span>📄</span>
                    <div>
                        <strong>home.php</strong>
                        <p>Main landing page.</p>
                    </div>
                </div>

                <div class="structure-item nested">
                    <span>📁</span>
                    <div>
                        <strong>navbar/</strong>
                        <p>About, Contact, Login, Signup and navigation files.</p>
                    </div>
                </div>

                <div class="structure-item nested">
                    <span>📁</span>
                    <div>
                        <strong>dashboard/</strong>
                        <p>Dashboard interface and student management pages.</p>
                    </div>
                </div>

                <div class="structure-item nested deeper">
                    <span>📄</span>
                    <div>
                        <strong>dashboard.php</strong>
                        <p>Displays student records and management options.</p>
                    </div>
                </div>

                <div class="structure-item nested deeper">
                    <span>📁</span>
                    <div>
                        <strong>students/</strong>
                        <p>Create, update and delete student records.</p>
                    </div>
                </div>

                <div class="structure-item">
                    <span>📁</span>
                    <div>
                        <strong>config/</strong>
                        <p>Database connection configuration, as applicable.</p>
                    </div>
                </div>

                <div class="structure-item">
                    <span>📁</span>
                    <div>
                        <strong>assets/css/</strong>
                        <p>Stylesheets for website pages and components.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Working Process -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">05 / WORKFLOW</span>
                <h2>How It Works</h2>
            </div>

            <div class="workflow-list">
                <div class="workflow-step">
                    <span>01</span>
                    <div>
                        <h3>User Interface</h3>
                        <p>The user interacts with the website through HTML forms and pages.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>02</span>
                    <div>
                        <h3>PHP Processing</h3>
                        <p>PHP receives requests and processes student record operations.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>03</span>
                    <div>
                        <h3>MySQL Database</h3>
                        <p>Student information is retrieved, inserted, updated or deleted.</p>
                    </div>
                </div>

                <div class="workflow-step">
                    <span>04</span>
                    <div>
                        <h3>Updated Records</h3>
                        <p>The dashboard displays the latest saved student information.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Purpose and Impact -->
        <section class="content-section">
            <div class="section-heading">
                <span class="section-label">06 / PURPOSE & IMPACT</span>
                <h2>Why Student Management System?</h2>
            </div>

            <div class="impact-grid">
                <article class="impact-card">
                    <h3>Our Purpose</h3>
                    <p>
                        To make basic student record management easier,
                        more organized and accessible through a web-based
                        application.
                    </p>
                </article>

                <article class="impact-card">
                    <h3>Practical Impact</h3>
                    <p>
                        Reduces reliance on scattered manual records and
                        demonstrates how a database-driven application
                        can manage information efficiently.
                    </p>
                </article>
            </div>
        </section>

        <!-- Future Scope -->
        <section class="future-section">
            <span class="section-label">07 / FUTURE SCOPE</span>

            <h2>Built to Grow.</h2>

            <p>
                Student Management System starts with essential CRUD functionality and
                can be extended as project requirements grow.
            </p>

            <ul>
                <li>Secure administrator login and access control</li>
                <li>Search, filter and sort student records</li>
                <li>Export student data to CSV or PDF</li>
                <li>Cloud database and online deployment</li>
                <li>Attendance and course management, if required</li>
            </ul>

            <a href="/student-management-system/home/dashboard/dashboard.php" class="primary-btn">
                Go to Dashboard <span>↗</span>
            </a>
        </section>

        <!-- Footer -->
        <footer class="about-footer">
            <p>
                <strong>Student Management System</strong>
                <span> | </span>
                Student Record Management System
            </p>
            <p>Designed for organized and efficient student data management.</p>
        </footer>

    </main>

</body>

</html>