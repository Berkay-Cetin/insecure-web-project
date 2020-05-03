<?php  
 $connect = mysqli_connect("localhost", "root", "", "bookstore");  
 $sql = "INSERT INTO sellbooks(bookname2, author2) VALUES('".$_POST["bookname2"]."', '".$_POST["author2"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 