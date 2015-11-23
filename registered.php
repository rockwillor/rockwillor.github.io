
<html>
<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];

if($username&&$password)
{
		$connect = mysql_connect("localhost", "root", "") or die("couldn't connect to the database");
		mysql_select_db("signinsystem") or die("Couldn't connect to database");
		$query = mysql_query("SELECT * FROM `user` WHERE username='$username'");
		$numrows = mysql_num_rows($query);
	if($numrows==0)
	{
		mysql_query("INSERT INTO user (fName, sName, email, password, username ) VALUES ('$fname', '$sname', '$email', '$password', '$username')");
		header( "refresh:3; url=http://localhost/index.php" );
		echo "Account created!";	
	}else{
		header( "refresh:3; url=http://localhost/register.php" ); 
		die("Sorry that username is already in use");
		}
}else{
	header( "refresh:3; url=http://localhost/register.php" );
	die("Please enter a username and password");
	}
?>
<META HTTP-EQUIV="refresh" CONTENT="3;URL=http://localhost/index.php">
</html>
