<?php

require "header.php";

$fail = '';

$conn = mysqli_connect('localhost', 'root', '', 'regdb');
$sql = 'SELECT `name`, `password` FROM opentb';
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);



if($_SERVER['REQUEST_METHOD']== 'POST'){
    $formuser = $_POST['name'];
    $formpass = $_POST['password'];

    foreach ($data as $file){
        if( $file['name'] == $formuser && password_verify($formpass , $file['password'])){
            $_SESSION['log_in'] = true;
            $_SESSION['name'] = $file['name'];

            header('Location: index2.php');
        }else{
            $fail = "Your Pass and Name is Incorecrt!";
        }
    }
}

?>



<div class="container my-5">

<div class="col-md-7" style="margin:auto;">
    <div class="row my- rounded border py-2">

    <h1 class="text text-center text-primary">Login Form</h1>
<?php if($fail !='') : ?>
    <p class="h4 text-danger text-center"><?= $fail ?></p>
    <?php endif; ?>
    
            <form action="" method="POST">
                <div>
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div>
                <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="my-2">
           <button class="btn btn-primary" type="submit" >Login</a></button>  
            </div>
           Are you new user! <a href="register2.php">Register Now</a>  

            </form>
        </div>
    </div>
</div>