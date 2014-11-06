<html>
	
	<head>
		<meta charset ="utf-8">
	</head>
	
	<body>
		
		<?php
		
		$arr = array(
				"title" => "Javascript란?",
				"description" => "자바스크립트 블라블"
				);
				
			echo $arr["title"];
			
			echo "<ul>";
			
			for($i=0; $i < count($arr); $i++){
				echo "<li><a>1</a></li>";
			}
			
			
		?>
	
	</body>
</html>