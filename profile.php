<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
	include_once 'connection.php';
	include_once 'controller/user.php';
?>
	<?php include_once 'views/heading.php'; ?>
	<?php include_once 'controller/user.php'; ?>
	<body>
		<?php include_once 'views/navbar.php'; ?>
		<?php
		$user = getUserById($_GET['id'], $conn);
		$image = $user['image'] ? "{$user['image']}" : "assets/images/{$user['gender']}.svg";
		?>
		<div class="container mt-4">
			<section class="p-4">
				<div class="row">
					<div class="col-lg-4">
						<div class="card mb-4">
							<div class="card-body text-center">
								<img src="<?php echo $image ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
								<h5 class="my-3"><?php echo $user['firstname'] . " " . $user['lastname'] ?></h5>
								<p class="text-muted mb-1"><?php echo $user['age'] ?></p>
								<p class="text-muted mb-4"><?php echo $user['address'] ?></p>
								<div class="d-flex justify-content-center mb-2">
									
									<?php
									if ($_SESSION['id'] == $user['id']) {
										echo '<a href="edit.php?id=' . $user['id'] . '" class="btn btn-primary">Edit</a>';
										echo '<form method="post" class="ms-1">';
										echo '<button type="submit" name="delete" class="btn btn-danger">Delete</button>';
										echo '</form>';
									}
									
									if ($_SESSION['id'] == $user['id'] && $_SERVER['REQUEST_METHOD'] == 'POST') {
										if (isset($_POST['delete'])) {
											echo '<script>
													var confirmDelete = confirm("Are you sure you want to delete you account?");
													if (confirmDelete) {
														window.location.href = "controller/delete.php?id=' . $user['id'] . '";
													}
													</script>';
										} elseif (isset($_POST['edit'])) {
											header("Location: edit.php?id=" . $user['id']);
											exit();
										}
									}
									?>

								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Full Name</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $user['firstname'] . " " . $user['middlename'] . " " . $user['lastname'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Gender</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $user['gender'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Email</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $user['email'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Mobile</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $user['mobile_number'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Address</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $user['address'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Birthdate</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo date('F j, Y', strtotime($user['birthdate'])); ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card mb-4 mb-md-0">
									<div class="card-body">
										<p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
										</p>
										<p class="mb-1" style="font-size: .77rem;">Web Design</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
										<div class="progress rounded mb-2" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card mb-4 mb-md-0">
									<div class="card-body">
										<p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
										</p>
										<p class="mb-1" style="font-size: .77rem;">Web Design</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
										<div class="progress rounded" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
										<div class="progress rounded mb-2" style="height: 5px;">
											<div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		</section>
		</div>
		<?php include_once 'views/footer.php'; ?>
	</body>
	</html>
<?php } else {
	header('Location: login.php');
	exit();
}
