
<?php
require_once('book_form.php');
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $query="DELETE FROM book_form WHERE id = $id";
    $result=mysqli_query($connection,$query);
    if($result){
        // echo "Deleted successfully";
        header('location:adminpage.php');



    }else{
        die(mysqli_error($connection));
    }



}



?>