<?php 
if (isset($_SESSION['role'])){
  $role = $_SESSION['role'];
  if($role === 'admin'){
    header('Location: admin/dashboard.php');
  } else {
   header(' Location: user/dashboard.php '); 
  }
}else{
  header('Location: login.php');
}
?>