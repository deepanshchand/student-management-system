    <?php
    require_once __DIR__ . '/../../../config/database-connection.php';

    require_login();

    $error = '';
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id || $id < 1) {
        redirect('home/dashboard/dashboard.php');
    }

    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();

    if (!$student) {
        set_flash('error', 'That student record no longer exists.');
        redirect('home/dashboard/dashboard.php');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $gender = trim($_POST['gender'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $course_name = trim($_POST['course_name'] ?? '');

        if (!verify_csrf_token()) {
            $error = 'Your form has expired. Please try again.';
        } elseif ($name === '' || $gender === '' || $city === '' || $course_name === '') {
            $error = 'Please fill in all fields.';
        } elseif (strlen($name) > 100 || strlen($city) > 100 || strlen($course_name) > 100) {
            $error = 'Each field must be 100 characters or fewer.';
        } elseif (!in_array($gender, ['Male', 'Female', 'Other'], true)) {
            $error = 'Please select a valid gender.';
        } else {
            $stmt = $conn->prepare(
                "UPDATE students
                SET name = ?, gender = ?, city = ?, course_name = ?
                WHERE id = ?"
            );

            if (!$stmt) {
                $error = 'Unable to prepare the database query.';
            } else {
                $stmt->bind_param(
                    'ssssi',
                    $name,
                    $gender,
                    $city,
                    $course_name,
                    $id
                );

                if ($stmt->execute()) {
                    $stmt->close();
                    set_flash('success', 'Student record updated successfully.');
                    redirect('home/dashboard/dashboard.php');
                }

                $error = 'Unable to update student. Please try again.';
                $stmt->close();
            }
        }

        // Keep submitted values if validation fails.
        $student['name'] = $name;
        $student['gender'] = $gender;
        $student['city'] = $city;
        $student['course_name'] = $course_name;
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Student | Student Management System</title>
        <link rel="stylesheet" href="update-student.css">
    </head>

    <body>
        <h1>Update Student</h1>

        <?php if ($error !== ''): ?>
        <p style="color:#dc2626; margin:16px 0;">
            <?= e($error) ?>
        </p>
        <?php endif; ?>

        <form method="POST">
            <?= csrf_field() ?>
            <label for="name">Full Name</label>
            <input id="name" name="name" required maxlength="100" value="<?= e($student['name']) ?>">

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <?php foreach (['Male', 'Female', 'Other'] as $option): ?>
                <option value="<?= e($option) ?>" <?= $student['gender'] === $option ? 'selected' : '' ?>>
                    <?= e($option) ?>
                </option>
                <?php endforeach; ?>
            </select>

            <label for="city">City</label>
            <input id="city" name="city" required maxlength="100" value="<?= e($student['city']) ?>">

            <label for="course_name">Course Name</label>
            <input id="course_name" name="course_name" required maxlength="100"
                value="<?= e($student['course_name']) ?>">

            <button type="submit" style="margin-top:20px;">Update Student</button>
            <a href="../dashboard.php" style="margin-left:12px;">Cancel</a>
        </form>
    </body>

    </html>