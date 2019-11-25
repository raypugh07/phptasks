<html>
	<head>
		<title>php troubleshoot</title>
	</head>
	<body>
		<h2>Registration Page</h2>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="register.php" method='post'>
			Enter Username: <input type="text" name="username" required="required"></input> <br/><br/>
			Enter Password: <input type="password" name="password" required="required"> </input><br/>
            Enter First Name: <input type="text" name="user_firstname" required="required"> </input><br/>
            Enter Last Name: <input type="text" name="user_surname" required="required"> </input><br/>
            Enter Email: <input type="text" name="user_email" required="required"> </input><br/>
			<input type="submit" name='submit' value="Register"/>
		</form>
	</body>
</html>
 
 
<?php  // fix to data being sent blank...not much information online due to mysql no longer working for php 7 must convert to sqli
if(isset($_POST['submit']) )
{
    require_once('database.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_surname'];
    $email = $_POST['user_email'];

    
    $mysqli = mysqli_connect("localhost", "root", ""); //connects to server
    mysqli_select_db($mysqli,"todo"); //connects to database
    $order = "INSERT INTO users (user_login,user_password,user_firstname,user_surname,user_email ) VALUES ('$username', PASSWORD('$password'),'$firstname','$lastname','$email' )"; //inserts into table
    $result = mysqli_query($mysqli,$order);
    if ($result) {
        echo "<p>Success</p>";
    } else {
        echo "<p>Failed</p>";
    }
}
else
{
    echo "<p>Failed</p>";
}
?>