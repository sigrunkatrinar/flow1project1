<?php
		session_start();
			if(empty($_SESSION['uid'])){
			header("location: index.php"); /*User is not allowed to se the content page, without being logged
				in, vill be sent to the login page, if no uid is found*/
		}
		else {
			echo 'Welcome '.$_SESSION['username'].'<br>You are awsome!!.,';
			}
	
	?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">

<title>Content</title>
</head>

<body>
<div>
<img src="https://images.hellogiggles.com/uploads/2016/02/25062219/ezgif.com-optimize.gif" alt="Magic" style="width:304px;height:228px;">
</div>


<button class="logout"><a href="logout.php">Log out</a>
</button>
</body>
</html>