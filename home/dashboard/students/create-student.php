<?php
require_once __DIR__ . '/../../../config/database-connection.php';

require_login();

$error = '';

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
            "INSERT INTO students (name, gender, city, course_name)
             VALUES (?, ?, ?, ?)"
        );

        if (!$stmt) {
            $error = 'Unable to prepare the database query.';
        } else {
            $stmt->bind_param('ssss', $name, $gender, $city, $course_name);

            if ($stmt->execute()) {
                $stmt->close();
                set_flash('success', 'Student record added successfully.');
                redirect('home/dashboard/dashboard.php');
            }

            $error = 'Unable to save student. Please try again.';
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student | Student Management System</title>
    <link rel="stylesheet" href="create-student.css">
</head>

<body>
    <h1>Add Student</h1>

    <?php if ($error !== ''): ?>
    <p style="color:#dc2626; margin:16px 0;">
        <?= e($error) ?>
    </p>
    <?php endif; ?>

    <form method="POST">
        <?= csrf_field() ?>
        <label for="name">Full Name</label>
        <input id="name" name="name" required maxlength="100" value="<?= e($_POST['name'] ?? '') ?>">

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <?php foreach (['Male', 'Female', 'Other'] as $option): ?>
            <option value="<?= e($option) ?>" <?= ($_POST['gender'] ?? '') === $option ? 'selected' : '' ?>>
                <?= e($option) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label for="city">City</label>
        <input id="city" name="city" required maxlength="100" value="<?= e($_POST['city'] ?? '') ?>">

        <label for="course_name">Course Name</label>
        <input id="course_name" name="course_name" required maxlength="100"
            value="<?= e($_POST['course_name'] ?? '') ?>">

        <button type="submit" style="margin-top:20px;">Save Student</button>
        <a href="../dashboard.php" style="margin-left:12px;">Cancel</a>
    </form>
</body>

</html>
