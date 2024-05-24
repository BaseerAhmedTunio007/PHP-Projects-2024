<?php
session_start();
if($_SESSION['login'] !=true){
  header('location: logout.php');
  exit();
}
require "header.php";
?>
<h1 class="text-primary text-center">Welcome, <?= $_SESSION['name']?> </h1>


<?php

$conn = mysqli_connect('localhost','root','','newdb');
$sql = " SELECT * FROM regtab";
$result = mysqli_query($conn , $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div class="container my-5">


<div class="col-md-8" style="margin:auto;" >


<table class="table border 1px solid">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">FatherName</th>
      <th scope="col">Age</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>

    </tr>
  </thead>   

  <tbody>
    <tr>
    
 <?php foreach($data as $file) : ?>

        <td><?= $file['name']?></td>
        <td><?= $file['fathername']?></td>
        <td><?= $file['age']?></td>
        <td><?= $file['email']?></td>
        <td><?= $file['phone']?></td>
       <td> 
<a href="edit.php?id=<?= $file['id'] ?>" class="btn btn-primary">Edit</a></td>

<td>
    <a  href="single.php?id=<?= $file['id'] ?>" class="btn btn-primary" >Read More!</a>
</td>
</tr>
</tbody>
        </div>
           <?php endforeach; ?>
      </div>
    
        </table>
       
<a href="logout.php" class="btn btn-primary">Logout</a> 
 <a class="btn btn-primary" href="create.php">Create New!</a>


































