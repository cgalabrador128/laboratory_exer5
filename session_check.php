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

$sessionTimeout = 10; // 30 mins
if (isset($_SESSION['LAST_ACTIVITY'])){
  $lastAct = $_SESSION['LAST_ACTIVITY'];
  $curr = time();
  $timeSinceLast = $curr - $lastAct;

  if($timeSinceLast > $sessionTimeout){
    session_unset();
    session_destroy();
    echo'<script> confirm("Session expired. Please log in again.");
    if(confirm){
    window.location.href="login.php";
    }</script>';
    
  } else {
    $_SESSION['LAST_ACTIVITY'] = $curr;
  }
}else {
  create_session();
}
function create_session(){
  $_SESSION['LAST_ACTIVITY'] = time();
}

?>