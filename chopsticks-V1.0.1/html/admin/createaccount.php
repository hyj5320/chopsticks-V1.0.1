<html>
	<head>
		<meta charset='utf-8'>
	</head>
	<body>
		
		
		<!--  중복되는 아이디 체크해야됨 -->
		<!-- empty data check needed -->
		
		
		<?php
			
			if( NULL == ($_POST["email"] && $_POST["password"] && $_POST["firstname"] && $_POST["lastname"] && $_POST["company"] && $_POST["phone"])) {
				echo "<script> 
					 alert('Input is invalid');
					 window.location.assign('http://ec2-54-64-141-135.ap-northeast-1.compute.amazonaws.com/user/createaccount.html'); 
					 </script>";	
			} else {
				include_once('config.php');
				
				$mysqli = new mysqli($DB['host'], $DB['id'], $DB['pw'], $DB['db']);
				
				if($mysqli->connect_errno){
					printf("Connect failed: %s\n", $mysqli->connect_error);
					exit();
							
				} 
				
				$query = "INSERT INTO user_info (email, password, firstname, lastname, company, phone) VALUES ('$_POST[email]', '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[company]', '$_POST[phone]')";
				
				if ($mysqli->query($query) == TRUE) {
				
				} else {
					echo "<script> 
					alert('ERROR : your email is already in use');
					window.location.assign('http://ec2-54-64-141-135.ap-northeast-1.compute.amazonaws.com/');
					</script>";
				}
				
				
				$query2 = "INSERT INTO user_loc (email, adress, city, zipcode, state) VALUES ('$_POST[email]', '$_POST[address]', '$_POST[city]', '$_POST[zipcode]', '$_POST[state]')";
	
				if ($mysqli->query($query2) == TRUE) {
				
				} else {
					echo "<script> 
					alert('ERROR : your email is already in use');
					window.location.assign('http://ec2-54-64-141-135.ap-northeast-1.compute.amazonaws.com/');
					</script>";
				}
				
				$mysqli->close();
				
				echo "<script> 
				alert('Scuessfully created');
				window.location.assign('http://ec2-54-64-141-135.ap-northeast-1.compute.amazonaws.com/');
				</script>";
				
				exit();
			}
		?>
		
	</body>
</html>