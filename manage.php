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

$reservexml = simplexml_load_file('./xml/reserve.xml') or die("Error: Cannot create object");
$reserves = [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
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
                    <th>Transaction ID</th>
                    <th>Student ID</th>
                    <th>Borrower</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservexml->reserve as $i): ?>
                    <tr>
                        <td><?= htmlspecialchars($i->transaction_id) ?></td>
                        <td><?= htmlspecialchars($i->library_id) ?></td>
                        <td><?= htmlspecialchars($i->name) ?></td>
                        <td><?= htmlspecialchars($i->book) ?></td>
                        <td><?= htmlspecialchars($i->borrow_date) ?></td>
                        <td><?= htmlspecialchars($i->return_date) ?></td>
                        <td class="dropdown-cell"><?= htmlspecialchars($i->status) ?>
                            <select name="status" required>
                                <option value="" disabled selected>Pending</option>
                                <option value="approved">Approved</option>
                                <option value="deny">Deny</option>
                            </select>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="document.location='admin.php'">Back to Dashboard</button>

    </div>

</body>

</html>