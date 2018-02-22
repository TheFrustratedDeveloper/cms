<?php  include "includes/db_connect.php"; ?>
<?php  include "includes/header.php"; ?>
<?php 
    require 'vendor/autoload.php';
// new Pusher/Pusher('key','secret','app_id','cluster');
    $options = array('cluster' => 'ap2','encrypted' => true);
    $pusher = new Pusher\Pusher('7bb18b86772a3dd10359','ad682ae75c0534d9830e','472244',$options);
?>

 <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove();
    });
}, 4000);
</script>
<?php

if(isset($_POST['addUser'])){
    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);
    $confirmPassword = escape($_POST['cnfrmPassword']);
    $fname = escape($_POST['fname']);
    $lname = escape($_POST['lname']);
    $for_role = $_POST['for_role'];
    $userImg = $_FILES['image']['name'];
    $userImgTemp = $_FILES['image']['tmp_name'];
    move_uploaded_file($userImgTemp,"images/users/$userImg");
//validations
 if(validate($username,$email,$password,$confirmPassword,$fname,$lname,$for_role,$userImg)){
    $data['message'] = $username; 
    $pusher->trigger('notifications','new_user', $data);
    // header("refresh:0.1;url=index.php");   
 }
 
}
?>
    <!-- Navigation -->
    <?php  include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                        <h1>Register for content writer</h1><hr>
                     <form action="registration.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control"  name="fname"
                                autocomplete="on"
                                value="<?php echo isset($fname) ? $fname : ''?>" >
                            <span class="text-danger"><?php echo isset($error['fname']) ? $error['fname'] : ''?></span>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" autocomplete="on"
                                value="<?php echo isset($lname) ? $lname : ''?>" >
                                <span class="text-danger"><?php echo isset($error['lname']) ? $error['lname'] : ''?></span>
                            </div>
                            <div class="form-group">
                                <label for="author">E-Mail</label>
                                <input type="email" class="form-control"  name="email" autocomplete="on"
                                value="<?php echo isset($email) ? $email : '' ?>" >
                                <span class="text-danger"><?php echo isset($error['email']) ? $error['email'] : ''?></span>
                            </div>
                            <div class="form-group">
                                <label for="role">FOR</label>
                                <select class="form-control" name="for_role" id="">
                                    <option value="2" selected> Content Writer </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dp">Display Picture</label>
                                <input type="file"  name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" autocomplete="on"
                                value="<?php echo isset($username) ? $username : '' ?>" >
                                <span class="text-danger"><?php echo isset($error['username']) ? $error['username'] : ''?></span>
                            </div>
                            <div class="form-group">
                                <label for="pswrd">Password</label>
                                <input type="password" name="password"  class="form-control">
                                <span class="text-danger"><?php echo isset($error['password']) ? $error['password'] : '';echo "<br>";?></span>
                                <label for="confirmPswrd">Confirm Password</label>
                                <input type="password" name="cnfrmPassword" class="form-control">
                                <span class="text-danger"><?php echo isset($error['confirmPassword']) ? $error['confirmPassword'] : ''?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Register" name="addUser" class="form-control btn btn-success">
                            </div>
                    </form>
                <div class="form-group">
                </div>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>

<?php include "includes/footer.php";?>
