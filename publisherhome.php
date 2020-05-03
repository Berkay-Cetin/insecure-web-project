<?php 
    session_start();
    //Insecure DOR zaafiyet giderme
    /*$role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="publisher"){
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

$query = "SELECT * FROM newbooks ORDER BY id DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>

<html>
 <head>
  <title>Publisher</title>
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
   <h2 align="center">Publisher Homepage</h2><br />
   <h3 align="center">Add a Book</h3>
   <br />
   <form method="post" id="add_details">
    <div class="form-group">
     <label>Book Name</label>
     <input type="text" name="bookname1" class="form-control" required />
    </div>
    <div class="form-group">
     <label>Author Name</label>
     <input type="text" name="author1" class="form-control" required />
    </div>
    <div class="form-group">
     <input type="submit" name="add" id="add" class="btn btn-success" value="Add" />
    </div>
   </form>
   <br />
   <h3 align="center">Published Books</h3>
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
      <td>'.$row["bookname1"].'</td>
      <td>'.$row["author1"].'</td>
     </tr>
     ';
    }
    ?>
    </tbody>
   </table>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#add_details').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"publisherinsert.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.bookname1)
    {
     var html = '<tr>';
     html += '<td>'+data.bookname1+'</td>';
     html += '<td>'+data.author1+'</td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
  })
 });
 
});
</script>