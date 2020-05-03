<?php  
 $connect = mysqli_connect("localhost", "root", "", "bookstore");  
 $sql = "DELETE FROM sellbooks WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>