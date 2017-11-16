<nav class="navbar navbar-fixed-top navbar-light" role="navigation" >
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"><img src="resources/pens.png" width="33" height="auto" alt="" style="background-color: white;"></a>
	      <a class="navbar-brand" href="#" style="color: white;"> Open Source Community </a>
	    </div>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <p class="navbar-text navbar-text-center"><?php echo $nav_text ?></p>
	      <ul class="nav navbar-nav navbar-right">
	          <?php 
	          	if ($userId == '') {
	          		echo "<li>
	          				<a href='login.php' class='login-text'>Login</a>
	          			  </li>";
	          	} else {
	          		echo "<li class='dropdown'>
	          				<a href='#'' class='dropdown-toggle' data-toggle='dropdown'>Welcome $userId <span class='glyphicon glyphicon-user'></span></a>
	          				<ul id='login-dp' class='dropdown-menu'>
	          					<li>
	          						<div class='row'>
	          							<div class='col-md-12'>
	          								<div class='form-group' style='padding-bottom: 50px;'>
	          									<div class='col-md-6'>
	          										<form action='userdetails.php'>
	          											<button type='submit' class='btn btn-primary btn-block'>Profil</button>
	          										</form>
	          									</div>
	          									<div class='col-md-6'>
	          										<form action='logout.php'>
	          											<button type='submit' class='btn btn-primary btn-block'>Logout</button>
	          										</form>
	          									</div>
	          								</div>
	          							</div>
	          						</div>
	          					</li>
	          				</ul>
	          			</li>";
	          	}
	          ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>