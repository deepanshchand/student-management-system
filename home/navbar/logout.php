<?php

require_once __DIR__ . '/../../config/app.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token()) {
    unset($_SESSION['user_id'], $_SESSION['user_name']);
    session_regenerate_id(true);
    set_flash('success', 'You have been logged out.');
}

redirect('home/navbar/login.php');