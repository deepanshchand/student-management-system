<?php
require_once __DIR__ . '/../../config/database-connection.php';

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <h1>Student Management System</h1>

    <h2>All Students</h2>
    <p>
        <a class="btn" href="students/create-student.php">+ Add Student</a>
    </p>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Father Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>City</th>
                <th>Course</th>
                <th>Admission Date</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($student = $result->fetch_assoc()): ?>
            <tr>
                <td><?= (int) $student['id'] ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><?= htmlspecialchars($student['phone']) ?></td>
                <td><?= htmlspecialchars($student['father_name']) ?></td>
                <td><?= htmlspecialchars($student['gender']) ?></td>
                <td><?= htmlspecialchars($student['date_of_birth']) ?></td>
                <td><?= htmlspecialchars($student['address']) ?></td>
                <td><?= htmlspecialchars($student['city']) ?></td>
                <td><?= htmlspecialchars($student['course_name']) ?></td>
                <td><?= htmlspecialchars($student['admission_date']) ?></td>
                <td><?= htmlspecialchars($student['created_at']) ?></td>
                <td>
                    <a href="students/update-student.php?id=<?= (int) $student['id'] ?>">Edit</a>
                    <form method="POST" action="students/delete-student.php"
                        onsubmit="return confirm('Are you sure you want to delete this student?');"
                        style="display: inline;">
                        <input type="hidden" name="id" value="<?= (int) $student['id'] ?>">
                        <button type="submit" style="background: #dc2626; padding: 8px 12px;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr>
                <td colspan="13">No students found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>