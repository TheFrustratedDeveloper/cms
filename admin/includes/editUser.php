<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];

        $selectAllfromUsers = "SELECT * FROM users WHERE user_id = $id";
        $showAllfromUsers = mysqli_query($connect,$selectAllfromUsers); 
        while($row = mysqli_fetch_assoc($showAllfromUsers)){
           // $postID = $row['post_id'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $email = $row['email'];
            $role = $row['role'];
            $userImg = $row['user_image'];
            $username = $row['username'];        
        }
    }else{
        header('Location:index.php');
}
?>
                    <form action="" method="post" enctype="multipart/form-data">
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
                                <img style="margin-bottom:15px;" width=100 src="../images/users/<?php echo $userImg;?>" alt="">
                                <input type="file"  name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" value="<?php echo $username ;?>" name="username" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="oldPassword">Old Password</label>
                                <input type="password" name="oldPassword" class="form-control" required>
                                <label for="pswrd">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <label for="confirmPswrd">Confirm Password</label>
                                <input type="password" name="cnfrmPassword" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" name="editUser" class="form-control btn btn-success">
                            </div>
                    </form>