<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<div class="col-md-6 col-md-offset-3">
                    <h1 align="center"></span>Bookstore System<span></h1><br/>
                            <div class="block-margin-top">
                              <?php 

                                $errors = array(
                                    1=>"Invalid user name, password or role, Try again",
                                    2=>"Please login to access this area",
                                    3=>"Session has expired"
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 3) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                               ?>  

                              <form action="authenticate.php" method="POST" class="form-signin col-md-8 col-md-offset-2" role="form">  
                                  <input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br/>
                                  <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
                                  <div class="form-group lead" align="center">
                                  <input type="radio" name="role" class="custom-radio" value="publisher">&nbsp;Publisher&nbsp;&nbsp;
                                  <input type="radio" name="role" class="custom-radio" value="seller">&nbsp;Seller&nbsp;&nbsp;
                                  <input type="radio" name="role" class="custom-radio" value="buyer">&nbsp;Buyer<br/>
                                  </div>
                                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log in</button>
                             </form>
                           </div>
            </div>