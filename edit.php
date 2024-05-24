<?php
session_start();
if($_SESSION['login'] != true){
    header('location: logout.php');
    exit();
}
require "header.php";

$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "newdb");
$sql = "SELECT * FROM regtab WHERE id=" .$id;

$result = mysqli_query($conn , $sql);

$exe = mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $fathername = $_POST['fathername'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    

    $sql = "UPDATE regtab SET name = ?, fathername = ?, age = ?, email = ?, phone = ?, password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssisssi', $name, $fathername, $age, $email, $phone, $password, $id); // Add $id here

    if (mysqli_stmt_execute($stmt)) {
        header("location: single.php?id=$id");
    } else {
        echo  "<script> alert('Something went wrong!') </script>";
        echo mysqli_stmt_error($stmt);
    }
}
?>

<div class="container my-5">
    <div class="row my-5 border rounded py-5">
        <div class="col-md-7" style="margin: auto;">
            <form action="" method="POST">
                <h1 class="text-primary text-center "> Edit Form</h1>
                <div>
                    <label for="" class="text-danger">User Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $exe['name'] ?>">
                </div>
                <div>
                    <label for="" class="text-danger">Fathername</label>
                    <input type="text" name="fathername" class="form-control" value="<?= $exe['fathername'] ?>">
                </div>
                <div>
                    <label for="" class="text-danger">Age</label>
                    <input type="text" name="age" class="form-control" value="<?= $exe['age'] ?>">
                </div>
                <div>
                    <label for="" class="text-danger">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $exe['email'] ?>">
                </div>
                <div>
                    <label for="" class="text-danger">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= $exe['phone'] ?>">
                </div>
                <div>
                    <label for="" class="text-danger">Password</label>
                    <input type="password" name="password" class="form-control" value="<?= $exe['password'] ?>">
                </div>
                <div class=" my-2">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>