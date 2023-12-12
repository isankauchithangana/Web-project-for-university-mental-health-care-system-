<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: admin_dashboard.php");
  }
?>

<?php include_once "header.php"; ?>
<html>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Admin SingnUp</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="admin_login.php">Login now</a></div>
    </section>
  </div>

  <script src="admin-javascript/pass-show-hide.js"></script>
  <script src="admin-javascript/signup.js"></script>

</body>
</html>
