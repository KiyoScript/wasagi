<?php if(isset($_GET['error'])){ ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $_GET['error']; ?>
  </div>
<?php } ?>
<?php if(isset($_GET['success'])){ ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_GET['success']; ?>
  </div>
<?php } ?>
