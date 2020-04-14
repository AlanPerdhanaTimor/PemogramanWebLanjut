<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/css/css1.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/js/js1.js') ?>" rel="stylesheet">
    
    <title>login</title>
</head>
<body>

<h2>WELCOME</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
	<?=
form_open('login/index');
?>
		<form action="" method="post">
			<h1>Sign in</h1>			
			<span>Your Account</span>
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="password" placeholder="Password"/>			
			<button value="Login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello</h1>
				<p>Welcome To Login Homepage</p>				
			</div>
		</div>
	</div>
</div>
<?=
form_close();
?>
<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer>
</body>
</html>