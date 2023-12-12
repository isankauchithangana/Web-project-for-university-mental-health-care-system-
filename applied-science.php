<?php 
  session_start();
  include_once "admin_php/config.php";
  include_once "functions.php"; // Include the functions
  if(!isset($_SESSION['unique_id'])){
    header("location: admin_dashboard.html");
  }
?>
<?php include_once "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <link rel="stylesheet" href="style2.css">
   
   <link rel="stylesheet" href="admin_dashboard.css">
    
   
  <!-- Add any additional CSS or scripts here -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
</head>


<body>
    
    
    <div class="wrapper">
      
    <!-- Left Sidebar -->
    <aside class="left-sidebar">
        <div class="h-100" data-simplebar>
      <!-- Logo -->
      <div class="logo">
        <img src="assets\images\logo1.png" alt="Logo" style="display: block; margin: 0 auto;">
      </div>
            
    
            
         <div class="content">
                      <?php 
            $sql = mysqli_query($conn, "SELECT * FROM adminusers WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
                  
             
             // Check if the image exists in the database or set a default image path
                $imgSrc = "admin_php/images/";
                if (!empty($row['img']) && file_exists($imgSrc . $row['img'])) {
                  $imgSrc .= $row['img'];
                } else {
                  $imgSrc = "admin_php/images/24.png"; // Set the default image path if the user image is not available or doesn't exist
                }

             
          ?>
              <img src="<?php echo $imgSrc; ?>" alt="User Profile" style="display: block; margin: 0 auto;" width="80" height="80">
          <div class="details">
             
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
             
            <p><?php echo $row['status']; ?></p>
                   <a href="admin_php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
          </div>
        </div>
           
            
            
        <div class="menu-item">
            <i class="fas fa-user-edit"></i>
            <span><a href="admin_profile.php">Update Profile</a></span>
        </div>
        <!-- Dashboard -->
        <div class="menu-item">
            <i class="fas fa-chart-line"></i>
            <span><a href="admin_dashboard.php">Dashboard</a></span>
        </div>            
            
      <!-- Calendar -->
      <div class="menu-item">
        <i class="fas fa-calendar"></i>
        <span>Calendar</span>
      </div>
      <!-- Chat -->
      <div class="menu-item">
        <i class="fas fa-comments"></i>
        <span>Chat</span>
      </div>
      <!-- Email -->
      <div class="menu-item">
        <i class="fas fa-envelope"></i>
        <span>Email</span>
      </div>
            
         <!-- Update Profile -->

            
      <!-- Add more menu items here -->
        </div> 
    </aside>
     
 </div>  
    

  <section class="users">
    <h1 class="form-title">Faculty of Applied Sciences</h1>
    <div class="admin-dashboard">
      <!-- Calendar Card -->
    <div class="dashboard-count col-md-2 col-sm-4 col-xs-6">
      <div class="dashboard-box">
        <i class="fa fa-users"></i>
        <div class="dashboard-number">
          <p class="count"><?php echo getmrtCount(); ?></p>
          <p class="dashboard-section">Students</p>
          <h4 class="faculty-name">MRT</h4><br>
        </div>
      </div>
      <a href="mrt.php" class="btn btn-primary">Access</a>
    </div>
     

      <!-- Mentors Card -->
        <div class="dashboard-count col-md-2 col-sm-4 col-xs-6">
      <div class="dashboard-box">
        <i class="fa fa-users"></i>
        <div class="dashboard-number">
          <p class="count"><?php echo getcstCount(); ?></p>
          <p class="dashboard-section">Students</p>
          <h4 class="faculty-name">CST</h4><br>
        </div>
      </div>
      <a href="cst.php" class="btn btn-primary">Access</a>
    </div>
      

      <!-- Chat Card -->
    <div class="dashboard-count col-md-2 col-sm-4 col-xs-6">
      <div class="dashboard-box">
        <i class="fa fa-users"></i>
        <div class="dashboard-number">
          <p class="count"><?php echo getiitCount(); ?></p>
          <p class="dashboard-section">Students</p>
          <h4 class="faculty-name">IIT</h4><br>
        </div>
      </div>
      <a href="iit.php" class="btn btn-primary">Access</a>
    </div>

      <!-- Chat Card -->
    <div class="dashboard-count col-md-2 col-sm-4 col-xs-6">
      <div class="dashboard-box">
        <i class="fa fa-users"></i>
        <div class="dashboard-number">
          <p class="count"><?php echo getsctCount(); ?></p>
          <p class="dashboard-section">Students</p>
          <h4 class="faculty-name">SCT</h4><br>
        </div>
      </div>
      <a href="sct.php" class="btn btn-primary">Access</a>
    </div>
              <!-- Mind Relaxing Card -->

      <!-- Add more cards here -->
    </div>
  </section>



  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdn.bootcss.com/waypoints/4.0.0/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script>
  $(document).ready(function() {
    // Initialize Counter-Up
    $('.count').counterUp({
      delay: 10,
      time: 1000
    });

    // Count animation
    $('.count').each(function () {
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });
    });
  });
</script>

</body>
</html>
