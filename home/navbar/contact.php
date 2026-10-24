<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | StudentHub</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main class="page-container">
        <section class="page-card">
            <h1>Contact <span>Us</span></h1>
            <p>Have a question? Send us a message.</p>

            <form class="page-form" method="post">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Write your message" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>

</body>

</html>