<?php include_once 'DB_connect.php';  
if(isset($_POST['login']))
		{
	$email =trim($_POST['email']);
    $pass = trim($_POST['password']);
	
	if (empty($email)){
			$err="Please provide your Email!";
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $err="Enter a valid email address";
		  }else if (empty($pass)){
			$err="Please provide your passoword!";
			}
				if(empty($err)){
				  try
			        {
			      $stmt = $DB_con->prepare("SELECT * FROM accounts WHERE email='$email' ");
			      $stmt->execute();
			      $user=$stmt->fetch(PDO::FETCH_ASSOC);
			      if($stmt->rowCount() == 1)
			      {
			        if($user['password']==$pass)
			        {
					 
					  $_SESSION['userid'] = $user['id'];
					  $userses=$_SESSION['userid'] ;

					  header("Location: dashboard.php");
			        }else{
			          $err="Incorrect Login information !";
			        }
			      }else{
			        $err="No record match";
			      }
			    }
		catch(PDOException $e)
		{
		  echo $e->getMessage();
		}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project #2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="custom.css">
</head>
<body>
<div>
<nav style="background:#383300; "class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Project # 2 - Database Queries and CSS Styling</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><button class="btn btn-sm btn-primary" > Click here to Register </button></a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
   <div style="padding-top:50px;" class="container">
      <div style=" background: #grey;"class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Login to Your Account
            </h1>
            <h2 class="wv-heading--subtitle">
               Get to post your Question and also view you previously posted questions
			   <img src="login-img.png" width="80" height="60"alt="Login">
			  <div> <a href="registration-form.php"><button class="btn btn-md btn-warning" > Click here to Register </button></a></div> 
            </h2>
         </div>
      </div>
      <div class="row">
         <div style="padding-top:40px; background: #ccbf73;" class="col-md-4 mx-auto">
            <p class="alert alert-info" > * Ensure that all details are valid! </p>
			<div class="myform form">
               <form action="" method="post" name="login">
			   <?php
                                if (isset($err)) {
                                    ?>
                                 <center> <p class="alert alert-danger"><?php  echo $err; ?> </p></center>
                                    <?php
                                } 
                            ?>
                  <div class="form-group">
                     <input type="email" name="email" type="email" class="form-control my-input" id="name" placeholder="Your Email Address">
                  </div>
                  <div class="form-group">
                     <input type="password" name="password" type="password" class="form-control my-input" id="email" placeholder="Your Password">
                  </div>
                  <div class="text-center ">
                     <button type="submit" name="login" class=" btn btn-block btn-primary send-button tx-tfm">Login Now</button>
					   <p class="alert alert-sucess"> You will be redirected to the Home page</p>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
</html>
