<html>
	
	<head>
	
		<meta charset="utf-8"/>
		<title>Chopsticks.co</title>
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
			.row{
				padding-top:20px;
			}
			 
            .input-group{
                padding-bottom:3px;
            }

		</style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="../../dist/js/vendor/html5shiv.js"></script>
      <script src="../../dist/js/vendor/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>
		<div class="container">
			<nav class="navbar navbar-lg" role="navigation">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
		            <span class="sr-only">Toggle navigation</span>
		          </button>
		          <a class="navbar-brand" href="../index.html">Chopsticks.Co</a>
		        </div>

		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="navbar-collapse collapse" id="navbar-collapse-2">
		          <ul class="nav navbar-nav">
					<li><a href="products.html">Products</a></li>
					<li><a href="order.php">Order</a></li>
					<li><a href="shippingstatus.html">Shipping status</a></li>
					<li><a href="contactus.html">Contact us</a></li>
		           </ul>
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="login.html">Log in</a></li>
		            <li><a href="createaccount.html">Create account</a></li>       
		          </ul>
		        </div><!-- /.navbar-collapse -->
	     	</nav>
		<!-- actual contents -->
			<div class="row">
				<div class="col-sm-4"></div>

				<div class="col-sm-4">
					<div class="formDiv">
					  	
						<form name="signup_form" method="post" action="order_confirm.php" >
	                        <div class="input-group">
	                            <span class="input-group-addon">Type</span>
	                            <select name="carlist" form="carform" class="form-control">
									  <option value="1"
									  >9-inch bamboo chopsticks (tensoge) - $69.99</option>
									  
									  <?php
									  if($_GET["product"] == 4){echo "<option value='2' selected>";} 
									  else{echo "<option value='2'>";}
									  ?>
									  8-inch bamboo chopsticks(tensoge) - $59.99</option>
									  <?php
									  if($_GET["product"] == 6){echo "<option value='3' selected>";} 
									  else{echo "<option value='3'>";}
									  ?>
									  9-inch pine wood chopsticks - $110</option>
									  <?php
									  if($_GET["product"] == 2){echo "<option value='4' selected>";} 
									  else{echo "<option value='4'>";}
									  ?>
									  9-inch bamboo chopsticks(twin) - $69.99</option>
									  <?php
									  if($_GET["product"] == 5){echo "<option value='5' selected>";} 
									  else{echo "<option value='5'>";}
									  ?>
	  								  8-inch bamboo chopsticks(twin) - $59.99</option>
									  <?php
									  if($_GET["product"] == 7){echo "<option value='6' selected>";} 
									  else{echo "<option value='6'>";}
									  ?>
									  8-inch pine wood chopsticks - $95</option>
									  <?php
									  if($_GET["product"] == 3){echo "<option value='7' selected>";} 
									  else{echo "<option value='7'>";}
									  ?>
									  8-inch poplar wood chopsticks - $78</option>
	
								</select>
	                        </div>
	                        <div class="input-group">
	                            <span class="input-group-addon"> Quantity</span>
	                            <input type="text" class="form-control" placeholder="boxes" style="width:250px;" 
	                            <?php
	                            echo "value='$_POST[quantity]'";
	                            ?>
	                            >
	                        </div>
	                        
	                        <!-- Expect delivery date -->
	                        <div class="input-group">
	                            <span class="input-group-addon"> Date</span>
	                            <input type="text" class="form-control" style="width:250px;">
	                        </div>
	                   		
	                       <div class="input-group">
	                            <span class="input-group-addon">Location</span>
	                            <select name="carlist" form="carform" class="form-control" style="width:250px;">
									  
									  <!-- location 수만큼 늘어나야됨 -->
									  <option value="loc1" style="width:250px;">Loc1</option >
			
								</select>
								
							</div>
							<p>You can contact us at 847-414-3012 <br>
							for more than 20 box order</p> 
	                        <input type="submit" class="btn btn-default" style="float:right" value="Summit">
	
		                </form> 
					</div>
				</div>	

			</div>
		</div>
		
		<!-- footer -->
		<footer>  </footer>
	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../dist/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dist/js/flat-ui-pro.min.js"></script>

			
	</body>
</html>
