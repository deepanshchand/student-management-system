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

                <form class="contact-form" method="post">

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" autocomplete="name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address"
                            autocomplete="email" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="How can we help you?"
                            required></textarea>
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