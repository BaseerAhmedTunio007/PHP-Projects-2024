<?php 
session_start();
if($_SESSION['login'] != true){
    header('location: logout.php');
    exit();
}
require "header.php";



$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'newdb');
$sql = 'SELECT * FROM regtab WHERE id=' . $id;
$result = mysqli_query($conn , $sql);
$data = mysqli_fetch_assoc($result);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $sql = "DELETE FROM regtab WHERE id=" . $id;
    if(
        mysqli_query($conn , $sql) ){
            header("location: index.php");
        }else{
        echo "Something Went Wrong";
    }



}
?>


<div class="container my-5">
    <div class="col" style="margin:auto;">
        <table class="table border 1px solid">
        <thead>

                <tr>
                    <th>Name</th>
                    <th>FatherName</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['fathername'] ?></td>
                    <td><?= $data['age'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['phone'] ?></td>
                    <td><?= $data['password'] ?></td>

                </tr>
            </tbody>

        </table>
        <div class="my-2 ">
    <a href="edit.php?id=<?= $data['id']?>" class="btn btn-primary">Edit</a>

    <br>
    <br>
<form action="" method="POST">
    <button type="submit" class="btn btn-primary">Delete</button>
</form>

</div>
    </div>
</div>
