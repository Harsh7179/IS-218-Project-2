<?php 
include_once 'DB_connect.php';
$userses=$_SESSION['userid'];

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
      <a class="navbar-brand" href="#">Project # 2 - Database Queries and CSS Styling</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="post-question.php"><button class="btn btn-sm btn-primary" > Post a new Question </button></a></li>
		<li><a href="logout.php"><button class="btn btn-sm btn-danger" > Sign out </button></a></li>
      </ul>
    </div>
  </div>
  </nav>
     <div style="padding-top:50px;" class="container">
      <div style=" background: #grey;"class="col-md-4 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Welcome to Your Account
            </h1>
            <h2 class="wv-heading--subtitle">
               <?php
                         try{

                             $sql=$DB_con->prepare("SELECT * FROM accounts WHERE id='$userses' ");
                             $sql->execute();
                             while ($name=$sql->fetch(PDO::FETCH_ASSOC)){
                            ?> 
                             <h3> <?php echo $name['fname']; ?> <?php echo $name['lname']; ?> </h3>
										  <?php
								    }
								  }catch(PDOException $e)
							  {
							  echo $e->getMessage();
							  }
                        ?>
		
			  <div><br> <a href="post-question.php"><button class="btn btn-md btn-warning" > Click here to Add a new Question </button></a></div> 
            </h2>
         </div>
      </div>
   <div class="row">
    <div style="padding-top:40px;" class="col-md-6 mx-auto">
<div class = "panel panel-danger">
   <div class = "panel-heading">
        <b>Recently Added Questions</b>
   </div>
   
   <div class = "panel-body">
   <div class = "panel-body text-center">
      This is the list of your added questions
   </div>
   <table class = "table">
      <tr>
         <th>Title</th>
         <th>Creation Date</th>
		  <th>Body </th>
		   <th>Skills </th>
		   <th>Score</th>
      </tr>
         <?php
		 try{

			 $sqlq=$DB_con->prepare("SELECT * FROM questions WHERE ownerid='$userses' ");
			 $sqlq->execute();
			 while ($que=$sqlq->fetch(PDO::FETCH_ASSOC)){
			?>  
      <tr>
         <td><?php echo $que['title']; ?></td>
         <td><?php echo $que['createddate']; ?></td>
		 <td><?php echo $que['body']; ?></td>
         <td><?php echo $que['skills']; ?></td>
		 <td><?php echo $que['score']; ?></td>
      </tr>
				  <?php
					}
				  }catch(PDOException $e)
			  {
			  echo $e->getMessage();
			  }
		?>
   </table>
</div>
      
   </div>
</div>
         </div>
      </div>
   </div>


</body>
</html>