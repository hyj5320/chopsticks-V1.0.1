<html>
	<head>
		<meta charset='utf-8'>
	</head>
	<body>
		
		<?php

			include_once('config.php');
			
			$mysqli = mysqli_connect("localhost", "root", "", "chopstick_user");
			
			if(mysqli_connect_error()){
				exit('Connect Error ('.mysqli_connect_errno().')'. mysqli_connect_error());
			} 

			extract($_POST);

			$sql = "INSERT INTO user (email, password) VALUES ('$user_email', '$user_pass')";


			if (!mysqli_query($mysqli,$sql)) {
			  die('Error: ' . mysqli_error($con));
			}
			
			echo '이메일 : '.$user_email.'<br>'; 
			echo '비밀번호 : '.$user_pass.'<br> 저장';

			mysqli_close($mysqli);
		?>

	</body>
</html>