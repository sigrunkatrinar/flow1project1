<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">

<title>Register</title>
</head>

<body>
<h1>Join us!</h1>
<h2>Create account</h2>




<?php
	
	
if(filter_input(INPUT_POST, 'submit')){	
	
	$un = filter_input(INPUT_POST, 'un') 
		or die ('Username is not correct - Try again'); /*die = Print a message and exit the current script*/
	
	$pw = filter_input(INPUT_POST, 'pw')
		or die ('Password is not correct - Try again');
	
	$pw = password_hash($pw, PASSWORD_DEFAULT);
	
	echo 'Register: <br>' .$un. ' : ' .$pw;
	
	
	
	require_once('db_con.php');
	
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?, ?)';

	$stmt = $con->prepare($sql);
			$stmt->bind_param('ss', $un, $pw);
			$stmt->execute();
		
	
	if($stmt->affected_rows > 0){
		echo '<h1><br>User ' .$un. ' is now registered!</h1>';
	}
	
		else {
			
		echo 'Could not register - Maybe the user already exists?';
	}
			
}	
		
?>
	
<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

    <div class="form">
    	<input name="un" type="text" placeholder="Username" required/>
    	<input name="pw" type="password" required placeholder="Password"/>
    	<input name="submit" type="submit" value="Register" />

    </div>
</form>
</p>	
	
<button class="back"><a href="index.php">Back</a>
</button>

	

</body>
</html>