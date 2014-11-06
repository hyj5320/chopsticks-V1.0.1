<html>
	<head>
		<meta charset="utf-8">
		<style>
			body{
				color:red;
			}
		</style>
	</head>
	
	<body>
		<?php
		if($_GET["id"] == 1){
			echo "마느리믄라ㅡㅁㄴ;루;ㅁㄴㅇ룸누람느아리ㅡㅁㅇ나ㅣ릐ㅏㅁㄴ으리ㅏ믤음ㅇ";
		} else if($_GET["id"]==2){
			echo " akdmflkamflamsdflkmaslkfmlaksmflkasdmlfkmasdlkfmlaksdflasfff";
		} else if($_GET["id"]==3){
			echo "왓더";
		} else if($_GET["id"]==4){
			echo "동해물과 백두산이 마르고 닳도록";
		}   
			
		?>		
		
		
	  	<ul>
	  		<li><a href="./practice.php?id=1">1</a></li>
	  		<li><a href="./practice.php?id=2">2</a></li>
	  		<li><a href="./practice.php?id=3">3</a></li>
	  		<li><a href="./practice.php?id=4">4</a></li>
	  		<li><a href="./loop.php">5</a></li>
	  	</ul>
		
			

		
	</body>
</html>