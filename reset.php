<?php  include "includes/db_connect.php"; ?>
<?php  include "includes/header.php"; ?>


<!-- Navigation -->
<?php  include "includes/nav.php"; ?>

<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove();
    });
}, 4000);
</script>
<!-- Page Content -->
<?php
if(!$_GET['email'] || !$_GET['token']){
    redirect("/cms/login");
}else{
    $email = $_GET['email'];
    $token = $_GET['token'];
    $query = "SELECT token FROM users WHERE email = '$email' ";
    $run = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($run);
    if($data['token'] !== $token){
        redirect('error404.php');
    }else{
        if(isset($_POST['submit'])){
            $newPass = $_POST['newPass'];
            $confirmPass = $_POST['confirmPass'];
            $newPass = password_hash("$newPass",PASSWORD_BCRYPT,array('cost' => 12));
            if(password_verify($confirmPass,$newPass)){
                $updatePass = "UPDATE users SET `password` = '$newPass' WHERE `email` = '$email'";
                $runQuery = mysqli_query($connect,$updatePass);
                if(!$runQuery){
                    die(mysqli_error($connect));
                }else{
                    $deleteQuery = "UPDATE users SET `token` = null WHERE `email` = '$email'";
                    $executeQuery = mysqli_query($connect,$deleteQuery);
                    $message = "<div class='alert alert-success'>Password Changed Sucessfully.</br>
                    Please Login</div>";
                    header("refresh:2,url=/cms/login");
                }
            }else{
                echo "NOPE";
            }

        }

    }
}
?>



<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Reset Password ?</h2>
                                <p><?php echo $email; ?> can reset your password here.</p>
                                <div class="panel-body">
                                    <form id="reset-form" role="form" autocomplete="on" class="form" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-unlock-alt color-blue"></i></span>
                                                <input type="password" name="newPass" placeholder="New Password" class="form-control">
                                                <input type="password" name="confirmPass" placeholder="Confirm Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>
                                        <?php if(isset($message)){
                                                echo $message;
                                            } ?>
                                    </form>
                                </div><!-- Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->
