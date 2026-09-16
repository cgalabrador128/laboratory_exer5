<!-- 
GEROME VINCENT CARREON
CATHERINE GRACE LABRADOR
RUBEN (HERNANDEZ) MAGPANTAY III

SEPTEMBER 16, 2026

Laboratory Exercise 4
Secure Web System: Sessions, Cookies, Validation, and Access Restrictions
1. Activity Overview
In this laboratory activity, the group will develop a small web-based system
based on an assigned topic.
Your system may be about any appropriate information or transaction system,
but it must demonstrate how a web application protects pages, manages users,
remembers appropriate information, and validates submitted data.
The focus is not on creating a large application. The goal is to understand how a
web system controls what a user can do after logging in.
Your system must demonstrate:
• Login and logout
• PHP sessions
• Session-based page restrictions
• User roles
• Role-based access
• Cookies
• Form validation
• Input restrictions
• Unauthorized-access handling
• Session timeout
• Basic security practices
  -->
<?php
session_start();

$dataxml = simplexml_load_file('./xml/data.xml') or die("Error: Cannot create object");

$error = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $user = htmlspecialchars($_POST['username'] ?? '');
    $pass = htmlspecialchars($_POST['password'] ?? '');

    foreach ($dataxml->children() as $i) {
        if ((string)$i->username === $user && (string)$i->password === $pass) {
            $_SESSION['username'] = $user;
            $_SESSION['role'] = (string)$i->role;
            header('Location: dashboard.php');
            exit;
        }
    }

    $error = 'Invalid username or password.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-card">
        <h1>Library Reservation</h1>
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <input type="submit">
            <?php if (!empty($error)) : ?>
                <p><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>

