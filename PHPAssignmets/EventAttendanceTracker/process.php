<?php 
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "admin authentication";
$tbname = "authenticate username and password"

  $conn = new PDO(mysql:host=$servername, dbname=$dbname, $username, $password);
      // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $username = "";
  $email = "";
  if (isset($_POST['submit'])) {
  	$username = $_POST['username'];
  	$password = $_POST['password'];

  	$name = "SELECT * FROM '$tbname' WHERE Username='$username'";
  	$pass = "SELECT * FROM '$tbname' WHERE 'Password'='$password'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
           $query = "INSERT INTO users (username, email, password) 
      	    	  VALUES ('$username', '$email', '".md5($password)."')";
           $results = mysqli_query($db, $query);
           echo 'Saved!';
           exit();
  	}
  }
?>