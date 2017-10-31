                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" required>
                            </div>
                            <div class="form-group">
                                <label for="author">E-Mail</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="role">FOR</label>
                                <select class="form-control" name="for_role" id="">
                                    <option hidden value="2" selected> Select One </option>
<?php 
$selectAllfromRole = "SELECT * FROM role LIMIT 2";
$showAllfromRole = mysqli_query($connect,$selectAllfromRole); 
while($row = mysqli_fetch_assoc($showAllfromRole)){
    $role_id = $row['role_id'];
    $role_title = $row['role_title'];
    echo "<option value='$role_title'>$role_title</option>";
}    
?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dp">Display Picture</label>
                                <input type="file"  name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pswrd">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <label for="confirmPswrd">Confirm Password</label>
                                <input type="password" name="cnfrmPassword" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <input type="submit" value="Register" name="addUser" class="form-control btn btn-success">
                            </div>
                    </form>