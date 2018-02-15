<?php include "includes/header.php" ?>
<style>
    #changePassword{
        display: none;
    }
</style>
<?php 
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

       $query = "SELECT users.user_id,users.username,users.first_name,users.last_name,users.email,users.user_image,role.role_title FROM users RIGHT JOIN role ON users.role = role.role_id WHERE users.username = '$username'";
        $selectUser = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($selectUser)){
            $loginID = $_SESSION['user_id'];
            $fname = $row['first_name'];
            echo $fname;
            $lname = $row['last_name'];
            $email = $row['email'];
            $userImg = $row['user_image'];
            $role = $row['role_title'];
        }
    }

        if(isset($_POST['updateProfile'])){
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];                   
            $userImg = $_FILES['image']['name'];
            $userImgTemp = $_FILES['image']['tmp_name'];
            $password = $_POST['password'];
            
            $oldPswrd = returnOldPassword($loginID);
            
            if(password_verify("$password","$oldPswrd")){
                
                $dateAdded = date('d-m-y');            
                move_uploaded_file($userImgTemp,"../images/users/$userImg");
                if(empty($userImg)){
                $imgQuery = "SELECT * FROM users WHERE user_id = $loginID";
                $selectImg = mysqli_query($connect,$imgQuery);
                    while($row = mysqli_fetch_assoc($selectImg)){
                    $userImg = $row['user_image'];
                    }
                }
                $query = "UPDATE users SET first_name='$firstname', last_name='$lastname', user_image='$userImg', dateAdded = now() WHERE user_id = $loginID";
                $addUser = mysqli_query($connect,$query);  
                if(!$addUser){die();}else{
                    echo "<script>alert('User Updated!');</script>";
                    header( "refresh:2; url=../admin/profile.php");
                }   
            }else{
                 echo   "<div class='alert alert-warning'>
                <strong>Password Incorrect !</strong>
                <small>Old Password doesn't match .</small>
                </div>";
                header( "refresh:2; url=profile.php");
                die();                 
            }
        }

        if(isset($_POST['changePass'])){
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];                   
            $userImg = $_FILES['image']['name'];
            $userImgTemp = $_FILES['image']['tmp_name'];
            $oldPswrd = returnOldPassword($loginID);
            $password = $_POST['oldPassword'];

            if(password_verify("$password","$oldPswrd")){
                if($_POST['newPassword'] === $_POST['confirmPassword']){
                    $dateAdded = date('d-m-y');            
                    move_uploaded_file($userImgTemp,"../images/users/$userImg");
                    if(empty($userImg)){
                        $imgQuery = "SELECT * FROM users WHERE user_id = $loginID";
                        $selectImg = mysqli_query($connect,$imgQuery);
                        while($row = mysqli_fetch_assoc($selectImg)){
                        $userImg = $row['user_image'];
                        }
                    }
                    $newPassword = $_POST['newPassword'];
                    $newPassword = password_hash("$newPassword",PASSWORD_BCRYPT,array('cost' => 12));
                $query = "UPDATE users SET first_name='$firstname', last_name='$lastname', user_image='$userImg', password='$newPassword', dateAdded = now() WHERE user_id = $loginID";
                $addUser = mysqli_query($connect,$query);  
                if(!$addUser){die();}else{
                    echo "<script>alert('User Updated!');</script>";
                    header( "refresh:2; url=../admin/profile.php");
                }   
                }else{
                   echo "<div class='alert alert-warning'>
                <strong>Password Incorrect !</strong>
                <small>Please confirm your password.</small>
                </div>"; 
                }
            }else{
                echo "<div class='alert alert-warning'>
                <strong>Password Incorrect !</strong>
                <small>Old Password doesn't match .</small>
                </div>";
                header( "refresh:2; url=profile.php");
                die();
            }
        }
?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                            <small><?php echo $username; ?> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html"> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <a href="post_list.php"> Profile </a>
                            </li>
                        </ol>
                    </div>
                    <div style="overflow-x:auto;" class="col-lg-12">
                    <form method="post" enctype="multipart/form-data">
                            <center><div class="form-group">
                            <img class="img img-circle img-responsive" width=270 src="../images/users/<?php echo $userImg;?>" alt="">
                            </div></center>  
                            <br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" value="<?php echo $fname; ?>" class="form-control" name="fname" required>
                            </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" value="<?php echo $lname; ?>" class="form-control" name="lname" required>
                            </div>
                                </div>
                                <div class="col-md-4"><div class="form-group">
                                <label for="author">E-Mail</label>
                                <input type="email" readonly value="<?php echo $email;?>" class="form-control" name="email" required>
                            </div></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                <label for="role">Role Assigned</label>
                                <input type="text" value="<?php echo $role;?>" readonly class="form-control">
                                
                            </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                <label for="dp">Display Picture</label>
                                
                                <input type="file"  name="image" class="form-control">
                            </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" value="<?php echo $username ;?>" name="username" readonly class="form-control">
                            </div>
                                </div>
                            </div>
                            <div id="changePassword">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="oldPassword">Old Password</label>
                                            <input type="password" name="oldPassword" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="newPassword">New Password</label>
                                            <input type="password" name="newPassword" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="confirmPassword">Confirm New Password</label>
                                            <input type="password" name="confirmPassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-warning" name="changePass" value="Change Password">
                            </div>
                            <div class="form-group" id="oldPass">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="updateProfile" value="Update Profile" name="updateProfile" class="btn btn-success">
                                &nbsp;&nbsp;<span style="cursor: pointer;" class="text-danger" id="updatePass">Update Password</span>
                            </div>
                            <script>
document.getElementById("updatePass").addEventListener("click", function(){
    document.getElementById("oldPass").style.visibility = "hidden";
    document.getElementById("updateProfile").style.visibility = "hidden";
    document.getElementById("changePassword").style.display = "block";
    document.getElementById("updatePass").style.visibility = "hidden";
    
});
                            </script>
                    </form>
                    </div>
                </div>        
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>
