<?php
require_once __DIR__ . '/../../config/database-connection.php';

require_login();

$sql = "SELECT id, name, gender, city, course_name, created_at
        FROM students
        ORDER BY id DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Unable to load student records. Please check your database table.");
}

$students = [];

while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}

$totalStudents = count($students);
$latestStudent = $totalStudents > 0 ? $students[0]['name'] : 'No students yet';
$flash = get_flash();
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

                <a class="nav-link active" href="dashboard.php">
                    <span class="nav-icon">▦</span>
                    <span>Dashboard</span>
                </a>


                <p class="nav-caption">INFORMATION</p>



                <a class="nav-link active" href="../home.php">
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
                    <strong>Database connected</strong>
                    <small>System operational</small>
                </div>
            </div>
        </aside>

        <main class="main-content">

            <header class="topbar">
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle navigation">☰</button>

                <div class="breadcrumb">
                    <strong>DASHBOARD</strong>
                </div>

                <div class="topbar-right">
                    <div class="system-status">
                        <span class="status-dot"></span>
                        SYSTEM ONLINE
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

            <?php if ($flash !== null): ?>
            <div class="dashboard-alert dashboard-alert-<?= e($flash['type']) ?>" role="status">
                <?= e($flash['message']) ?>
            </div>
            <?php endif; ?>

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
                        <?= $totalStudents > 0 ? '#' . e($students[0]['id']) : '—' ?>
                    </div>

                    <div class="stat-accent accent-purple"></div>
                </article>

                <article class="stat-card reveal">
                    <div class="stat-top">
                        <span class="stat-label">LATEST STUDENT</span>
                        <span class="stat-icon cyan-icon">◷</span>
                    </div>
                    <div class="stat-value stat-name"><?= e($latestStudent) ?></div>

                    <div class="stat-accent accent-cyan"></div>
                </article>

                <article class="stat-card reveal">
                    <div class="stat-top">
                        <span class="stat-label">DATABASE STATUS</span>
                        <span class="stat-icon green-icon">✓</span>
                    </div>
                    <div class="stat-value online-value">
                        <span class="online-pulse"></span>Online
                    </div>

                    <div class="stat-accent accent-green"></div>
                </article>

            </section>

            <section class="records-panel reveal" id="students">
                <div class="panel-heading">
                    <div class="panel-title-group">
                        <div class="section-index">01 <span>/ STUDENT RECORDS</span></div>
                        <h2>Student Directory</h2>
                        <p>Search, edit, or remove student records.</p>
                    </div>

                    <div class="panel-actions">
                        <label class="search-box">
                            <span class="search-icon">⌕</span>
                            <input type="search" id="studentSearch" placeholder="Search student records..."
                                aria-label="Search student records">
                            <kbd>Ctrl K</kbd>
                        </label>

                        <a class="primary-btn compact-btn" href="students/create-student.php">
                            <span class="btn-plus">＋</span>
                            Add Student
                            <span class="button-shine"></span>
                        </a>
                    </div>
                </div>

                <div class="table-meta">
                    <span>
                        <?= $totalStudents ?>
                        RECORD<?= $totalStudents === 1 ? '' : 'S' ?> FOUND
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
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if ($totalStudents === 0): ?>
                            <tr>
                                <td colspan="7" class="empty-message">
                                    <span class="empty-icon">♙</span>
                                    <strong>No student records yet</strong>
                                    <small>Add your first student to get started.</small>
                                    <a href="students/create-student.php" class="empty-add">
                                        ＋ Add your first student
                                    </a>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($students as $student): ?>
                            <tr>
                                <td>
                                    <span class="id-pill">#<?= e($student['id']) ?></span>
                                </td>

                                <td>
                                    <div class="student-cell">
                                        <span class="student-avatar">
                                            <?= e(strtoupper(substr(trim($student['name']), 0, 1))) ?>
                                        </span>
                                        <strong><?= e($student['name']) ?></strong>
                                    </div>
                                </td>

                                <td>
                                    <span class="gender-pill"><?= e($student['gender']) ?></span>
                                </td>

                                <td><?= e($student['city']) ?></td>

                                <td>
                                    <span class="course-pill"><?= e($student['course_name']) ?></span>
                                </td>

                                <td><?= e($student['created_at']) ?></td>

                                <td class="action-cell">
                                    <a class="icon-btn edit"
                                        href="students/update-student.php?id=<?= rawurlencode((string) $student['id']) ?>"
                                        aria-label="Edit student" title="Edit student">✎</a>

                                    <form method="POST" action="students/delete-student.php" class="delete-form"
                                        onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= e($student['id']) ?>">
                                        <button class="icon-btn delete" type="submit" aria-label="Delete student"
                                            title="Delete student">×</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div id="noSearchResults" class="search-empty" hidden>
                        <span>⌕</span>
                        <strong>No matching students found</strong>
                        <small>Try another name, gender, city, or course.</small>
                    </div>
                </div>

                <div class="panel-footer">
                    <span>SHOWING <b><?= $totalStudents ?></b> STUDENT RECORDS</span>
                    <span>STUDENT MANAGEMENT SYSTEM <b>✓</b></span>
                </div>
            </section>

            <footer class="page-footer">
                <span>© <?= date('Y') ?> STUDENT MANAGEMENT SYSTEM</span>
                <span>ADMIN DASHBOARD <i>•</i> V1.0</span>
            </footer>
        </main>
    </div>

    <div class="mobile-overlay" id="mobileOverlay"></div>

    <script>
    (() => {
        const searchInput = document.getElementById('studentSearch');
        const tableBody = document.querySelector('#studentsTable tbody');
        const noSearchResults = document.getElementById('noSearchResults');

        if (searchInput && tableBody && noSearchResults) {
            const rows = Array.from(tableBody.querySelectorAll('tr'));

            searchInput.addEventListener('input', function() {
                const query = this.value.trim().toLowerCase();
                let visibleRows = 0;
                let hasEmptyState = false;

                rows.forEach(row => {
                    if (row.querySelector('.empty-message')) {
                        hasEmptyState = true;
                        row.hidden = query.length > 0;
                        return;
                    }

                    const matches = row.textContent.toLowerCase().includes(query);
                    row.hidden = !matches;

                    if (matches) visibleRows++;
                });

                noSearchResults.hidden =
                    query.length === 0 || visibleRows > 0 || hasEmptyState;
            });

            document.addEventListener('keydown', event => {
                if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
                    event.preventDefault();
                    searchInput.focus();
                }

                if (event.key === 'Escape' && document.activeElement === searchInput) {
                    searchInput.value = '';
                    searchInput.dispatchEvent(new Event('input'));
                    searchInput.blur();
                }
            });
        }

        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menuToggle');
        const overlay = document.getElementById('mobileOverlay');

        function closeSidebar() {
            sidebar?.classList.remove('sidebar-open');
            overlay?.classList.remove('overlay-visible');
        }

        menuToggle?.addEventListener('click', () => {
            sidebar?.classList.toggle('sidebar-open');
            overlay?.classList.toggle('overlay-visible');
        });

        overlay?.addEventListener('click', closeSidebar);

        sidebar?.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', closeSidebar);
        });

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.05
            });

            document.querySelectorAll('.reveal').forEach(item => observer.observe(item));
        } else {
            document.querySelectorAll('.reveal').forEach(item => {
                item.classList.add('is-visible');
            });
        }
    })();
    </script>
</body>

</html>