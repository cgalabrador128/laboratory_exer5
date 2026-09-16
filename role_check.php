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

if (!isset($_SESSION['role']) && basename($_SERVER['PHP_SELF'], '.php' )!== 'login'){
  header('Location: login.php');
  exit();
}else if (isset($_SESSION['role'])){
  $role = $_SESSION['role']; //may value
  switch(basename($_SERVER['PHP_SELF'], '.php')){
    case 'user':
    case 'transaction':
      if($role === 'user'){
        break;
      }else {
        header('Location: login.php');
      }
    case 'admin':
    case 'manage':
      if($role === 'admin'){
        break;
      }else {
        header('Location: login.php');
      }
  

  }
}
?>