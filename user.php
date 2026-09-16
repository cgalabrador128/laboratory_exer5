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

if (!isset($_SESSION['role'])) {
  echo 'Access Denied';
  exit;
}

$reservexml = simplexml_load_file('./xml/reserve.xml') or die("Error: Cannot create object");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fullname = htmlspecialchars($_POST['borrower_name']);
  $libraryId = htmlspecialchars($_POST['library_id']);
  $booktitle = htmlspecialchars($_POST['book_title']);
  $borrow_date = date('Y m d', strtotime($_POST['borrow_date'])); // 2025 01 31
  $return_date = date('Y m d', strtotime($_POST['return_date']));

  $xmlData = $reservexml->addChild('reserve');
  $xmlData->addChild('name', $fullname);
  $xmlData->addChild('id', $libraryId);
  $xmlData->addChild('book', $booktitle);
  $xmlData->addChild('borrow_date', $borrow_date);
  $xmlData->addChild('return_date', $return_date);
  
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
  <div class="dashboard-container">
    <header>
      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>!</h2>
      <p>Role: Regular User</p>
      <nav>
        <a href="transaction.php">Reservation</a> |
        <a href="logout.php">Logout</a>
      </nav>
    </header>

    <hr>
    <h3>My Reservations</h3>

    <table class="data-table">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Web Systems and Technologies Guide</td>
                    <td>2026-09-16</td>
                    <td>2026-09-18</td>
                    <td>Pending</td>
                </tr>
            </tbody>
        </table>  


    
  </div>
</body>

</html>