
<?php
  session_start();
  include_once 'controller/user.php';
?>
<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <div class="container">
    <a class="navbar-brand text-light" href="#">
      Wasagi
    </a>
    <div class="navbar-links">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <span class="nav-link-text text-light">Home</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <?php
            $user = getUserById($_SESSION['id'], $conn);
            $image = $user['image'] ? "{$user['image']}" : "assets/images/{$user['gender']}.svg";
          ?>
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $image; ?>" class="rounded-circle border border-1" height="30" alt="image" loading="lazy">          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['id']; ?>">My profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
