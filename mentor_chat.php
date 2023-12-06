<?php 
  session_start();
  include_once "mentor_php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: mentor_login.php");
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
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
                  
             
             // Check if the image exists in the database or set a default image path
                $imgSrc = "student_php/images/";
                if (!empty($row['img']) && file_exists($imgSrc . $row['img'])) {
                  $imgSrc .= $row['img'];
                } else {
                  $imgSrc = "student_php/images/24.png"; // Set the default image path if the user image is not available or doesn't exist
                }

             
          ?>
              <img src="<?php echo $imgSrc; ?>" alt="User Profile" style="display: block; margin: 0 auto;" width="80" height="80">
          <div class="details">
             
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
             
            <p><?php echo $row['status']; ?></p>
                   <a href="mentor_php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
          </div>
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
      <!-- Add more menu items here -->

    </aside>
    </div>  
 </div>  
    

    <div class="wrapper">
    

    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM mentorusers WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: student_users.php");
          }
          
   // Check if the image exists in the database or set a default image path
            $imgSrc = "mentor_php/images/" . $row['img'];
            if (!file_exists($imgSrc)) {
              $imgSrc = "mentor_php/images/24.png"; // Set the default image path if the user image is not available or doesn't exist
            }
          
        ?>
        <a href="student_users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="<?php echo $imgSrc; ?>" alt="User Profile">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="mentor-javascript/chat.js"></script>

</body>
</html>
