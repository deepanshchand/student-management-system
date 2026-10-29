<?php
require_once __DIR__ . '/../../../config/database-connection.php';

require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('home/dashboard/dashboard.php');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!verify_csrf_token() || !$id || $id < 1) {
    set_flash('error', 'The delete request was invalid. Please try again.');
    redirect('home/dashboard/dashboard.php');
}

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

set_flash('success', 'Student record deleted successfully.');
redirect('home/dashboard/dashboard.php');
?>