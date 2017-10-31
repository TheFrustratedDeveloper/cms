<div class="col-md-4">
<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove();
    });
}, 4000);
</script>
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" value="OK" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <div class="well">
                   <?php if(isset($_SESSION['role'])): ?>
                       <h4>Login</h4>
                       <form action="/cms/includes/logout.php" method="post">
                        <div class="input-group">
                        <input type="text" name="info" class="form-control" readonly value="You are logged in as <?php echo $_SESSION['username']; ?>">
                    
                        <span class="input-group-btn">
                            <button name="login" class="btn btn-danger" value="logout" type="submit">
                                Log-Out
                            </button>
                        </span>
                    </div>
                    </form>   
                   <?php else: ?>
                       <h4>Login</h4>
                    <form action="/cms/includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    
                        <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" value="Login" type="submit">
                                Login&nbsp;&nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div><br>
                        <a href="/cms/forgot?pswrd=<?php echo uniqid(true);?>" style="text-decoration:none;"class="text-danger pull-right">Forgot Passwod ?</a><br>
                    </form>
                    <?php endif;?>
                    </div>
                    <div class="well">
                    <h4>Subscribe</h4> 
                    <form action="" method="post">
                    <div class="input-group">
                        <input type="email" name="subEmail" class="form-control" placeholder="someone@example.com">
                    
                        <span class="input-group-btn">
                            <button name="subs" class="btn btn-primary" value="subscriber" type="submit">
                              Subscriber&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                    <div>
                    </div>
                    <?php 
                     
                     if(isset($_POST['subs'])){
                        $email = escape($_POST['subEmail']);
                        if(empty($email)){
                            echo "<br><p class='alert alert-info'>Email cannot be empty</p>";
                        }else{
                            
                        
                        $subscribed = subscriber($email);
                        if($subscribed){
                            echo "<br><p class='alert alert-danger'>Thank-you but you are already registered as a subscriber</p>";
                        }else{
                            echo "<br><p class='alert alert-info'>Thank-you for being a subscriber</p>";
                        }}
                    }
                    ?>
                </div> 
                    
                
                    
                    </form>
                    

                    
                   
                    
                    <!-- /.input-group -->
                


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            <?php
                            $selectAllfromCat = "SELECT * FROM category LIMIT 4";
                            //LIMIT TILL 4TH POST
                            $showAllfromCat = mysqli_query($connect,$selectAllfromCat); 
                            while($row = mysqli_fetch_assoc($showAllfromCat)){
                                $navID = $row['cat_id'];
                                $navTitle = $row['cat_title'];
                                echo "<li><a href='sidebarCategory.php?s_id=$navID'>$navTitle</a></li>";
                            }
                            ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            <?php
                            $selectAllfromCat = "SELECT * FROM category LIMIT 4,8";
                            //LIMIT FROM 4TH POST TO 8TH POST
                            $showAllfromCat = mysqli_query($connect,$selectAllfromCat); 
                            while($row = mysqli_fetch_assoc($showAllfromCat)){
                                $navID = $row['cat_id'];
                                $navTitle = $row['cat_title'];
                                echo "<li><a href='sidebarCategory.php?s_id=$navID'>$navTitle</a></li>";
                            }
                            ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widgets.php"; ?>
            </div>