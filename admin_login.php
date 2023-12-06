<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: admin_dashboard.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form admin_login">
      <header>Admin Login</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Dashboard">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="admin_index.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="admin-javascript/pass-show-hide.js"></script>
  <script src="admin-javascript/login.js"></script>

</body>
</html>
