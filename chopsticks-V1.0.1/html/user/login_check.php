<html>
	<head>
		<meta charset='utf-8'>
	</head>
	<body>
		
		<?php
			/*
			 * work flow
			 * 
			 * 1. 아이디 비밀번호 검사
			 * 2. 있으면 session start and save data -> index.loggedin
			 * 3. 없으면 잘못됬습니다 -> index.login.html
			 * 
			 */
			 
			 /*
			  * 
			  * 
			if( NULL == ( $_POST["email"] || $_POST["password"] ) ) {
				echo "<script> 
					 alert('Input is invalid');
					 window.location.assign('./login.html'); 
					 </script>";	
			}
			  * 
			  * 
			  */
			include_once('config.php');
					
			$mysqli = new mysqli($DB['host'], $DB['id'], $DB['pw'], $DB['db']);
			
			if($mysqli->connect_errno){
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();		
			} 
			
			
			
			$id = $_POST['email'];
			$query = "SELECT password FROM user_info WHERE email = '$id';";
			
			//Fetch sql result into php language
			$result = $mysqli->query($query);
			//Fetch array causes this double printing error
			$row = mysqli_fetch_array($result);
			
			if($row['password'] == $_POST['password'] && $_POST['password']) {
					
				//starts session here
				
				echo "<script>
				      	alert('Successfully logged In');
				      	window.location.assign('../index_loggedIn.html');
					  </script>
				";
			} else {
				echo "<script>
				      	alert('Incorrect ID or Password');
				      	window.location.assign('./login.html');
					  </script>
				";
			}
			
			exit();
		?>
		
	</body>
</html>