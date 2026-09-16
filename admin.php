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
// Session & Role check logic (Admin verification) handled by Student B
?>
<?php
include 'session_check.php';
include 'role_check.php';
if ($_SESSION['role'] !== 'admin' && isset($_SESSION['role'])) {
  //access denied logic
  echo 'Access Denied';
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="admin-container">
    <header>
      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Administrator'); ?> </h2>
      <p>Role: Administrator</p>
      <nav>
        <button onclick="document.location='manage.php'">Manage Records</button>
        <button onclick="document.location='logout.php'">Logout</button>

      </nav>
    </header>


  </div>
</body>

</html>