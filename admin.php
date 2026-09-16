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

if ($_SESSION['role'] !== 'admin'){
//access denied logic
  echo 'Access Denied';
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Library System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin-container">
        <header>
            <h2>Administrator Dashboard</h2>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Administrator'); ?> (Role: Admin)</p>
            <nav>
                <a href="admin.php">Manage Records</a> | 
                <a href="logout.php">Logout</a>
            </nav>
        </header>

        <hr>

        <div class="content-section">
            <h3>Library System Management</h3>
            <p>Here you can view, add, or delete book reservations and system user records.</p>
            
            <!-- Sample Management Table Structure -->
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Borrower</th>
                        <th>Book Title</th>
                        <th>Borrow Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Juan Dela Cruz</td>
                        <td>Web Systems and Technologies Guide</td>
                        <td>2026-09-16</td>
                        <td>Active</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

