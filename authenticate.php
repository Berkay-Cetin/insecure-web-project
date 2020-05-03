<?php 
 require 'database-config.php';

 session_start();

 $username = $_POST['username'];
 $password = $_POST['password'];
 $role = $_POST['role'];

//sql injection zaafiyet giderme
 /*$username = "";
 $password = "";
 $role = "";
 
 if(isset($_POST['username'])){
  $username = $_POST['username'];
 }
 if (isset($_POST['password'])) {
  $password = $_POST['password'];
 }
 if(isset($_POST['role'])){
  $role = $_POST['role'];
 }
 

 $q = 'SELECT * FROM users WHERE username=:username AND password=:password AND role=:role';*/
 $q = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";

 $query = $dbh->prepare($q);

 $query->execute(array(':username' => $username, ':password' => $password, ':role' => $role));


 if($query->rowCount() == 0){
  header('Location: index.php?err=1');
 }else{

  $row = $query->fetch(PDO::FETCH_ASSOC);

  session_regenerate_id();
  $_SESSION['sess_user_id'] = $row['id'];
  $_SESSION['sess_username'] = $row['username'];
  $_SESSION['sess_userrole'] = $row['role'];

        echo $_SESSION['sess_userrole'];
  session_write_close();

  if( $_SESSION['sess_userrole'] == "publisher"){
   header('Location: publisherhome.php');
  }else if( $_SESSION['sess_userrole'] == "seller"){
   header('Location: sellerhome.php');
  }else if( $_SESSION['sess_userrole'] == "buyer"){
   header('Location: buyerhome.php');
  }else{
    header('Location: index.php?err=2');
  }
  
  
 }


?>