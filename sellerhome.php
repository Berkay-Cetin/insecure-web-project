<?php 
    session_start();
    //Insecure DOR zaafiyet giderme
    /*$role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="seller"){
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
    $query = "SELECT * FROM newbooks ORDER BY id ASC";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();
?>
<html>  
      <head>  
           <title>Seller</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>
      <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>  
           <div class="container"> 
            <br />
            <h2 align="center">Seller Homepage</h2><br />
                <br />
   <h3 align="center">Edit Bookstore</h2><br /> 
                <div class="table-responsive">
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
                
                     <div id="live_data"></div>                 
                </div>  
           </div>  
           <br />
   <h3 align="center">Published Books</h2><br /> 
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"sellerselect.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var bookname2 = $('#bookname2').text();  
           var author2 = $('#author2').text();  
           if(bookname2 == '')  
           {  
                alert("Enter Book Name");  
                return false;  
           }  
           if(author2 == '')  
           {  
                alert("Enter Author Name");  
                return false;  
           }  
           $.ajax({  
                url:"sellerinsert.php",  
                method:"POST",  
                data:{bookname2:bookname2, author2:author2},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"selleredit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.bookname2', function(){  
           var id = $(this).data("id1");  
           var bookname2 = $(this).text();  
           edit_data(id, bookname2, "bookname2");  
      });  
      $(document).on('blur', '.author2', function(){  
           var id = $(this).data("id2");  
           var author2 = $(this).text();  
           edit_data(id,author2, "author2");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"sellerdelete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>