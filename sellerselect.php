<?php  
 $connect = mysqli_connect("localhost", "root", "", "bookstore");  
 $output = '';  
 $sql = "SELECT * FROM sellbooks ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">Book Name</th>  
                     <th width="40%">Author Name</th>  
                     <th width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="bookname2" data-id1="'.$row["id"].'" contenteditable>'.$row["bookname2"].'</td>  
                     <td class="author2" data-id2="'.$row["id"].'" contenteditable>'.$row["author2"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="bookname2" contenteditable></td>  
                <td id="author2" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>