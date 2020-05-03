<?php

$connect = new PDO("mysql:host=localhost;dbname=bookstore", "root", "");

$data = array(
 ':bookname1'  => $_POST["bookname1"],
 ':author1'  => $_POST["author1"]
); 

$query = "
 INSERT INTO newbooks 
(bookname1, author1) 
VALUES (:bookname1, :author1)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 $output = array(
  'bookname1' => $_POST['bookname1'],
  'author1'  => $_POST['author1']
 );

 echo json_encode($output);
}

?>