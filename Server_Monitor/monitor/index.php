<html>
<title>Servers Monitor System</title>
<body bgcolor="#FAEBD7">
<center>
<br/><br/>
<br/><br/>
<font size="8" color="#000000">Servers Monitor System</font>
<br/><br/>
<p>Developed by: Yongkai Wang</p>
<br/><br/>
<b><p>Enter the system</p></b>

<?php
if(isset($_POST['Username']))  { 
	$Username= $_POST['Username']; 

if(isset($_POST['Password']))  { 
	$Password= $_POST['Password']; 	

	// connect to mongodb
	$mongo = new MongoClient("mongodb://localhost");

    // choose the database and collection
    $db = $mongo->test;
    $coll = $db->admin;
    
    // get the user with input
	$userFound = $coll->findOne(array('username' => $Username));

	// check the password
	if( $userFound != null && $userFound[password] == "$Password"){
		
		// if correct, redirect to next page
		echo '<script> window.location="ServerSearch.php"</script>';
	}else{
		echo "Your username or password is wrong";
	}
}}
?>

<!-- log in the system -->
<form action="" method="post">
Username:
<input name="Username" size="15" maxlength="15">
<br/>
Password:
<input name="Password" size="15" maxlength="15">
<br/>

<br/>
<input type="submit" value="Submit" name="Submit">
</form>

</font>
</center>
</body>
</html>