
<?php
	session_start();
	if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
		include_once 'connection.php';
		include_once 'controller/user.php';

		$user = getUserById($_GET['id'], $conn);
		$image = $user['image'] ? "upload/{$user['image']}" : "assets/images/{$user['gender']}.svg";
    $birthYear = date('Y', strtotime($user['birthdate']));
    $defaultDate = date('Y-m-d', strtotime('-'.$user['age'].' years', strtotime($birthYear.'-01-01')));
?>
<?php include_once 'views/heading.php'?>
<body>
  <?php include_once 'views/navbar.php';?>
  <div class="container mt-4">
    <section class="p-4">
      <form class="" action="controller/update.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="<?php echo $image ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"><br>
              <label class="form-label">Profile Picture</label>
              <input type="file" class="form-control" name="image">
              <input type="text" hidden="hidden" name="old_image" value="<?=$user['image']?>" >
              <h5 class="my-3"><?php echo $user['firstname']." ".$user['lastname'] ?></h5>
              <p class="text-muted mb-1"><?php echo $user['age']?></p>
              <p class="text-muted mb-4"><?php echo $user['address']?></p>
              <?php include_once "views/flash_message.php" ?>
            </div>
          </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body p-4">
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Email</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" value="<?php echo $user['email']?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">First name</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Middle name</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="middlename" value="<?php echo $user['middlename']?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Last name</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Birthdate</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="birthdate" value="<?php echo $defaultDate ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Age</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="age" value="<?php echo $user['age']?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Gender</label>
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" name="gender">
                        <?php
                            $genderOptions = ['male', 'female'];
                            $defaultValue = $user['gender'];
                            foreach ($genderOptions as $option) {
                                $selected = ($option === $defaultValue) ? 'selected' : '';
                                echo "<option value='$option' $selected>$option</option>";
                            }
                        ?>
                    </select>
                </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <label class="form-label">Address</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" value="<?php echo $user['address']?>">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="index.php" class="btn btn-warning mt-2">Cancel</a>

            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>
