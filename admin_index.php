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
        
</body>
</html>
