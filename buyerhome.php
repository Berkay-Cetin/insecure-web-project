<?php 
    session_start();
    //Insecure DOR zaafiyet giderme
    /*$role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="buyer"){
      header('Location: index.php?err=2');
    }*/

$inactive = 30;
if(isset($_SESSION['timeout']) ) {
  $session_life = time() - $_SESSION['timeout'];
  if($session_life > $inactive)
        { header("Location:index.php?err=3"); }
}
$_SESSION['timeout'] = time();

$connect = new PDO("mysql:host=localhost;dbname=bookstore", "root", "");

$query = "SELECT * FROM sellbooks";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
<html>
 <head>
  <title>Buyer</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>
 <body>
  <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
  <div class="container">
   <br />
   <br />
   <h2 align="center">Buyer Homepage</h2><br />
   <form action="" method="POST">
    Desired Book: <input type="text" name="mybook">
    <input type="submit" value="Search">
    </form>
    <?php 
    if (isset($_POST["mybook"])){
      //XSS zaafiyet giderme
      /*$bookstring = filter_var($_POST["mybook"], FILTER_SANITIZE_STRING);
      $key = array_search($bookstring, array_column($result, 'bookname2'));
          if ($key !== false){
            echo $bookstring," is Available";
          }else{
            echo $bookstring," is not Available";
          }*/
      $key = array_search($_POST["mybook"], array_column($result, 'bookname2'));
    			if ($key !== false){
    				echo $_POST["mybook"]," is Available";
    			}else{
    				echo $_POST["mybook"]," is not Available";
    			}
    	}

    ?>
   <h3 align="center">Available Books</h3>
   <br />
   <table class="table table-striped table-bordered">
    <thead>
     <tr>
      <th>Book Name</th>
      <th>Author Name</th>
     </tr>
    </thead>
    <tbody id="table_data">
    <?php
    foreach($result as $row)
    {
     echo '
     <tr>
      <td>'.$row["bookname2"].'</td>
      <td>'.$row["author2"].'</td>
     </tr>
     ';
    }
    ?>
    </tbody>
   </table>
  </div>
 </body>
</html>