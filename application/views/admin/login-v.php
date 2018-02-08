<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.css'); ?>" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<!-- css custom -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/custom.css'); ?>" type="text/css">
</head>
<body>
	<div class="container">
		<div class="login-box border border-info">
			<h1 class="text-center border border-top-0 border-left-0 border-right-0 border-secondary bts-bwh">LOGIN</h1>
			<form action="<?php echo base_url('index.php/login/proses_login/') ?>" method="post">
				<div class="form-group">
					<label for="exampleInputEmail1">NIPD / Nomor Stambuk</label>
					<input type="text" name="username" class="form-control form-control-lg border border-info" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NIM">
					<small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control form-control-lg border border-info" id="exampleInputPassword1" placeholder="Password">
					<small id="emailHelp" class="form-text text-muted">The Password must be more than 8 caracter</small>
				</div>
				<button type="submit" style="width:100%;" class="btn btn-info btn-lg">Submit</button>
			</form>
			<div class="row bts-ats">
				<div class="col">forgot password</div>
				<div class="col" style="text-align: right">Register Now</div>
			</div>
			<div class="text-center">
				<p class="text-secondary bts-ats">Copy Right <?php echo @$brand.' '.date('Y'); ?></p>
			</div>
		</div>
	</div>
</body>
</html>