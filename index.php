<?php
	session_start();
	if(filter_input(INPUT_POST, 'submit')){	
	
	$un = filter_input(INPUT_POST, 'un') 
		or die ('Username is not correct - Try again');
	
	$pw = filter_input(INPUT_POST, 'pw')
		or die ('password is not correct - Try again');
	
	
	
	
	require_once('db_con.php');
	
	$sql = 'SELECT id, pwhash FROM users WHERE username=?';
	
	$stmt = $con->prepare($sql);
			$stmt->bind_param('s', $un);
			$stmt->execute();
			$stmt->bind_result($uid, $pwhash);
	
	while($stmt->fetch()) {};
	
	if (password_verify($pw, $pwhash)){
		//echo 'You are logged in as ' .$un;
		$_SESSION['uid'] = $uid;
		$_SESSION['username'] = $un;
		header("location: contentpage.php"); #header sends the user, that has logged to the content page
		
	}
	
	else {
		echo 'Username or password incorrect. Please try again.';
		
	}
	
	#echo '<hr>';
	
}
	
?>	




<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">

<title>Login</title>
</head>




<body>


<h1>LOG IN</h1>
<h2>to feel the magic!</h2>
<p>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" name='login' id='login' >
   
        <div class="form">
        <input name="un" type="text" placeholder="Username" required/>
     
    	<input name="pw" type="password" placeholder="Password" required/>
      
    	<input name="submit" type="submit" value="Log in" />
    
   </div>     

	</form>
</p>	

<button type="button" class= "new_user"><a href="registrer.php">New User</a>
</button>
</body>
</html>