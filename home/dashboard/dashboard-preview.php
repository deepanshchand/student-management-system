<?php

$students = [
    [
        'id' => 1,
        'name' => 'Rahul Sharma',
        'gender' => 'Male',
        'city' => 'Delhi',
        'course_name' => 'BCA',
        'created_at' => '2026-10-10'
    ],
    [
        'id' => 2,
        'name' => 'Priya Verma',
        'gender' => 'Female',
        'city' => 'Noida',
        'course_name' => 'B.Sc. IT',
        'created_at' => '2026-10-12'
    ],
    [
        'id' => 3,
        'name' => 'Aman Kumar',
        'gender' => 'Male',
        'city' => 'Dehradun',
        'course_name' => 'BCA',
        'created_at' => '2026-10-15'
    ],
    [
        'id' => 4,
        'name' => 'Neha Singh',
        'gender' => 'Female',
        'city' => 'Haldwani',
        'course_name' => 'BBA',
        'created_at' => '2026-10-18'
    ]
];

$totalStudents = count($students);
$latestStudent = $students[0]['name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f4f8ff">

    <title>Dashboard | Student Management System</title>

    <link rel="stylesheet" href="./dashboard.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="background-orb orb-one"></div>
    <div class="background-orb orb-two"></div>

    <div class="app-shell">

        <aside class="sidebar" id="sidebar">

            <a class="brand" href="../home.php">
                <span class="brand-logo">S</span>

                <span class="brand-copy">
                    <strong>STUDENT</strong>
                    <small>MANAGEMENT SYSTEM</small>
                </span>
            </a>

            <div class="campus-label">
                <span class="status-dot"></span>
                ADMIN PORTAL
            </div>

            <nav class="sidebar-nav" aria-label="Dashboard navigation">

                <br>

                <a class="nav-link active" href="dashboard-preview.php">
                    <span class="nav-icon">▦</span>
                    <span>Dashboard</span>
                </a>

                <p class="nav-caption">INFORMATION</p>

                <a class="nav-link" href="../home.php">
                    <span class="nav-icon" aria-hidden="true">⌂</span>
                    <span>Home</span>
                </a>

                <a class="nav-link" href="../navbar/about.php">
                    <span class="nav-icon">ⓘ</span>
                    <span>About</span>
                </a>

                <a class="nav-link" href="../navbar/contact.php">
                    <span class="nav-icon">✉</span>
                    <span>Contact</span>
                </a>

            </nav>

            <div class="sidebar-bottom">
                <span class="connection-icon">✓</span>

                <div>
                    <strong>Preview Mode</strong>
                    <small>Frontend only</small>
                </div>
            </div>

        </aside>

        <main class="main-content">

            <header class="topbar">

                <button class="menu-toggle" id="menuToggle" aria-label="Toggle navigation">
                    ☰
                </button>

                <div class="breadcrumb">
                    <strong>DASHBOARD</strong>
                </div>

                <div class="topbar-right">

                    <div class="system-status">
                        <span class="status-dot"></span>
                        PREVIEW MODE
                    </div>

                    <div class="date-chip">
                        <span>◷</span>
                        <?= date('d M Y') ?>
                    </div>

                </div>

            </header>

            <section class="welcome-row reveal">

                <div class="welcome-copy">
                    <h1>Admin <span>Dashboard</span><b>.</b></h1>
                </div>

            </section>

            <section class="stats-grid" aria-label="Student statistics">

                <article class="stat-card reveal">

                    <div class="stat-top">
                        <span class="stat-label">TOTAL STUDENTS</span>
                        <span class="stat-icon blue-icon">♙</span>
                    </div>

                    <div class="stat-value"><?= $totalStudents ?></div>

                    <div class="stat-accent"></div>

                </article>

                <article class="stat-card reveal">

                    <div class="stat-top">
                        <span class="stat-label">LATEST RECORD ID</span>
                        <span class="stat-icon purple-icon">＋</span>
                    </div>

                    <div class="stat-value">
                        #<?= $students[0]['id'] ?>
                    </div>

                    <div class="stat-accent accent-purple"></div>

                </article>

                <article class="stat-card reveal">

                    <div class="stat-top">
                        <span class="stat-label">LATEST STUDENT</span>
                        <span class="stat-icon cyan-icon">◷</span>
                    </div>

                    <div class="stat-value stat-name">
                        <?= htmlspecialchars($latestStudent) ?>
                    </div>

                    <div class="stat-accent accent-cyan"></div>

                </article>

                <article class="stat-card reveal">

                    <div class="stat-top">
                        <span class="stat-label">DATABASE STATUS</span>
                        <span class="stat-icon green-icon">✓</span>
                    </div>

                    <div class="stat-value online-value">
                        <span class="online-pulse"></span>
                        Preview
                    </div>

                    <div class="stat-accent accent-green"></div>

                </article>

            </section>

            <section class="records-panel reveal" id="students">

                <div class="panel-heading">

                    <div class="panel-title-group">

                        <div class="section-home">
                            01 <span>/ STUDENT RECORDS</span>
                        </div>

                        <h2>Student Directory</h2>

                        <p>Sample student records for dashboard preview.</p>

                    </div>

                    <div class="panel-actions">

                        <label class="search-box">

                            <span class="search-icon">⌕</span>

                            <input type="search" id="studentSearch" placeholder="Search student records..."
                                aria-label="Search student records">

                            <kbd>Ctrl K</kbd>

                        </label>

                    </div>

                </div>

                <div class="table-meta">
                    <span>
                        <?= $totalStudents ?>
                        RECORDS FOUND
                    </span>
                </div>

                <div class="table-wrap">

                    <table id="studentsTable">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Course</th>
                                <th>Created At</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($students as $student): ?>

                            <tr>

                                <td>
                                    <span class="id-pill">
                                        #<?= $student['id'] ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="student-cell">

                                        <span class="student-avatar">
                                            <?= htmlspecialchars(strtoupper(substr(trim($student['name']), 0, 1))) ?>
                                        </span>

                                        <strong>
                                            <?= htmlspecialchars($student['name']) ?>
                                        </strong>

                                    </div>
                                </td>

                                <td>
                                    <span class="gender-pill">
                                        <?= htmlspecialchars($student['gender']) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= htmlspecialchars($student['city']) ?>
                                </td>

                                <td>
                                    <span class="course-pill">
                                        <?= htmlspecialchars($student['course_name']) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= htmlspecialchars($student['created_at']) ?>
                                </td>

                            </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

                <div class="panel-footer">

                    <span>
                        SHOWING <b><?= $totalStudents ?></b> STUDENT RECORDS
                    </span>

                    <span>
                        STUDENT MANAGEMENT SYSTEM <b>✓</b>
                    </span>

                </div>

            </section>

            <footer class="page-footer">

                <span>
                    © <?= date('Y') ?> STUDENT MANAGEMENT SYSTEM
                </span>

                <span>
                    FRONTEND PREVIEW <i>•</i> V1.0
                </span>

            </footer>

        </main>

    </div>

    <div class="mobile-overlay" id="mobileOverlay"></div>

</body>

</html>