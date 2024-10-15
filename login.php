<?php
@include 'book_form.php';
session_start();


if(isset($_POST['submit']) && isset($_POST['name']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['cpassword']) || isset($_POST['user_type'])){
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($connection, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['name'];
        header('location:adminpage.php');      
    
    }elseif($row['user_type'] == 'user'){
       
        $_SESSION['user_name'] = $row['name'];
        header('location:home.php');      
    }
       
    }else{
        $error[] = 'incorrect email or password!';
    }
};
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">JetSet Explore.</a>

   <nav class="navbar">
      <form class="d-flex">
        <!-- <button class="btn btn-outline-success mx-2">Signup</button>
        <button class="btn btn-outline-primary mx-2">Login</button>     new change -->
        <button class="btn btn-outline-danger mx-2">Logout</button>


      </form>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>
<div class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>
        <?php 
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };

        };

        ?>


        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="Login Now" class="form-btn">
        <p>Don't have an account? <a href="signup.php">signup now</a></p>

    </form>
    </div>












<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>


