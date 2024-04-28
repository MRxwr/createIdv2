<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Card Web App</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your CSS file here for styling -->
</head>
<body>
    <header>
        <h1>Welcome to Your Electronic Card</h1>
        <!-- Include any header elements or navigation links here -->
    </header>

    <main>
        <section class="profile">
            <h2>Your Profile</h2>
            <!-- Include profile information and links to social media accounts here -->
        </section>

        <section class="customize">
            <h2>Customize Your Card</h2>
            <!-- Include customization options here, such as background color and social media button colors -->
        </section>

        <section class="share">
            <h2>Share Your Card</h2>
            <!-- Include sharing options here, such as generating a unique URL or QR code -->
        </section>

        <section class="privacy">
            <h2>Privacy Settings</h2>
            <!-- Include privacy settings options here -->
        </section>

        <section class="contact">
            <h2>Contact Form</h2>
            <form action="contact.php" method="POST">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Your Electronic Card</p>
        <!-- Include any footer elements or links here -->
    </footer>
</body>
</html>
