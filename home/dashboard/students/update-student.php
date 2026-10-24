<?php
require_once __DIR__ . '/../../../config/database-connection.php';

$error = '';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header('Location: ../index.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();

if (!$student) {
    header('Location: ../index.php');
    exit;
}

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
            "UPDATE students SET
                name = ?, email = ?, phone = ?, father_name = ?,
                gender = ?, date_of_birth = ?, address = ?, city = ?,
                course_name = ?, admission_date = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            'ssssssssssi',
            $name,
            $email,
            $phone,
            $father_name,
            $gender,
            $date_of_birth,
            $address,
            $city,
            $course_name,
            $admission_date,
            $id
        );

        if ($stmt->execute()) {
            $stmt->close();
            header('Location: ../index.php');
            exit;
        }

        $error = $stmt->errno === 1062
            ? 'Email or phone number already exists.'
            : 'Unable to update student. Please check your details.';

        $stmt->close();
    }

    // Keep submitted values in the form if validation fails.
    $student = array_merge($student, [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'father_name' => $father_name,
        'gender' => $gender,
        'date_of_birth' => $date_of_birth,
        'address' => $address,
        'city' => $city,
        'course_name' => $course_name,
        'admission_date' => $admission_date
    ]);
}

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="update-student.css">
</head>

<body>
    <h1>Update Student</h1>

    <?php if ($error !== ''): ?>
    <p style="color: #dc2626; margin: 16px 0;">
        <?= e($error) ?>
    </p>
    <?php endif; ?>

    <form method="POST">
        <label for="name">Full Name</label>
        <input id="name" name="name" required maxlength="100" value="<?= e($student['name']) ?>">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" required maxlength="150" value="<?= e($student['email']) ?>">

        <label for="phone">Phone</label>
        <input id="phone" type="tel" name="phone" required maxlength="15" value="<?= e($student['phone']) ?>">

        <label for="father_name">Father Name</label>
        <input id="father_name" name="father_name" required maxlength="100" value="<?= e($student['father_name']) ?>">

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <?php foreach (['Male', 'Female', 'Other'] as $option): ?>
            <option value="<?= e($option) ?>" <?= $student['gender'] === $option ? 'selected' : '' ?>>
                <?= e($option) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label for="date_of_birth">Date of Birth</label>
        <input id="date_of_birth" type="date" name="date_of_birth" required value="<?= e($student['date_of_birth']) ?>">

        <label for="address">Address</label>
        <textarea id="address" name="address" required maxlength="255"><?= e($student['address']) ?></textarea>

        <label for="city">City</label>
        <input id="city" name="city" required maxlength="100" value="<?= e($student['city']) ?>">

        <label for="course_name">Course Name</label>
        <input id="course_name" name="course_name" required maxlength="100" value="<?= e($student['course_name']) ?>">

        <label for="admission_date">Admission Date</label>
        <input id="admission_date" type="date" name="admission_date" required
            value="<?= e($student['admission_date']) ?>">

        <button type="submit" style="margin-top: 20px;">Update Student</button>
        <a href="../index.php" style="margin-left: 12px;">Cancel</a>
    </form>
</body>

</html>