<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: linear-gradient(247.58deg, #71A1CE 16.69%, rgba(217, 217, 217, 0) 86.88%);
	display: flex;
	
}
.form-control {
	min-height: 41px;
	background: #fff;
	box-shadow: none !important;
	border-color: #e3e3e3;
	
}
.form-control:focus {
	border-color: #70c5c0;
}
.form-control, .btn {
	border-radius: 10px;
}
.login-form {
	width: 350px;
	margin: 0 auto;
	padding: 100px 0 30px;
}
.login-form form {
	color: #7a7a7a;
	border-radius: 10px;
	margin-bottom: 15px;
	font-size: 13px;
	background: #ececec;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
	position: relative;
}
.login-form h2 {
	font-size: 22px;
	margin: 35px 0 25px;
	color: #000000;
}
.login-form .avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -50px;
	width: 100px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #5ECFCA;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar img {
	width: 100%;
}

.login-form .btn, .login-form .btn:active {
	font-size: 16px;
	font-weight: bold;
	background: #70c5c0 !important;
	border: none;
	margin-bottom: 20px;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #50b8b3 !important;
}

.login-form .bottom-action {
	font-size: 14px;
}
</style>
</head>
<body>
	
		<div class="login-form">
			<?php if(session()->getFlashdata('msg')):?>
    		<div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    		<?php endif;?>
    		<form action="/login/auth" method="post">
				<div class="avatar">
					<img src="https://svgshare.com/i/nvs.svg" alt="Avatar">
				</div>
        		<h2 class="text-center">Masuk</h2>
        		<div class="form-group">
        			<input type="text" class="form-control" name="email" placeholder="Email" id="form-group" value="<?= set_value('email') ?>">
        		</div>
				<div class="form-group">
            		<input type="password" class="form-control" name="password" placeholder="Password" id="form-group">
        		</div>
        		<div class="form-group">
            		<button type="submit" class="btn btn-primary btn-lg btn-block">Masuk Sekarang</button>
        		</div>
			</form>
		</div>
</body>
</html>