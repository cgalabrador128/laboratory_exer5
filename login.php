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
include 'session_check.php';

$dataxml = simplexml_load_file('./xml/data.xml') or die("Error: Cannot create object");

$error_message = '';

if(isset($_SESSION['role'])){
  header('Location: '.$_SESSION['role'].'.php');
}
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $user = htmlspecialchars($_POST['username'] ?? '');
    $pass = htmlspecialchars($_POST['password'] ?? '');
    $remember = $_POST['remember'] ?? false;

    foreach ($dataxml->children() as $i) {
        if ((string)$i->username === $user && (string)$i->password === $pass) {
            $_SESSION['username'] = $user;
            $_SESSION['role'] = (string)$i->role;
            if($remember){
              setcookie('remember_user', $user, 0, '/');
            }
            header('Location: '.$_SESSION['role'].'.php');
            exit;
        }
    }

    $error_message = 'Invalid username or password.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Library System Login</h2>
        
        <!-- Error Message Display -->
        <?php if (!empty($error_message)): ?>
            <div class="error-box"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" 
                       value="<?php echo isset($_COOKIE['remember_user']) ? htmlspecialchars($_COOKIE['remember_user']) : ''; ?>" 
                       required minlength="4" placeholder="Enter username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter password">
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="remember" name="remember" >
                <label for="remember">Remember my username</label>
            </div>

            <button type="submit" name="login_btn">Login</button>
        </form>
    </div>
</body>
</html>

