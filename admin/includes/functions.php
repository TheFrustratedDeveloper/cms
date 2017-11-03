<?php
    function escape($string){
        global $connect;
        return mysqli_real_escape_string($connect,trim($string));
    }
    function redirect($location){
        header("Location:$location");
    }
    function create_category(){
        global $connect;
        if(isset($_POST['submit'])){
           $catTitle = $_POST['cat_title'];
           if(empty($catTitle)){
              echo "<div class='alert alert-danger'>
                    <strong>Warning!</strong> Category Field can't be empty.
                    </div>";}
            else{
                $stmt = mysqli_prepare($connect,"INSERT INTO category(cat_title) VALUES(?)");
                mysqli_stmt_bind_param($stmt,'s',$catTitle);
                mysqli_stmt_execute($stmt);
                if(!$stmt){
                    die();
                }else{
                    mysqli_stmt_close($stmt);
                    redirect('add_cat.php');    
                }  
            }    
        }
    }   
    function update_category(){
        global $connect;
        if(isset($_GET['edit'])){ //to show update textfield with cat_title in it
            $catID_edit = $_GET['edit'];
            $catTitle_edit = $_GET['title']; 
            echo "<div class='form-group'>";
            echo "<label for='cat'>Edit Category Name</label>";
            echo "<input value='$catTitle_edit' class='form-control' type='text' name='cat_update_title'>";
            echo "</div>";
            echo "<div class='form-group'>";
            ?><?php //to update the selected category 
            if(isset($_POST['update'])){
                $updated_title = $_POST['cat_update_title'];
                if(empty($updated_title)){
                    $updated_title = $catTitle_edit;
                }
                $catID_edit = $_GET['edit'];
                $stmt = mysqli_prepare($connect,"UPDATE category SET cat_title = ? WHERE cat_id = ? ");
                mysqli_stmt_bind_param($stmt,'si',$updated_title,$catID_edit);
                mysqli_stmt_execute($stmt);
                if(!$stmt){die();}else{
                    mysqli_stmt_close($stmt);
                    redirect('add_cat.php');
                } 
            }
            ?><?php //to show update button 
            echo "<input class='btn btn-warning' type='submit' name='update' value='Update'>";
            echo "</div>";
        }
    }
    function delete_category(){
        global $connect;
        if(isset($_POST['delete'])){
            $catID_delete = $_POST['deleteID'];
            $stmt = mysqli_prepare($connect,"DELETE FROM category WHERE cat_id = ? ");
            mysqli_stmt_bind_param($stmt,'i',$catID_delete);
            mysqli_stmt_execute($stmt);
            if(!$stmt){die();}else{
                mysqli_stmt_close($stmt);
                redirect('add_cat.php');
            }
        }
    }
    function addNewPost(){
        global $connect;
        if(isset($_POST['publish'])){
            $postTitle = $_POST['title'];
            $postAuthor = $_POST['author'];
            $postStatus = $_POST['status'];
            $cat_id = $_POST['category_id'];
            if(empty($cat_id)){
                echo( "<script>alert('Please Select category')</script>");
            }else{       
                $postImg = $_FILES['image']['name'];
                $postImgTemp = $_FILES['image']['tmp_name'];
                $postTag = $_POST['tags'];
                $postContent = escape($_POST['content']);
                $postDate = date('d-m-y');
                move_uploaded_file($postImgTemp,"../images/$postImg");
                $stmt = mysqli_prepare($connect,"INSERT INTO posts(post_title,cat_id,post_author,post_img,post_content,post_tag,post_status,post_date) VALUES(?,?,?,?,?,?,?,now())");
                mysqli_stmt_bind_param($stmt,"sisssss",$postTitle,$cat_id,$postAuthor,$postImg,$postContent,$postTag,$postStatus);
                mysqli_execute($stmt);
                if(!$stmt){die(mysqli_error($connect));}else{
                    echo " <div class='alert alert-success'>
                    <strong>Sucessful!</strong><br>Post Added.
                    </div>";
                    $postID = mysqli_insert_id($connect);
                echo "<div class='alert alert-success'><strong><a href='post_list.php'>View All Posts</a></strong> or <strong><a href='post_list.php?source=edit_post&p_id=$postID'>Edit This Post</a></strong></div>";   
            } } } }
// ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑   
// MODIFIED WITH PREPARE STATEMENTS
// ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ 
// MODIFIED WITH PREPARE STATEMENTS
// ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑  
// MODIFIED WITH PREPARE STATEMENTS 
    function deletePost(){
        global $connect;
        if(isset($_POST['delete'])){
            $delID = $_POST['post_id'];
            $delQuery = "DELETE FROM posts WHERE post_id = $delID";
            $delContent = mysqli_query($connect,$delQuery);
            if(!$delContent){die();}
            header( "Location:post_list.php");
        }
    }
    function publishPost(){
        global $connect;
        if(isset($_GET['publish'])){
            $pID = $_GET['publish'];
            $query = "UPDATE posts SET post_status = 'published' WHERE `post_id` = $pID";
            $publish_post = mysqli_query($connect,$query);
            if(!$publish_post){die();}else{
                echo "<div class='alert alert-success'>
                <strong>Published!</strong>
                </div>";
                header( "refresh:1; url=post_list.php");
            }
        }
    }
    function draftPost(){
        global $connect;
        if(isset($_GET['draft'])){
            $pID = $_GET['draft'];
            $query = "UPDATE posts SET post_status = 'draft' WHERE `post_id` = $pID";
            $publish_post = mysqli_query($connect,$query);
            if(!$publish_post){die();}else{
                echo "<div class='alert alert-warning'>
                <strong>Post UnPublished!</strong>
                </div>";
                header( "refresh:1; url=post_list.php");
            }
        }        
    }
    function editPost(){
        global $connect;
        if(isset($_POST['Edit'])){
        $p_id = $_GET['p_id'];
        $title = $_POST['title'];
        $category = $_POST['category_id'];
            if(empty($category)){
                echo( "<div class='alert alert-danger'>
                <strong>Category Not Selected</strong><br>Please select category before updating the post.</div>
                <div class='alert alert-danger'>Taking you back to previous page ...</div>"
                    );
                header( "refresh:3; url=post_list.php?source=edit_post&p_id=$p_id");
                die();
                }
        $author = $_POST['author'];
        $content = escape($_POST['content']);
        $tags = $_POST['tags'];
        $status = $_POST['status'];
        $img = $_FILES['image']['name'];
        $tempImg = $_FILES['image']['tmp_name'];
        $date = date('d-m-y');                  
        move_uploaded_file($tempImg,"../images/$img");
        if(empty($img)){
            $imgQuery = "SELECT * FROM posts WHERE post_id = $p_id";
            $selectImg = mysqli_query($connect,$imgQuery);
            while($row = mysqli_fetch_assoc($selectImg)){
                $img = $row['post_img'];
            }
        }
        $query = "UPDATE posts SET post_title='$title',cat_id=$category,post_author='$author',post_content='$content',post_tag='$tags',post_status='$status',post_img='$img',post_date=now() WHERE post_id = $p_id";
        $editQuery = mysqli_query($connect,$query);
        if(!$editQuery){die("Dead".mysqli_error($connect));}else{
            //header("Location:post_list.php?source=edit_post&p_id=$p_id");
            echo " <div class='alert alert-success'>
                <strong>Sucessfull!</strong><br>Post Edited.
                <br>Will be refreshing to HOME within 5 seconds ...
                </div>";
            
                echo "<div class='alert alert-success'><strong><a href='post_list.php'>View All Posts</a></strong> or <strong><a href='post_list.php?source=edit_post&p_id=$p_id'>Edit This Post</a></strong></div>";
        }
}
}
    function viewComments(){
        global $connect;
        $selectAllfromCmts = "SELECT * FROM comments";
        $showAllfromCmts = mysqli_query($connect,$selectAllfromCmts);

        while($row = mysqli_fetch_assoc($showAllfromCmts)){
            $cmtID = $row['cmt_id'];
            $cmtAuthor = $row['cmt_author'];
            $cmtEmail = substr($row['cmt_email'],0,11);
            $cmtContent = substr($row['cmt_content'],0,21);
            //Start of in Response to
            $selectfromcomment = "SELECT cmt_post_id FROM comments WHERE cmt_id=$cmtID";
            $showCommentP_ID = mysqli_query($connect,$selectfromcomment);
            $rowPID = mysqli_fetch_assoc($showCommentP_ID);
            $pID = $rowPID['cmt_post_id'];
            //\\//\\//\\//\\//\\//\\//\\//\\
            $selectfromPost = "SELECT post_title FROM posts WHERE post_id=$pID";
            $showPostTitle = mysqli_query($connect,$selectfromPost);
            $rowR_TO = mysqli_fetch_assoc($showPostTitle);
            $responseTo = $rowR_TO['post_title'];
            //End of in Response to    
            $cmtStatus = $row['cmt_status'];
            $cmtDate = $row['cmt_date'];
            //Print into table                    
            echo "<tr>";
            echo "<td><input type='checkbox' class='checkboxes' name='checkBoxArray[]' value=$cmtID></td>";
            echo "<td>$cmtID</td>";
            echo "<td>$cmtAuthor</td>";
            echo "<td>$cmtEmail...</td>";
            echo "<td>$cmtContent...</td>";
            echo "<td><a href='../post.php?p_id=$pID'>$responseTo</a></td>";
            echo "<td>$cmtStatus</td>";
            echo "<td>$cmtDate</td>";
            echo "<td><a class='btn btn-info' href='cmt_list.php?approve=$cmtID'>Approve</a></td>";
            echo "<td><a class='btn btn-warning ' style='margin-left:5px;' href='cmt_list.php?disapprove=$cmtID'>Dis-Approve</a></td>";
            echo "<td><a class='btn btn-danger' style='margin-left:5px;' href='cmt_list.php?delete=$cmtID'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function deleteComment(){
        global $connect ;
        if(isset($_GET['delete'])){
            $delID = escape($_GET['delete']);
            $query = "DELETE FROM comments WHERE cmt_id = $delID";
            $delQuery = mysqli_query($connect,$query);
            if(!$delQuery){die();}else{
                echo "<div class='alert alert-danger'>
                <strong>Comment Deleted!</strong>
                </div>";
                header( "refresh:1; url=cmt_list.php");
            }
        }
    }
    function approveComment(){
        global $connect ;
        if(isset($_GET['approve'])){
            $apvID = $_GET['approve'];
            $query = "UPDATE comments SET cmt_status = 'approved' WHERE cmt_id = $apvID";
            $apvQuery = mysqli_query($connect,$query);
            if(!$apvQuery){die();}else{
                echo "<div class='alert alert-success'>
                <strong>Comment Approved</strong>
                </div>";
                header( "refresh:1; url=cmt_list.php");
            }
        }
    }
    function disApproveComment(){
        global $connect ;
        if(isset($_GET['disapprove'])){
            $diapvID = $_GET['disapprove'];
            $query = "UPDATE comments SET cmt_status = 'dis-approved' WHERE cmt_id = $diapvID";
            $disapvQuery = mysqli_query($connect,$query);
            if(!$disapvQuery){die();}else{
                echo "<div class='alert alert-warning'>
                <strong>Comment DIS-Approved</strong>
                </div>";
                header( "refresh:1; url=cmt_list.php");
            }
        }
    }
    function addUser(){
        global $connect;
        if(isset($_POST['addUser'])){
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $email = $_POST['email'];
            $for_role = $_POST['for_role'];                   
            $userImg = $_FILES['image']['name'];
            $userImgTemp = $_FILES['image']['tmp_name'];
            $username = $_POST['username'];
            
            
            if(duplicateUser($username)){
                echo "<div class='alert alert-warning'>
                <strong>Please Select Different Username !</strong>
                <small>Duplication Found.</small>
                </div>";
                header( "refresh:2; url=users_list.php?source=add_user");
                
            }else{
                
            
            
            $password = $_POST['password'];
            $confirmPassword = $_POST['cnfrmPassword'];
            
            if($password === $confirmPassword){
                $password = password_hash("$password",PASSWORD_BCRYPT,array('cost' => 12));
                $dateAdded = date('d-m-y');             
                move_uploaded_file($userImgTemp,"../images/users/$userImg");                    
                $query = "INSERT INTO users(first_name,last_name,email,role,user_image,username,password,dateAdded) VALUES('$firstname','$lastname','$email','$for_role','$userImg','$username','$password',now())";         
                $addUser = mysqli_query($connect,$query);
                if(!$addUser){die();}else{
                    echo "<div class='alert alert-success'>
                          <strong>Registered Sucessfully!</strong>
                          </div>";
                    $newUser = mysqli_insert_id($connect);
                    echo "<div class='alert alert-success'><strong><a href='users_list.php'>View All Users</a></strong> or <strong><a href='users_list.php?source=editUser&id=$newUser'>Edit This User</a></strong></div>";
                }
            }else {
            echo   "<div class='alert alert-warning'>
                <strong>Password Incorrect !</strong>
                <small>Both Passwords should be same.</small>
                </div>";
                header( "refresh:1; url=users_list.php?source=add_user");
                die();
            }
                }
        }
    }
    function deleteUser(){
        global $connect ;
        if(isset($_GET['delete'])){
            if(isset($_SESSION['role'])){
                if($_SESSION['role'] == 'Admin'){
                    $delID = mysqli_real_escape_string($connect,$_GET['delete']);
                    $query = "DELETE FROM users WHERE user_id = $delID";
                    $delQuery = mysqli_query($connect,$query);
                    if(!$delQuery){die();}else{
                        echo "<div class='alert alert-danger'>
                        <strong>User Deleted!</strong>
                        </div>";
                        header( "refresh:1; url=users_list.php");
                    }  
                }
            } 
        }
    }
    function makeAdmin(){
        global $connect;
        if(isset($_GET['adminApprove'])){
            $userID = $_GET['adminApprove'];
            $username = $_GET['username'];
            $query = "UPDATE users SET role = 'Admin' WHERE user_id = $userID";
            $makeAdmin = mysqli_query($connect,$query);
            if(!$makeAdmin){die();}else{
                echo "<div class='alert alert-success'>
                <strong>$username has been promoted to Admin</strong>
                </div>";
                header( "refresh:1; url=users_list.php");
            }
        }
    }
    function makeContentC(){
        global $connect;
        if(isset($_GET['contentW'])){
            $userID = $_GET['contentW'];
            $username = $_GET['username'];
            $query = "UPDATE users SET role = 'Content Writer' WHERE user_id = $userID";
            $makeSubscriber = mysqli_query($connect,$query);
            if(!$makeSubscriber){die();}else{header( "Location:users_list.php");}
        }
    }
    function blockThatUser(){
        global $connect;
        if(isset($_GET['block'])){
            $userID = $_GET['block'];
            $query = "UPDATE users SET role = 'Blocked' WHERE user_id = $userID";
            $blocked = mysqli_query($connect,$query);
            if(!$blocked){die();}else{header("Location:users_list.php");}
        }
    } 
    function editUser(){
        global $connect;
        
        if(isset($_POST['editUser'])){
            
            $id = $_GET['id'];
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];                   
            $userImg = $_FILES['image']['name'];
            $userImgTemp = $_FILES['image']['tmp_name'];
            $username = $_POST['username'];
            $oldPassword = $_POST['oldPassword'];
            
            $selectOLDPassword = "SELECT * FROM users WHERE user_id = $id";
            $showOLDPassword = mysqli_query($connect,$selectOLDPassword);
            $row = mysqli_fetch_assoc($showOLDPassword);
            $oldPswrd = $row['password'];
            
            if(password_verify("$oldPassword","$oldPswrd")){
                $password = $_POST['password'];
                $confirmPassword = $_POST['cnfrmPassword'];
                if($password !== $confirmPassword){
                    echo   "<div class='alert alert-warning'>
                            <strong>Password Incorrect !</strong>
                            <small>Both Passwords should be same.</small>
                            </div>";
                    header( "refresh:1; url=users_list.php?source=editUser&id=$id");
                    die();
                }else{
                    $password = password_hash("$password",PASSWORD_BCRYPT,array('cost' => 12));
                    $dateAdded = date('d-m-y');            
                    move_uploaded_file($userImgTemp,"../images/users/$userImg");
                    if(empty($userImg)){
                        $imgQuery = "SELECT * FROM users WHERE user_id = $id";
                        $selectImg = mysqli_query($connect,$imgQuery);
                        while($row = mysqli_fetch_assoc($selectImg)){
                            $userImg = $row['user_image'];
                        }
                    }
                    $query = "UPDATE users SET first_name='$firstname', last_name='$lastname', user_image='$userImg', username='$username' , password='$password' , dateAdded = now() WHERE user_id = $id";
                    $addUser = mysqli_query($connect,$query);
                    if(!$addUser){die();}else{
                        echo "  <div class='alert alert-success'>
                                <strong>Updated Sucessfully!</strong>
                                </div>  ";
                        header( "refresh:3; url=index.php");   
                    }
                }
            }  //checking password ends         
        }
         //mainIF statement ends   
    } //function ends

    function onlineUserCount(){
        if(isset($_GET['chkOnline'])){    
        include "../../includes/db_connect.php";   
        session_start();
        $session = session_id();
        $time = time();
        $timeOutInSec = 60;
        $timeOut = $time - $timeOutInSec;
        
        $timeQuery = "SELECT * FROM online WHERE session = '$session' ";
        $sendTimeQuery = mysqli_query($connect,$timeQuery);
        $onlineCount = mysqli_num_rows($sendTimeQuery);
        if($onlineCount == null){
            mysqli_query($connect,"INSERT INTO online(session,time) VALUES('$session','$time')"); 
        }else{
            mysqli_query($connect,"UPDATE online SET time = '$time' WHERE session = '$session'");
        }
        $usersOnline = mysqli_query($connect,"SELECT * FROM online WHERE time > '$timeOut'");
        echo $countUser = mysqli_num_rows($usersOnline);
        }
    }
    onlineUserCount();

    function panelCount($table){
        global $connect;
        $query = "SELECT * FROM $table";
        $doQuery = mysqli_query($connect,$query);
        $count = mysqli_num_rows($doQuery);
        return $count;
    }
    function countGraph($table,$column,$status){
        global $connect;
        $query = "SELECT * FROM $table WHERE $column = '$status' ";
        $doQuery = mysqli_query($connect,$query);
        return mysqli_num_rows($doQuery);
    }
    function subCount($table){
        global $connect;
        $query = "SELECT * FROM $table";
        $doQuery = mysqli_query($connect,$query);
        return mysqli_num_rows($doQuery);
    }
    
    
    function duplicateUser($username){
        global $connect;
        $query = "SELECT username FROM users WHERE username = '$username' ";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result) > 0){return true;}else{return false;}
    }
    function duplicateEmail($email){
        global $connect;
        $query = "SELECT email FROM users WHERE email = '$email' ";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result) > 0){return true;}else{return false;}
    }
    function loginUser($username,$password){
        global $connect;
                $query = "SELECT * FROM users WHERE username = '$username'";
                $loginUser = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($loginUser)){
                   $login_username = $row['username'];
                   $login_password = $row['password'];
                   $login_id = $row['user_id'];
                   $login_fname = $row['first_name'];
                   $login_lname = $row['last_name'];
                   $login_role = $row['role'];
                }

                if(password_verify("$password","$login_password")){
                    $_SESSION['username'] = $login_username;
                    $_SESSION['first_name'] = $login_fname;
                    $_SESSION['last_name'] = $login_lname;
                    $_SESSION['role'] = $login_role;
                    $_SESSION['user_id'] = $login_id;
                    if($login_role == 'Admin'){
                        header("Location: ../admin");
                    }else if($login_role == 'Content writer'){
                        echo "<script>alert('You are registered as Content writer. Thanks for showing intrest in US')</script>";
                        $_SESSION['username'] = $login_username;
                        $_SESSION['first_name'] =  $login_fname;
                        $_SESSION['last_name'] =  $login_lname;
                        $_SESSION['role'] =  $login_role;
                        $_SESSION['user_id'] =  $login_id;
                        header("refresh:0.1;url=../admin");
                    }
                    else{
                        echo "<script>alert('Your account has not been verified. Please Wait while we verify')</script>";
                        $_SESSION['username'] = null;
                        $_SESSION['first_name'] =  null;
                        $_SESSION['last_name'] =  null;
                        $_SESSION['role'] =  null;
                        $_SESSION['user_id'] =  null;
                        header("refresh:0.1;url=../index.php");
                    }
                }
                else {  
                        if($username == $login_username){
                            echo "<script>alert('Password Incorrect! Please check your password')</script>";
                        }else{
                            echo "<script>alert('Username not found')</script>"; 
                        }
                        header("refresh:0.1;url=../index.php");
                }
            }

    function validate($username,$email,$password,$confirmPassword,$fname,$lname,$for_role,$userImg){
        global $connect;
        $error = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'username' => '',
            'password' => '',
            'confirmPassword' => ''
    ];        
    //validation
    if(empty($fname)){$error['fname'] = "First name cannot be empty";}else{
        if(empty($lname)){$error['lname'] = "Last name cannot be empty";}else{
            if(empty($email)){$error['email'] = "Email cannot be empty";}
            else if(duplicateEmail($email)){$error['email']="Email already Registerd Please <a href='index.php'> LOGIN </a>";}
            else{
                if(empty($username)){$error['username'] = "Username cannot be empty";}
                else if(strlen($username) < 3){$error['username'] = "Username cannot be less than 3 characters";}
                else if(duplicateUser($username)){$error['username'] = "Username already taken please retry ";}
                else{
                    if(empty($password)){$error['password'] = "Password cannot be empty";}
                    else{
                        if(empty($confirmPassword)){$error['confirmPassword'] = "Password cannot be empty";}
                        else{
                            if($password != $confirmPassword){$error['confirmPassword'] = "Both Passwords are not same";}
                            else{
                                //main code
                                $password = password_hash("$password",PASSWORD_BCRYPT,array('cost' => 12));
                                $registerUser = "INSERT INTO users (username,password,first_name,last_name,email,for_role,user_image,dateAdded) VALUES ('$username','$password','$fname','$lname','$email',$for_role,'$userImg',now())";
                                $registerQuery = mysqli_query($connect,$registerUser);
                                if(!$registerQuery){die(mysqli_error($connect));}else{
                                    echo "<script>alert('User Registered! Please wait while we verify the account')</script>";
                                    header("refresh:0.1;url=index.php");
                                }  
                            }
                        }
                    }
                }
            }
        }
    }
}
function subscriber($email){
    global $connect;
    $query = "SELECT sub_email FROM subscribers WHERE sub_email = '$email' ";
    $chkDuplicate = mysqli_query($connect,$query);
    if(mysqli_num_rows($chkDuplicate) > 0){ return 1; }else{
        $query = "INSERT INTO subscribers(sub_email) VALUES('$email')";
        $subscribed = mysqli_query($connect,$query);
        return 0;
    }
    
      
}
?>
