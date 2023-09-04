<?php
// session_start();

//initializing variables
$username = "";
$email    = "";

// $errors = array(); 

// connect to the database
// $db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
// if (mysqli_connect_errno())
//     {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     }

// REGISTER USER

require_once('config.php');

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username=mysqli_real_escape_string($db, $_POST['username']);
  $nome=mysqli_real_escape_string($db, $_POST['nome']);
  $cognome= mysqli_real_escape_string($db, $_POST['cognome']);
  $email= mysqli_real_escape_string($db, $_POST['email']);
  $password= mysqli_real_escape_string($db, $_POST['password']);
}

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  // if (empty($username)) { array_push($errors, "Username is required"); }
  // if (empty($nome)) { array_push($errors, "First Name is required"); }
  // if (empty($cognome)) { array_push($errors, "Last Name is required"); }
  // if (empty($email)) { array_push($errors, "Email is required"); }
  // if (empty($password)) { array_push($errors, "Password is required"); }
  // }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM utenti WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO utenti (username, nome, cognome, email, password) 
  			  VALUES('$username', '$nome', '$cognome','$email','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['nome'] =$nome;
	$_SESSION['cognome'] =$cognome;
  	header('location: conserve.html');
  }

// LOGIN USER
if(isset($_POST['submit']))
{
  
  //mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    
    if (count($errors) == 0) 
    {
      $password = md5($password);
      if (md5($_POST['password']) !== $password)
{
    echo "Password is invalid";
}
      $query = "SELECT * FROM utenti WHERE username='$username' AND password_1 ='$password'";
		
		
		
		
		$sql="SELECT nome,cognome FROM utenti WHERE username='$username' AND password_1 ='$password'";
		$result=mysqli_query($db,$sql);  
		$row=mysqli_fetch_assoc($result);
	 
	 
	 
      $results = mysqli_query($db, $query);
      $res=mysqli_num_rows($results);
      if ($res) 
      {
        $_SESSION['username'] = $username;
        $_SESSION['nome'] =$row["nome"];
		
		$_SESSION['cognome'] =$row["cognome"];
        header('location: conserve.html');
      }
      else 
      {
        array_push($errors, "Wrong username/password combination");
      }
    }

    

   
  }
  
  ?>
  