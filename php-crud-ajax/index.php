<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP AJAX Contact Manager</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h2>Add Contact</h2>
    <form id="contactForm">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone (optional)">
        <button type="submit">Add Contact</button>
    </form>

    <h2>All Contacts</h2>
    <div id="contactsList"></div>

    <script src="assets/main.js"></script>
</body>
</html>
