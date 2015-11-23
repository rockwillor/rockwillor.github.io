<style>
body{
background: #5981cc; /* Old browsers */
background: -moz-linear-gradient(top,  #5981cc 0%, #3379d6 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#5981cc), color-stop(100%,#3379d6)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #5981cc 0%,#3379d6 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #5981cc 0%,#3379d6 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #5981cc 0%,#3379d6 100%); /* IE10+ */
background: linear-gradient(to bottom,  #5981cc 0%,#3379d6 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5981cc', endColorstr='#3379d6',GradientType=0 ); /* IE6-9 */
}
</style>

<html>
<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username&&$password)
{
	$connect = mysql_connect("localhost", "root", "") or die("couldn't connect to the database");
	mysql_select_db("signinsystem") or die("Couldn't connect to database");
	$query = mysql_query("SELECT * FROM user WHERE username='$username'");
	$numrows = mysql_num_rows($query);
	
	if($numrows!==0)
	{
	while($row = mysql_fetch_assoc($query))
	{
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
	}
		if($username==$dbusername&&$password==$dbpassword)
		{
		header( "refresh:3; url=http://localhost/home.php" );
		echo "You are logged in!";	
		$$_SESSION['username'] = $username;
		}
		else{
			header( "refresh:3; url=http://localhost/index.php" );
			echo "Your password is incorrect";
			}
	}
	else
		{
		header( "refresh:3; url=http://localhost/index.php" );
		die("That user does not exist");
		}
}
else
{
	header( "refresh:3; url=http://localhost/index.php" );
	die("Please enter a username and password");
}
?>
</html>