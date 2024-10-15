<?php 
@include 'book_form.php';
@include 'login.php';
session_start();
session_unset();
session_destroy();

header('location:login.php');
?>