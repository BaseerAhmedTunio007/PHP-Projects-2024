<?php
// session_start();
// if($_SESSION['login'] != true){
// header('location: logout.php');
// exit();
require "header.php";
$flashMassege = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $conn = mysqli_connect('localhost', 'root', '', 'newdb');

    $name = $_POST['name'];
    $fathername = $_POST['fathername'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO regtab (name,fathername,age,email,phone,password) VALUES(?,?,?,?,?,?)";

    $stmt = mysqli_prepare( $conn , $sql);

mysqli_stmt_bind_param($stmt, 'ssisss', $name,$fathername,$age,$email,$phone,$password);

if(mysqli_stmt_execute($stmt)){
    $flashMassege = "Your are Registered, You can";
}else{
    $flashMassege = "Something Went Wrong"; 
}
}

?>
<div class="container my-5">
    <div class="row my-5 border rounded py-5">
        <div class="col-md-7" style="margin: auto;">

            <form action=""  method="POST" >

            <h1 class="text-primary text-center "> Registration</h1>

            <?php if($flashMassege ): ?>
                <p class="h4 text-center text-success border" ><?= $flashMassege ?>
                     <a href="login.php">Login Now!</a>     </p>
                    <?php endif; ?>  

            <div>
            <label for="" class="text-danger">User Name</label>
            <input  type="text" name="name" class="form-control" placeholder="Enter your name!" required>
            </div>
            
            <div>
            <label for="" class="text-danger">Fathername</label>
            <input type="text" name="fathername" class="form-control" placeholder="Enter your fathername !" required>
            </div>

            <div>
            <label for="" class="text-danger">Age</label>
            <input type="text" name="age" class="form-control" placeholder="Enter your Age !" required>
            </div>
           
            <div>
            <label for="" class="text-danger">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Enter your Email !" required>
            </div>

            <div>
            <label for="" class="text-danger">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number !" required>
            </div>
            <div>
            <label for="" class="text-danger">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your Secrat pass!" required>
            </div>
           

            <div class=" my-2">
                <button  class="btn btn-primary" type="submit" >Register</button>
            </div>
            

        </div>
    </div>
</div>
</form>

