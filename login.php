<?php
session_start();

if (isset($_SESSION['id'])) { 
    header('Location: index.php');
    exit();
}

?>
<?php 
include_once 'views/heading.php'; 
	?>
<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-lg-4">
				<div class="row container d-flex align-items-center justify-content-center ps-4">
					<div class="col-12">
						<div class="text-center">
							<h2 class='text-nowrap'>Login</h2>
						</div>
					</div>
					<div class="col-12">
						<form class="shadow p-4" action="controller/login.php" method="post">
							<?php include_once 'views/flash_message.php' ?>
							<div class="form-group mt-2">
								<label class="form-label">Email</label>
								<input id="email" class="form-control" name="email" value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>" autofocus autocomplete="on">
							</div>
							<div class="form-group mt-2">
								<label class="form-label">Password</label>
								<input id="password" type="password" class="form-control" name="password" autocomplete="current-password">
							</div>
							<hr>
							<div class="form-group mt-4">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
						</form>
						<hr>
						<div class="d-flex align-items-center justify-content-center flex-column">
							<a href="signup.php" class="link-info">Already have an account?<span class='link-primary'> Sign Up </span></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-8 d-none d-lg-block">
				<img src="assets/images/login.svg" alt="Signup Image">
			</div>
		</div>
	</div>
	<?php include_once 'views/footer.php'?>
</body>
</html>
