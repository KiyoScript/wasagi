<?php include_once 'views/heading.php'; ?>
<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="row justify-content-center align-items-center">
			<div class="col-12 col-lg-8 d-none d-lg-block">
				<img src="assets/images/signup.svg" alt="Signup Image">
			</div>
			<div class="col-12 col-lg-4">
				<div class="row container d-flex align-items-center justify-content-center ps-4">
					<div class="col-12">
						<div class="text-center">
							<h2 class='text-nowrap'>Create an Account!</h2>
						</div>
					</div>
					<div class="col-12">
						<form class="shadow p-4" action="controller/signup.php" method="post" enctype="multipart/form-data">
							<?php include_once 'views/flash_message.php' ?>
							<div class="form-group mt-2">
								<label class="form-label">Email</label>
								<input type="email" class="form-control" name="email" value="<?php echo (isset($_GET['email']))?$_GET['email']:"" ?>">
							</div>
							<div class="form-group mt-2">
								<label class="form-label">Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<hr>
							<div class="accordion" id="additional_information">
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
											Additional Information
										</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#additional_information">
										<div class="accordion-body">
											<div class="form-group mt-2">
												<label class="form-label">First name</label>
												<input type="text" class="form-control" name="firstname" value="<?php echo (isset($_GET['firstname']))?$_GET['firstname']:"" ?>">
											</div>
											<div class="form-group mt-2">
												<label class="form-label">Middle name</label>
												<input type="text" class="form-control" name="middlename" value="<?php echo (isset($_GET['middlename']))?$_GET['middlename']:"" ?>">
											</div>
											<div class="form-group mt-2">
												<label class="form-label">Last name</label>
												<input type="text" class="form-control" name="middlename" value="<?php echo (isset($_GET['lastname']))?$_GET['lastname']:"" ?>">
											</div>
											<div class="form-group mt-2">
												<label class="form-label">Birthdate</label>
												<input type="date" class="form-control" name="birthdate" value="<?php echo (isset($_GET['birthdate']))?$_GET['birthdate']:"" ?>">
											</div>
											<div class="form-group mt-2">
												<label class="form-label">Age</label>
												<input type="number" class="form-control" name="age" value="<?php echo (isset($_GET['age']))?$_GET['age']:"" ?>">
											</div>
											<div class="form-group mt-2">
												<label class="form-label">Address</label>
												<input type="text" class="form-control" name="address" value="<?php echo (isset($_GET['address']))?$_GET['address']:"" ?>">
											</div>
											<div class="form-group mt-2">
												<label class="form-label">Mobile number</label>
												<input type="number" class="form-control" name="mobile_number" value="<?php echo (isset($_GET['mobile_number']))?$_GET['mobile_number']:"" ?>">
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group mt-4">
								<button type="submit" class="btn btn-primary">Sign Up</button>
							</div>
						</form>
						<hr>
						<div class="d-flex align-items-center justify-content-center flex-column">
							<a href="login.php" class="link-info">Already have an account?<span class='link-primary'> Login </span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once 'views/footer.php'?>
</body>
</html>
