<?php

require_once __DIR__ . '/../../config/database-connection.php';

$error = '';
$name = '';
$email = '';
$message = '';
$flash = get_flash();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $message = trim((string) ($_POST['message'] ?? ''));

    if (!verify_csrf_token()) {
        $error = 'Your form has expired. Please try again.';
    } elseif ($name === '' || strlen($name) > 100) {
        $error = 'Please enter a name up to 100 characters long.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150) {
        $error = 'Please enter a valid email address.';
    } elseif ($message === '' || strlen($message) > 5000) {
        $error = 'Please enter a message up to 5,000 characters long.';
    } else {
        try {
            $statement = $conn->prepare(
                'INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)'
            );
            $statement->bind_param('sss', $name, $email, $message);
            $statement->execute();
            $statement->close();
            set_flash('success', 'Thank you. Your message has been sent.');
            redirect('home/navbar/contact.php');
        } catch (mysqli_sql_exception $exception) {
            $error = 'We could not send your message. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F8FBFF">

    <title>Contact Us | Student Management System</title>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="contact-container">

        <section class="contact-hero">
            <span class="section-label">GET IN TOUCH</span>
            <h1>Let's Start a <span>Conversation.</span></h1>
            <p>
                Have a question or suggestion? Fill out the form
                or contact us directly using the options below.
            </p>
        </section>

        <section class="contact-layout">

            <!-- Contact Form -->
            <div class="contact-form-card">
                <div class="card-heading">
                    <span class="card-icon">✉</span>
                    <div>
                        <h2>Send a Message</h2>
                        <p>Fill in your details below.</p>
                    </div>
                </div>

                <?php if ($flash !== null): ?>
                <p class="contact-alert contact-alert-<?= e($flash['type']) ?>" role="status">
                    <?= e($flash['message']) ?>
                </p>
                <?php endif; ?>
                <?php if ($error !== ''): ?>
                <p class="contact-alert contact-alert-error" role="alert"><?= e($error) ?></p>
                <?php endif; ?>

                <form class="contact-form" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" autocomplete="name"
                            maxlength="100" value="<?= e($name) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address"
                            autocomplete="email" maxlength="150" value="<?= e($email) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="How can we help you?"
                            maxlength="5000" required><?= e($message) ?></textarea>
                    </div>

                    <button type="submit" class="send-btn">
                        Send Message <span>↗</span>
                    </button>

                </form>
            </div>

            <!-- Contact Information -->
            <aside class="contact-info">

                <div class="info-card address-card">
                    <span class="info-icon">⌖</span>
                    <h3>Our Location</h3>
                    <p>Uttarakhand, India</p>
                    <span class="info-note">India</span>
                </div>

                <div class="info-card phone-card">
                    <span class="info-icon">☎</span>
                    <h3>Phone Number</h3>
                    <p>9389280984</p>

                    <div class="contact-actions">
                        <a href="tel:+919389280984" class="contact-action call-btn">
                            <span>☎</span> Call
                        </a>

                        <a href="https://wa.me/919389280984" class="contact-action whatsapp-btn" target="_blank"
                            rel="noopener noreferrer">
                            <span>◉</span> WhatsApp
                        </a>
                    </div>
                </div>

                <div class="help-card">
                    <span class="help-icon">✦</span>
                    <h3>We're Here to Help</h3>
                    <p>
                        Choose your preferred contact method
                        or send us a message through the form.
                    </p>
                </div>

            </aside>

        </section>

        <footer class="contact-footer">
            <p>
                <strong>Student Management System</strong>
                <span> | </span>
                Contact & Support
            </p>
        </footer>

    </main>

</body>

</html>