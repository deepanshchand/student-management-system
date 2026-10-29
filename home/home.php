<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#075B59">
    <title>Student Management System</title>

    <link rel="stylesheet" href="door.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="navbar/navbar.css">
    <link rel="stylesheet" href="footer/footer.css">
</head>

<body class="home-page">

    <!-- Entrance controller -->
    <input type="checkbox" id="gate-toggle" aria-label="Open college entrance">

    <!-- Cinematic college entrance -->
    <section class="cinematic-intro">

        <div class="academy-sky"></div>
        <div class="academy-stars"></div>
        <div class="academy-moon"></div>
        <div class="academy-moon-halo"></div>

        <div class="academy-clouds cloud-back"></div>
        <div class="academy-clouds cloud-front"></div>

        <div class="floating-island island-left">
            <div class="island-building mini-building"></div>
            <div class="island-rock"></div>
        </div>

        <div class="floating-island island-right">
            <div class="island-pagoda mini-pagoda"></div>
            <div class="island-rock"></div>
        </div>

        <div class="academy-world">

            <div class="world-aura"></div>

            <div class="academy-tower tower-left">
                <div class="tower-roof"></div>
                <div class="tower-body">
                    <span></span><span></span><span></span>
                </div>
                <div class="tower-light"></div>
            </div>

            <div class="academy-tower tower-right">
                <div class="tower-roof"></div>
                <div class="tower-body">
                    <span></span><span></span><span></span>
                </div>
                <div class="tower-light"></div>
            </div>

            <div class="academy-main-building">

                <div class="academy-roof roof-top"></div>
                <div class="academy-roof roof-middle"></div>

                <div class="academy-building-body">

                    <div class="academy-sign">KITM COLLEGE</div>

                    <div class="academy-windows">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <!-- Click the gate to enter -->
                    <label for="gate-toggle" class="academy-entrance-light" aria-label="Open college gate"
                        title="Click the gate to enter">
                    </label>

                </div>

                <div class="academy-stairs"></div>

            </div>

            <div class="academy-platform"></div>

            <div class="academy-island">
                <div class="island-grass"></div>
                <div class="island-cliff"></div>
                <div class="island-crystal crystal-left"></div>
                <div class="island-crystal crystal-right"></div>
            </div>

            <div class="academy-waterfall waterfall-left"></div>
            <div class="academy-waterfall waterfall-right"></div>

        </div>

        <div class="sakura-field sakura-one"></div>
        <div class="sakura-field sakura-two"></div>
        <div class="sakura-field sakura-three"></div>

        <div class="cinematic-vignette"></div>
        <div class="cinematic-scanline"></div>

    </section>

    <!-- homepage content -->
    <div class="home-content">

        <?php include __DIR__ . '/navbar/navbar.php'; ?>

        <main>

            <!-- Hero section -->
            <section class="home-hero">

                <div class="hero-copy">

                    <span class="hero-label">
                        <span class="status-dot"></span>
                        STUDENT PORTAL
                    </span>

                    <h1>
                        Student
                        <span>Management</span>
                        System<span class="title-dot">.</span>
                    </h1>

                    <p class="hero-description">
                        All your student records. One place.
                    </p>

                    <div class="hero-actions">
                        <a href="<?= e(app_url('home/dashboard/dashboard.php')) ?>" class="primary-cta">
                            Open Dashboard <span>↗</span>
                        </a>
                    </div>

                </div>

                <div class="hero-visual" aria-hidden="true">

                    <div class="visual-orbit orbit-one"></div>
                    <div class="visual-orbit orbit-two"></div>

                    <div class="visual-card">

                        <div class="visual-card-top">

                            <div class="visual-logo">S</div>

                            <div class="visual-card-heading">
                                <span class="visual-caption">STUDENT DATABASE</span>
                                <h3>Records</h3>
                            </div>

                            <span class="visual-menu">•••</span>

                        </div>

                        <div class="visual-divider"></div>

                        <div class="visual-record">
                            <div class="record-icon">＋</div>
                            <div class="record-info">
                                <strong>Add Student</strong>
                                <span>Create a record</span>
                            </div>
                            <span class="record-arrow">↗</span>
                        </div>

                        <div class="visual-record">
                            <div class="record-icon">▤</div>
                            <div class="record-info">
                                <strong>View Students</strong>
                                <span>Browse records</span>
                            </div>
                            <span class="record-arrow">↗</span>
                        </div>

                        <div class="visual-record">
                            <div class="record-icon">✎</div>
                            <div class="record-info">
                                <strong>Manage Records</strong>
                                <span>Update information</span>
                            </div>
                            <span class="record-arrow">↗</span>
                        </div>

                        <div class="visual-record">
                            <div class="record-icon">✕</div>
                            <div class="record-info">
                                <strong>Delete Records</strong>
                                <span>Remove student records</span>
                            </div>
                            <span class="record-arrow">↗</span>
                        </div>

                        <div class="visual-card-footer">
                            <span class="footer-indicator"></span>
                            SYSTEM READY
                        </div>

                    </div>

                </div>

            </section>

            <!-- Quick access section -->
            <section class="features-section" id="features">

                <div class="section-heading">
                    <span class="section-eyebrow">QUICK ACCESS</span>
                    <h2>Manage <span>Records.</span></h2>
                </div>

                <div class="feature-grid">

                    <a href="<?= e(app_url('home/dashboard/dashboard.php')) ?>" class="feature-card">
                        <span class="feature-icon">＋</span>
                        <span class="feature-number">01</span>
                        <h3>Add Student</h3>
                        <span class="feature-link">Open dashboard ↗</span>
                    </a>

                    <a href="<?= e(app_url('home/dashboard/dashboard.php')) ?>" class="feature-card">
                        <span class="feature-icon">▤</span>
                        <span class="feature-number">02</span>
                        <h3>View Students</h3>
                        <span class="feature-link">Open dashboard ↗</span>
                    </a>

                    <a href="<?= e(app_url('home/dashboard/dashboard.php')) ?>" class="feature-card">
                        <span class="feature-icon">✎</span>
                        <span class="feature-number">03</span>
                        <h3>Edit Records</h3>
                        <span class="feature-link">Open dashboard ↗</span>
                    </a>

                </div>

            </section>

        </main>

        <!-- Separate reusable footer -->
        <?php include __DIR__ . '/footer/footer.php'; ?>

    </div>

</body>

</html>