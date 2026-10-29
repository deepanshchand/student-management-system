<?php
$currentYear = date('Y');
?>

<footer class="sms-footer">
    <div class="sms-footer-glow" aria-hidden="true"></div>
    <div class="sms-footer-shine" aria-hidden="true"></div>

    <div class="sms-footer-inner">

        <!-- Brand -->
        <a href="home.php" class="sms-footer-brand" aria-label="Student Management System home">
            <span class="sms-footer-logo">S</span>

            <span class="sms-footer-brand-text">
                <span class="sms-footer-brand-name">
                    Student Management
                </span>
                <strong>System</strong>
            </span>
        </a>


        <!-- Bottom bar -->
        <div class="sms-footer-bottom">
            <p>
                © <?= $currentYear ?> Student Management System.
                All rights reserved.
            </p>

            <a href="#" class="sms-footer-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                Back to top
                <span aria-hidden="true">↑</span>
            </a>
        </div>

    </div>
</footer>