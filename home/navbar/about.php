<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | StudentHub</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="about.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="page-container">
        <section class="page-card">
            <h1>About <span>StudentHub</span></h1>
            <p>
                StudentHub is a simple student management system
                designed to manage student records efficiently.
            </p>

            <div class="about-grid">
                <div class="info-card">
                    <h2>Create</h2>
                    <p>Add new student records.</p>
                </div>

                <div class="info-card">
                    <h2>Read</h2>
                    <p>View saved student information.</p>
                </div>

                <div class="info-card">
                    <h2>Update</h2>
                    <p>Edit existing student details.</p>
                </div>

                <div class="info-card">
                    <h2>Delete</h2>
                    <p>Remove unwanted records.</p>
                </div>
            </div>

            <a href="../../dashboard/dashboard.php" class="btn">
                Open Dashboard
            </a>
        </section>
    </main>

</body>

</html>