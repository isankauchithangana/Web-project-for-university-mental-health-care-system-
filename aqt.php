<?php 
  session_start();
  include_once "admin_php/config.php";
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
  <link rel="stylesheet" href="degree-table.css">
   
  <!-- Add any additional CSS or scripts here -->
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
    
    

  <section class="medicalform">
    <h1 class="form-title">Students with AQT Degree Programme</h1>
    <div class="formbg">
      <div class="student-table">
       
        <table>
          <tr>
            <th>Registration Number</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          <?php
            $sql = "SELECT * FROM studentprofile WHERE degree_program = 'AQT'";
            $result = mysqli_query($conn, $sql);
            
            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['reg_number']}</td>";
                echo "<td>{$row['name_with_initials']}</td>";
                echo "<td><a href='delete_user.php?user_id={$row['user_id']}' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='4'>No students found.</td></tr>";
            }
          ?>
        </table>
      </div>
    </div>
  </section>



  <script src="javascript/users.js"></script>

</body>
</html>
