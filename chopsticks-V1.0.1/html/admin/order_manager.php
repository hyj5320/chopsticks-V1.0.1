<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>주문 관리 </title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Loading Bootsrap -->
	    <link href="../dist/css/vendor/bootstrap.min.css" rel="stylesheet">

	    <!-- Loading Flat UI -->
	    <link href="../dist/css/flat-ui-pro.css" rel="stylesheet">

	    <link rel="shortcut icon" href="../dist/img/favicon.ico">

		<style>
			/* teset purpose
			div {
				border: 1px solid red;
			}
			*/

			.navbar {
				padding-top:30px;
				padding-bottom:30px;
			}
		</style>
		
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-lg" role="navigation">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
		            <span class="sr-only">Toggle navigation</span>
		          </button>
		          <a class="navbar-brand" href="order_manager.php">Chopsticks.Co</a>  
		          
		        </div>

		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="navbar-collapse collapse" id="navbar-collapse-2">
		          <ul class="nav navbar-nav">
					<li><a href="user/products.html">주문관리</a></li>
					<li><a href="user/order.php">상품관리</a></li>
					<li><a href="user/shippingstatus.html">계정관리</a></li>
		           </ul>
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="./logout.php">로그아웃</a></li>       
		          </ul>
		        </div><!-- /.navbar-collapse -->
	     	</nav>
		<!-- actual contents 주문관리 테이블 로드  -->
			<div class="row">
				<div class="col-sm-1"></div>

				<div class="col-sm-5">
					<img src="img_src/image_02.jpg" class="img-responsive" alt="Responsive img">	
				</div>

				<div class="col-sm-5">
					<h6>Welcome to Chopsticks.Co</h6>

						<p>Chopsticks.Co is chopstick manufacturer who ploudly provide chopsticks for local food businesses with their own logo. </p>  

						<h6>History</h6>

						<p> Chopsticks.Co started since 1996 and located at Federal Way, WA </p>

				</div>

				<div class="col-sm-1"></div>
			</div>

		</div>	
		

		<!-- footer -->
		<footer>  </footer>
	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="dist/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/flat-ui-pro.min.js"></script>				
	</body>
</html>