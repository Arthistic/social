<?php ob_start(); ?>
<?php include "includes/db.php";?>
<?php
$message="";

if(isset($_POST['login'])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username=html_char(string_escape($_POST['username']));
		$password=html_char(string_escape($_POST['password']));
		
		$query="SELECT * FROM users WHERE email = '{$username}'";
		$result=query($query);
		confirm($result);		
		while($row=fetch_array($result)){
				$db_password=$row['password'];
				if(password_verify($password,$db_password)){
				
					header("Location: signup.php");
			}
		}
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
      .login{
        background-color: white;
        width:20rem;
        height:23rem;
        position: absolute;
        top:7rem;
        left:25rem;
        font-family: Helvetica;
      }
      .login_body,{
        padding: 15px;
      }
	  #signup{
	  margin-top: 60px ;
	  }
      .btn{
        width:100%;
        background-color:#2672ae;
        border-color: #1b5480;
      }
	  #new{
	   margin-top:8px ;
	  
	  }
	  .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited{
		width:100%;
        background-color:#2672ae;
        border-color: #1b5480;
	  }	  
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
		<p><?php echo $message;?></p>
        <!--login form-->
        <div class="col-sm-6">
          <div class="card login" >
            <div class="card-header">
              <h2>Sign in to</h2>
            </div>  
          <div class="card-body login_body">
              <form method="post" action="">
              <div class="form-group">
                <label for="emailaddr">Email address or username</label>
                <input type="email" class="form-control" id="emailaddr" name="username" placeholder="Enter email">
              
              </div>
              <div class="form-group">
                <label for="pass">Password</label><a href='#' style="float:right;font-size:13px;text-decoration:none;color:#0366d6">Forgot Password?</a>
                <input type="password" name="password" class="form-control" id="pass" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
          </div>
		  <div class="card sign" id="signup">
			<p align="center" id="new">New to Site?<a href="#" style="text-decoration: none;
        color:#0366d6;"> Create an account. </a></p>
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