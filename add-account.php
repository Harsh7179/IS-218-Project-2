<?php include_once 'DB_connect.php'; 

if(isset($_POST['register']))
{
	$email =trim($_POST['email']);
	$fname=trim($_POST['fname']);
	$lname=trim($_POST['lname']);
	$bd=trim($_POST['birthday']);
    $pass = trim($_POST['password']);

	if (empty($email)){
			$err="please provide your Email!";
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $err="Enter a valid email address";
		}else if (empty($fname)){
			$err="please provide your First Name!";
		}else if (empty($lname)){
			$err="please provide your Last Name!";
		}else if (empty($bd)){
			$err="please provide your Birthday!";
		}else if (empty($pass)){
			$err="please provide your passoword!";
		}
		if(empty($err)){
			  try
			    {
					$reg = $DB_con->prepare("INSERT INTO accounts(email,fname,lname,birthday, password)VALUES(:e, :f, :l, :b, :p)");
					$reg->bindparam(":e",$email);
					$reg->bindparam(":f",$fname);
					$reg->bindparam(":l",$lname);
					$reg->bindparam(":b",$bd);
					$reg->bindparam(":p",$pass);
					$reg->execute();	
				}
				catch(PDOException $e)
			{
				echo $e->getMessage(); 
			}
			if($reg){
					header("Location: index.php"); 
			}
				  try
			    {
			      $stmt = $DB_con->prepare("SELECT * FROM accounts WHERE email='$email' ");
			      $stmt->execute();
			      $user=$stmt->fetch(PDO::FETCH_ASSOC);
			      if($stmt->rowCount() == 1)
			      {
			        if($user['password']==$pass)
			        {
			              $_SESSION['userid'] = $user['userid'];
			              $user=$_SESSION['userid'] ;

			              ?>
			  <script type="text/javascript">alert("Success. Go to the dashboard and View");</script>
			  <?php
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
}?>