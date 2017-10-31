<?php include "includes/header.php" ?>
<?php 
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $selectUser = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($selectUser)){
            $loginID = $_SESSION['user_id'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $email = $row['email'];
            $oldPassword = $row['password'];
            $userImg = $row['user_image'];
            $role = $row['role'];
        }
    }
        if(isset($_POST['updateProfile'])){
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];                   
            $userImg = $_FILES['image']['name'];
            $userImgTemp = $_FILES['image']['tmp_name'];
            $usernamefromPost = $_POST['username'];
            if($usernamefromPost !== $username){
                $_SESSION['username'] = null;
                $_SESSION['first_name'] =  null;
                $_SESSION['last_name'] =  null;
                $_SESSION['role'] =  null;
                $_SESSION['user_id'] =  null;
                echo "<div class='alert alert-warning'>
                <strong>Logging You Out!</strong>
                Username changed please re-login.
                </div>";
                header( "refresh:2; url=../index.php");
            }
                $password = $_POST['password'];
            
                $selectOLDPassword = "SELECT * FROM users WHERE user_id = $loginID";
                $showOLDPassword = mysqli_query($connect,$selectOLDPassword);
                $row = mysqli_fetch_assoc($showOLDPassword);
                $oldPswrd = $row['password'];
            
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
                $query = "UPDATE users SET first_name='$firstname', last_name='$lastname', user_image='$userImg', username='$usernamefromPost' , dateAdded = now() WHERE user_id = $loginID";
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
                    <form action="" method="post" enctype="multipart/form-data">
                            <center><div class="form-group">
                            <img class="img img-circle img-responsive" width=270 src="../images/users/<?php echo $userImg;?>" alt="">
                            </div></center>  
                            <br>
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" value="<?php echo $fname; ?>" class="form-control" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" value="<?php echo $lname; ?>" class="form-control" name="lname" required>
                            </div>
                            <div class="form-group">
                                <label for="author">E-Mail</label>
                                <input type="email" readonly value="<?php echo $email;?>" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role Assigned</label>
                                <input type="text" value="<?php echo $role;?>" readonly class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label for="dp">Display Picture</label>
                                
                                <input type="file"  name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" value="<?php echo $username ;?>" name="username" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div>
                                <?php 
                                    
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update Profile" name="updateProfile" class="input-group btn btn-success">
                            </div>
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
