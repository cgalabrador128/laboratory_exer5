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
include 'role_check.php';

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
    <div class="content-section">
        <h3>Library System Management</h3>
        <p>Here you can view, add, or delete book reservations and system user records.</p>

        <!-- Sample Management Table Structure -->
        <table class="data-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Borrower</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Juan Dela Cruz</td>
                    <td>Web Systems and Technologies Guide</td>
                    <td>2026-09-16</td>
                    <td>2026-09-18</td>
                    <td class="dropdown-cell">
                        <select name="status" required>
                            <option value="" disabled selected>Pending</option>
                            <option value="approved">Approved</option>
                            <option value="deny">Deny</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <button onclick="document.location='admin.php'">Back to Dashboard</button>

    </div>

</body>

</html>