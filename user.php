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
  header('Location: login.php');
  exit;
}

$reservexml = simplexml_load_file('./xml/reserve.xml') or die("Error: Cannot create object");
$myreserves = [];

foreach($reservexml->reserve as $i){
  if ((string)$i->user === $_SESSION['username']){
    array_push($myreserves, $i);
  }
}

$reserveLength = sizeof($myreserves);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="dashboard-container">
    <header>
      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>!</h2>
      <p>Role: User</p>
      <nav>
        <button onclick="document.location='transaction.php'">Reservation</button>
        <button onclick="document.location='logout.php'">Logout</button>
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
              <?php if ($reserveLength > 0): ?>
                <?php foreach($myreserves as $res) :?>
                  <?php print($res) ?>
                <tr>
                    <td><?=htmlspecialchars($res->book)?></td>
                    <td><?= htmlspecialchars($res->borrow_date) ?></td>
                    <td><?= htmlspecialchars($res->return_date) ?></td>
                    <td><?= htmlspecialchars($res->status) ?></td>
                </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
        </table>  


    
  </div>
</body>

</html>