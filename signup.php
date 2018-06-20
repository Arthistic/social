<?php include "includes/db.php";?>

<?php
$message="";

if(isset($_POST['signup'])){
	if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])){
		
				$firstname=$_POST['firstname'];
				$lastname=$_POST['lastname'];
				$email=$_POST['email'];
				$password=$_POST['password'];
		
				$firstname=html_char(string_escape($firstname));
				$lastname=html_char(string_escape($lastname));
				$email=html_char(string_escape($email));
				$password=html_char(string_escape($password));
				$password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
		
		if($stmt=mysqli_prepare($connection,"INSERT INTO users(firstname, lastname, email, password) VALUES (?,?,?,?)")){
				mysqli_stmt_bind_param($stmt,'ssss',$firstname, $lastname,$email,$password);			
							
				mysqli_stmt_execute($stmt);
				$message="Check your email";
				mysqli_stmt_close($stmt);

			}

	}else{
		$message="Feild should not be blank";
	}
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>
      .signup{
        width:30rem;
        height:32rem;
        position: absolute;
        left: 370px;
        top:5px;
        bottom: 10px;
        padding: 5px;
        margin: 0px;
      }
	  #signup{
	  padding-top: 35px;
	  }
      .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited{
		width:100%;
        background-color:#2672ae;
        border-color: #1b5480;
	  }
      label{
        font-size: 14px;
        margin: 0px;
      }
    </style>
  </head>
  <body>
   
    <p class="success"><?php echo $message;?></p>
     <div class="container">
      <div class="row" id="signup">

        <!--sign-up form-->
        <div class="col-sm-6"  >
          <div class="card signup"  >
            <div class="card-header" >
              <h3>Sign up to</h3>
            </div>  
          <div class="card-body sign_body" >
              <form method="post" action="">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname"> 
              </div>

              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname"> 
              </div>
              <div class="form-group">
                <label for="emailaddr">Email address</label>
                <input type="email" class="form-control" id="emailaddr" name="email"  placeholder="Enter email">
              
              </div>
              <div class="form-group">
                <label for="pass">Password(8 or more than 8 characters)</label>
                <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
              </div>
              <div class="card-text" style="font-size:13px;">
                By clicking on signup , you agree to <a href=""style="text-decoration: none;
        color:#0366d6;">User Agreement</a>,<a href="" style="text-decoration: none;
        color:#0366d6;">Private Policy</a> and <a href=""style="text-decoration: none;
        color:#0366d6;">Cookies Policy</a>
              </div><br>
              <button type="submit" class="btn btn-primary" name="signup">Signup</button>
            </form>
          </div>
        
        <div class="card-footer" style="margin:0px">
              Already a member? <a href="#" style="text-decoration: none;
        color:#0366d6;" >LogIn</a>
            </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>