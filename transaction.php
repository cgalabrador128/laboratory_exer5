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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fullname = htmlspecialchars($_POST['borrower_name'] ?? '');
  $libraryId = htmlspecialchars($_POST['student_num'] ?? '');
  $booktitle = htmlspecialchars($_POST['book_title'] ?? '');
  $borrow_date = date('Y-m-d', strtotime($_POST['borrow_date'] ?? '')); // 2025 01 31
  $return_date = date('Y-m-d', strtotime($_POST['return_date'] ?? ''));

  if($borrow_date > $return_date){
    $error_message = '';

  }else {
    $xmlData = $reservexml->addChild('reserve');
    $xmlData->addChild('transaction_id', $reservexml->id);
    $xmlData->addChild('user', $_SESSION['username']);
    $xmlData->addChild('name', $fullname);
    $xmlData->addChild('library_id', $libraryId);
    $xmlData->addChild('book', $booktitle);
    $xmlData->addChild('borrow_date', $borrow_date);
    $xmlData->addChild('return_date', $return_date);
    $xmlData->addChild('status', 'Pending');
    $reservexml->id++;

    $reservexml->asXML('./xml/reserve.xml');
    $success_msg = 'success';
  }
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
    <div class="form-container">
        <h3>Reserve a Library Book</h3>

        <?php if (!empty($success_msg)): ?>
            <div class="success-box"><?php echo htmlspecialchars($success_msg); ?></div>
        <?php endif; ?>

        <?php if (!empty($error_msg)): ?>
            <div class="error-box"><?php echo htmlspecialchars($error_msg); ?></div>
        <?php endif; ?>

        <form action="transaction.php" method="POST">
            <div class="form-group">
                <label for="borrower_name">Borrower Full Name:</label>
                <input type="text" id="borrower_name" name="borrower_name" required minlength="2" placeholder="Full Name">
            </div>

            <div class="form-group">
                <label for="student_num">Student Number:</label>
                <input type="text" id="student_num" name="student_num" required placeholder="202xxxxxxx" maxlength="10" >
            </div>

        <div class="form-group">
          <label for="book_title">Select Book:</label>
          <select id="book_title" name="book_title" required>
            <option value="">-- Choose a Book --</option>
            <?php $books = simplexml_load_file('./xml/books.xml') or die("Error: Cannot create object");
            foreach($books->children() as $book): ?>
              <?php if((string)$book->availability) :
               $name = (string)$book->name;?>
                <option value="<?=htmlspecialchars($name)?>"><?=htmlspecialchars($name)?></option>
              <?php endif; ?>
            <?php endforeach; ?>
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
            <button onclick="document.location='user.php'">Back to Dashboard</button>

        </form>
    </div>
</body>

</html>