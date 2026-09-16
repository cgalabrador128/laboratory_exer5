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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - Library System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>!</h2>
            <p>Role: Regular User</p>
            <nav>
                <a href="user.php">Dashboard & Reservation</a> | 
                <a href="logout.php">Logout</a>
            </nav>
        </header>

        <hr>

        <div class="form-container">
            <h3>Reserve a Library Book</h3>
            
            <?php if (!empty($success_msg)): ?>
                <div class="success-box"><?php echo htmlspecialchars($success_msg); ?></div>
            <?php endif; ?>

            <?php if (!empty($error_msg)): ?>
                <div class="error-box"><?php echo htmlspecialchars($error_msg); ?></div>
            <?php endif; ?>

            <form action="user.php" method="POST">
                <div class="form-group">
                    <label for="borrower_name">Borrower Full Name:</label>
                    <input type="text" id="borrower_name" name="borrower_name" required minlength="2" placeholder="Full Name">
                </div>

                <div class="form-group">
                    <label for="library_id">Library / Student ID:</label>
                    <input type="text" id="library_id" name="library_id" required placeholder="e.g., 2020112405">
                </div>

                <div class="form-group">
                    <label for="book_title">Select Book:</label>
                    <select id="book_title" name="book_title" required>
                        <option value="">-- Choose a Book --</option>
                        <option value="datastructures">Introduction to Data Structures</option>
                        <option value="webtech">Web Systems and Technologies Guide</option>
                        <option value="osconcepts">Operating System Concepts</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="borrow_date">Borrow Date:</label>
                    <!-- Prevents selecting past dates -->
                    <input type="date" id="borrow_date" name="borrow_date" required min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="return_date">Expected Return Date:</label>
                    <input type="date" id="return_date" name="return_date" required min="<?php echo date('Y-m-d'); ?>">
                </div>

                <button type="submit" name="submit_reservation">Submit Reservation</button>
            </form>
        </div>
    </div>
</body>
</html>
