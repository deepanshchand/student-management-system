<?php
require_once __DIR__ . '/../../../config/database-connection.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $father_name = trim($_POST['father_name'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $date_of_birth = $_POST['date_of_birth'] ?? '';
    $address = trim($_POST['address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $course_name = trim($_POST['course_name'] ?? '');
    $admission_date = $_POST['admission_date'] ?? '';

    if (
        $name === '' || $email === '' || $phone === '' ||
        $father_name === '' || $gender === '' ||
        $date_of_birth === '' || $address === '' ||
        $city === '' || $course_name === '' ||
        $admission_date === ''
    ) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO students
            (name, email, phone, father_name, gender,
             date_of_birth, address, city, course_name, admission_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        if (!$stmt) {
            $error = 'Unable to prepare the database query.';
        } else {
            $stmt->bind_param(
                'ssssssssss',
                $name,
                $email,
                $phone,
                $father_name,
                $gender,
                $date_of_birth,
                $address,
                $city,
                $course_name,
                $admission_date
            );

            if ($stmt->execute()) {
                $stmt->close();
                header('Location: ../index.php');
                exit;
            }

            $error = $stmt->errno === 1062
                ? 'Email or phone number already exists.'
                : 'Unable to save student. Please check your details.';

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
    <p style="color: #dc2626; margin: 16px 0;">
        <?= htmlspecialchars($error) ?>
    </p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Full Name</label>
        <input id="name" name="name" required maxlength="100" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" required maxlength="150"
            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

        <label for="phone">Phone</label>
        <input id="phone" type="tel" name="phone" required maxlength="15"
            value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">

        <label for="father_name">Father Name</label>
        <input id="father_name" name="father_name" required maxlength="100"
            value="<?= htmlspecialchars($_POST['father_name'] ?? '') ?>">

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <?php foreach (['Male', 'Female', 'Other'] as $option): ?>
            <option value="<?= $option ?>" <?= ($_POST['gender'] ?? '') === $option ? 'selected' : '' ?>>
                <?= $option ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label for="date_of_birth">Date of Birth</label>
        <input id="date_of_birth" type="date" name="date_of_birth" required
            value="<?= htmlspecialchars($_POST['date_of_birth'] ?? '') ?>">

        <label for="address">Address</label>
        <textarea id="address" name="address" required
            maxlength="255"><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>

        <label for="city">City</label>
        <input id="city" name="city" required maxlength="100" value="<?= htmlspecialchars($_POST['city'] ?? '') ?>">

        <label for="course_name">Course Name</label>
        <input id="course_name" name="course_name" required maxlength="100"
            value="<?= htmlspecialchars($_POST['course_name'] ?? '') ?>">

        <label for="admission_date">Admission Date</label>
        <input id="admission_date" type="date" name="admission_date" required
            value="<?= htmlspecialchars($_POST['admission_date'] ?? '') ?>">

        <button type="submit" style="margin-top: 20px;">Save Student</button>
        <a href="../index.php" style="margin-left: 12px;">Cancel</a>
    </form>
</body>

</html>