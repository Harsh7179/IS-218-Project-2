<?php 
include_once 'DB_connect.php';
$userses=$_SESSION['userid'] ;
include_once 'add-question.php';
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
        <li><a href="dashboard.php"><button class="btn btn-sm btn-primary" > Back to the Dashboard </button></a></li>
		<li><a href="logout.php"><button class="btn btn-sm btn-danger" > Sign out </button></a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<section class="question">
<div class="container">
<div class="row">
<div class="col-sm-12">
    <form action="" method="post" name="squestion">
	<div class="single">
		<h2>Submit a new Question</h2>
		
					  <?php
				if (isset($err)) {
					?>
				 <center> <p class="alert alert-danger"><?php  echo $err; ?> </p></center>
					<?php
				} 
					?>
                  <div class="form-group">
				     <label class="left"> The Title of the Question </label>
                     <input name="title" type="text" class="form-control my-input" id="name" placeholder="Question Title" required>
                  </div>
				  <div class="form-group">
				     <label class="left"> The Skills </label>
                     <input type="text" name="skills" class="form-control my-input" id="name" placeholder="Skills" required>
                  </div>
				  <div class="form-group">
                       <label class="left"> The Body </label>
					   <textarea class="form-control" name="body" rows="4" cols="50" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="text-center ">
                     <button type="submit" name="submitq" class="btn btn-block btn-warning">Submit Now</button>
                  </div>
	</div>
	</form>
</div>
</div>
</div>
</section>
</body>
</html>