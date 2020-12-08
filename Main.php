
<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "bball");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




if (isset($_POST['log']))
{

  if(empty($_POST['username']) || empty($_POST['password'])   )
  {
  	echo "<script>alert('You have an empty field.');</script>";

      	echo"<script>location.assign('Main.php')</script>";  // go back to the login page
  }


		$username = mysql_real_escape_string($_POST['username']);     // to get rid of the tricky characters which can destroy the database.
		$password = mysql_real_escape_string($_POST['password']);  // turn into a hash function.
      $mysql_result= mysqli_query($link,"SELECT * from login_table WHERE username LIKE '$username' AND password LIKE '$password' ");
      
    $row_cnt = mysqli_num_rows($mysql_result);
echo $row_cnt;


			if($row_cnt!=1)   // if there is no such user like that.
		{
			echo "<script>alert('The username or the password does not exist in the database');</script>";

				echo"<script>location.assign('Main.php')</script>";  // go back to the login page
		}

  else {
			echo "<script>alert('You have succesfully entered the system !');</script>";

			session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

      	echo"<script>location.assign('Players.php')</script>";  // go to the new page



        }
        

}
?>

<html>

		<body style='width: 100% ; height:100% ; position: fixed; background-color: yellow ; color: black;'>


			<form action='Main.php' method=POST style='padding: 225px 550px 100px' ;>

				<h1 style="padding-left:0px"><b>Login Page</b></h1>

							<b> Username : </b> <br>
							<input type='text' name='username' /> <br><br>
							<b> Password : </b> <br>
							<input type='password' name='password' />

							<br> <br>

							<input type='submit' value= "Sign in" / name= "log">


			</form>

	</body>

</html>