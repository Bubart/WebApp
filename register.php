<html>
	<link rel='stylesheet' href='css/bootstrap.css'/>
	<link rel='stylesheet' href='css/index.css'/>
	<script src='js/jquery.min.js'></script>
	<script src='js/index.js'></script>
	<head>
		<title>Register</title>
	</head>
	<body>
		<div class='menubg'>
			<div class='container-fluid'>
				<div class='loginform'>
					<h1 class='logintitle text-center'>REGISTER</h1>
					<div class='formproper'>
						<form method='POST' action='insert.php'>
							<div class='form-group formrow row'>
								<label class='h3 text-left col-form-label col-md-11 col-md-offset-1'>Username</label>
								<div class='col-md-10 col-md-offset-1'>
									<input name='user' type='text' class='form-control' required>
								</div>
							</div>
							<div class='form-group formrow row'>
								<label class='h3 text-left col-form-label col-md-11 col-md-offset-1'>Password</label>
								<div class='col-md-10 col-md-offset-1'>
									<input name='pass' type='password' class='form-control' required>
								</div>
							</div>
							<div class='form-group formrow row'>
								<label class='h3 text-left col-form-label col-md-11 col-md-offset-1'>Confirm Password</label>
								<div class='col-md-10 col-md-offset-1'>
									<input name='conpass' type='password' class='form-control' required>
								</div>
							</div>
							<div class='row forbut'>
								<a href='register.php'>
									<button id='reg' type='button' class='btn-lg but2 col-md-10 col-md-offset-1 btn btn-default'>Register</button>
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>