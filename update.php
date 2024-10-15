<?php
// require_once("book_form.php");
// new change
$connection = mysqli_connect('localhost','root','','book_db');
$id=$_GET['updateid'];
$sql="SELECT * FROM book_form WHERE id = $id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result);
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];
$location =$row['location'];
$guests = $row['guests'];
$arrivals = $row['arrivals'];
$leaving = $row['leaving'];


if(isset($_POST['send'])){
    //$id=$_GET['updateid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    $request="UPDATE book_form " .  
    "SET name = '$name', email = '$email', phone = '$phone', address = '$address',location = '$location', guests = '$guests', arrivals = '$arrivals', leaving = '$leaving' " .  
    "WHERE id = $id";

    $result1=mysqli_query($connection,$request);

    if($result1){
        header('location:adminpage.php');
    }else{
        die(mysqli_error($connection));
    }   
   
    // print_r($connection);
    // header('location:book.php'); 

 }

?> 



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style_admin.css">
   <link href=
"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
          rel="stylesheet">

          <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- from book.php -->
<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">


</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">JetSet Explore.</a>

   <!-- <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>
      <a href="login.php">Login</a>
   </nav> -->

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<section class="booking">

   <h1 class="heading-title">Make Updates in the trip!</h1>

   <form method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name" value=<?php echo $name;?>>
         </div>
         <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="enter your email" name="email" value=<?php echo $email;?>>
         </div>
         <div class="inputBox">
            <span>phone :</span>
            <input type="number" placeholder="enter your number" name="phone" value=<?php echo $phone;?>>
         </div>
         <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="enter your address" name="address" value=<?php echo $address;?>>
         </div>
         <div class="inputBox">
            <span>where to :</span>
            <input type="text" placeholder="place you want to visit" name="location" value=<?php echo $location;?>>
         </div>
         <div class="inputBox">
            <span>how many :</span>
            <input type="number" placeholder="number of guests" name="guests" value=<?php echo $guests;?>>
         </div>
         <div class="inputBox">
            <span>arrivals :</span>
            <input type="date" name="arrivals" value=<?php echo $arrivals;?>>
         </div>
         <div class="inputBox">
            <span>leaving :</span>
            <input type="date" name="leaving" value=<?php echo $leaving;?>>
         </div>
      </div>

      <input type="submit" value="Update" class="btn" name="send">

   </form>

</section>

















</body>


</html>