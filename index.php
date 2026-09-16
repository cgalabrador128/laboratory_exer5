<?php 
include 'session_check.php';
if (isset($_SESSION['role'])){
  $role = $_SESSION['role'];
  if($role === 'admin'){
    header('Location: admin.php');
  } else {
   header(' Location: user.php '); 
  }
}else{
  header('Location: login.php');
}
?>