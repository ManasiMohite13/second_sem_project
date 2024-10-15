<?php
require_once('book_form.php');
$query = "select * from user_form";
$result = mysqli_query($connection,$query);
$query1 = "select * from book_form";
$result1 = mysqli_query($connection,$query1);

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style_admin.css">
  
  <!-- 

     
     <style>
      .table-container { 
         display: flex; 
         justify-content: space-between; 
         margin: 20px; 
      } 
      
     
        .table { 
            border-collapse: collapse; 
            width: 45%; 
            margin-right: 10px; 
         } 
  
         th, 
         td { 
            border: 1px solid #ddd; 
            padding: 8px; 
            text-align: left; 
         } 
         
         th { 
            background-color: #f2f2f2; 
         } 
         /* for two table headers */
         h2{
            text-align: center;
            color: green;
         }
         /* admin panel heading */
         h1{
            color: red;
         }
         
         
         
         
      </style> 
   -->

   <link href=
"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
          rel="stylesheet">

          <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


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
   <h1>Admin Panel</h1>
      <div class="container"> 
         <div class="table-1">
            <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">User Registration Records</h4>
            </div>
               <table class="table table-hover table-bordered">
                  <thead class="thead-dark">
                     <tr  > 
                        <th class="border border-red-800 px-4 py-2">ID</th> 
                        <th class="border border-red-800 px-4 py-2">Name</th> 
                        <th class="border border-red-800 px-4 py-2">Email</th> 
                        <th class="border border-red-800 px-4 py-2">User_type</th> 
                        <!-- <th class="border border-red-800 px-4 py-2">Operations</th>  -->
                     </tr> 
                  </thead>
                  <tbody>
                     
                     <tr class="hover:bg-green-100"> 
                        <?php

                        while($row = mysqli_fetch_assoc($result))
                        {
                     ?>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['user_type'];?></td>
                     </tr> 
                     <?php
                        }


                     ?>
                     
                  </tbody>
               </table> 
            </div>
         </div>
<br><br><br><br>
   <div class="table-2">

      <div class="card">
      <div class="card-header bg-primary text-white">
                <h4 class="mb-0">User Order Records</h4>
            </div>
         <table class="table table-hover table-bordered"> 
            <thead class="thead-dark">
               <tr> 
                  <th class="border border-red-800 px-4 py-2">ID</th> 
                  <th class="border border-red-800 px-4 py-2">Name</th> 
                  <th class="border border-red-800 px-4 py-2">Email</th>
                  <th class="border border-red-800 px-4 py-2">Phone</th> 
                  <th class="border border-red-800 px-4 py-2">Address</th> 
                  <th class="border border-red-800 px-4 py-2">Location</th>
                  <th class="border border-red-800 px-4 py-2">Guests</th> 
                  <th class="border border-red-800 px-4 py-2">Arrivals</th> 
                  <th class="border border-red-800 px-4 py-2">Leaving</th> 
                  <th class="border border-red-800 px-4 py-2">Action</th> 

               </tr> 
            </thead>
            <tbody>
              <?php
            if($result1){
               while($row=mysqli_fetch_assoc($result1)){
                  $id=$row['id'];
                  $name=$row['name'];
                  $email=$row['email'];
                  $phone=$row['phone'];
                  $address=$row['address'];
                  $location=$row['location'];
                  $guests=$row['guests'];
                  $arrivals=$row['arrivals'];
                  $leaving=$row['leaving'];
                  echo ' <tr>
                  <th scope="row">'.$id.'</th>
                  <td>'.$name.'</td>
                  <td>'.$email.'</td>
                  <td>'.$phone.'</td>
                  <td>'.$address.'</td>
                  <td>'.$location.'</td>
                  <td>'.$guests.'</td>
                  <td>'.$arrivals.'</td>
                  <td>'.$leaving.'</td>
                  <td>
                  <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light">Edit</a></button>
                  <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
                  </td>
                  </tr>';
               


               }


            }
            

              ?>

         </tbody>
      </table> 
      </div>   
      </div> 
   </div>
   
   <script src=
"https://code.jquery.com/jquery-3.5.1.slim.min.js">
    </script>
    <script src=
"https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"> 
    </script>
    <script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
   </body>
</html>
