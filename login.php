<?php  
session_start();


require "header.php";


$failed = '';
$conn = mysqli_connect('localhost', 'root', '', 'newdb');
$sql = "SELECT `name`, `password` FROM regtab";
$execute = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

if($_SERVER['REQUEST_METHOD']== 'POST'){

    $formuser = $_POST['name'];
    $formpass = $_POST['password'];

    foreach( $result as $userprofile ){
if( $userprofile['name'] ==$formuser && password_verify($formpass,  $userprofile['password'] )){
        $_SESSION['login'] = true;
        $_SESSION['name'] = $userprofile['name'];

        header('Location: index.php');

}else{
    $failed = 'Your name  and pass is incorect!';
}
}
}  
?>
<div class="container my-5">
    <div class="row my-5 border rounded py-5">
        <div class="col-md-7" style="margin: auto;">

        <form action=""  method="POST" >

<h1 class="text-primary text-center "> Login Form</h1>
 <?php if($failed !='') : ?>
            <p class="h4 text-danger text-center"><?= $failed ?></p>
            <?php endif; ?>
<div>
            <label for="" class="text-danger">Name</label>
            <input  type="text" name="name" class="form-control" placeholder="Enter your name!" required>
            </div>

            <div>
            <label for="" class="text-danger">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password!" required>
            </div>

            <div class=" my-2">
                <button  class="btn btn-primary" type="submit" >Login</button>
            </div>

            Are You New User, <a href="register.php">Register Now!</a>


        </div>
    </div>
</div>
</form>
