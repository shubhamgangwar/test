<?php 
$con = mysqli_connect('localhost','root','','test');
                                         
$sid=$_GET['id'];
$qry="delete from student where id='$sid'";
$run = mysqli_query($con,$qry);
header('location:test.php');

?>