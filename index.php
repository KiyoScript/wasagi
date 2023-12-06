<?php
  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include_once 'connection.php';
    include_once 'controller/user.php';

    $image = $user['image'] ? "{$user['image']}" : "assets/images/{$user['gender']}.svg";
    $users = getAllUsers($conn, $_SESSION['id']);

?>
<?php include_once 'views/heading.php'; ?>
<body>
  <?php include_once 'views/navbar.php';?>
		<div class="container p-4">
			<div class="row">
				<?php foreach ($users as $user): ?>
					<div class="card mb-4">
						<div class="card-body text-center d-flex flex-row align-items-center gap-4 justify-content-center">
							<img src="<?php echo $image; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
							<h5 class="my-3"><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
							<p class="text-muted mb-1"><?php echo $user['age']; ?></p>
							<p class="text-muted mb-1"><?php echo $user['address']; ?></p>
							<div class="d-flex justify-content-center mb-2">
								<a href="profile.php?id=<?php echo $user['id']; ?>" class="btn btn-primary ms-1">View Profile</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
  <?php include_once 'views/footer.php'; ?>
</body>
</html>

<?php
} else {
  header('Location: login.php');
  exit();
}
