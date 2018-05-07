    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms">Post.it</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    $selectAllfromCat = "SELECT * FROM category LIMIT 4";
                    $showAllfromCat = mysqli_query($connect,$selectAllfromCat);
                    while($row = mysqli_fetch_assoc($showAllfromCat)){
                        $navID = $row['cat_id'];
                        $navTitle = $row['cat_title'];
                        $activeClass = "";
                        $contactClass = "";
                        
                        $page = basename($_SERVER['PHP_SELF']);
                        $contact = "contact.php";
                        if(isset($_GET['s_id']) && $_GET['s_id'] == $navID){
                            $activeClass = "active";
                        }else if($page == $contact){
                            $contactClass = "active";
                        }
                        echo "<li class='$activeClass'><a href='/cms/sidebarCategory/$navID'>$navTitle</a></li>";
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if(isset($_SESSION['role'])){
                            echo "<li><a href='/cms/admin'>Admin Panel</a></li>";
                            if($_SESSION['role'] == 1){
                                if(isset($_GET['p_id'])){
                                $postID = $_GET['p_id'];
                                echo "<li><a href='/cms/admin/post_list.php?source=edit_post&p_id=$postID'>Edit Post</a></li>";
                            }
                            }
                        }else{
                            echo "<li><a href='/cms/login'>Login</a></li>";
                        }
                    ?>
                    <li class="<?php echo $contactClass; ?>"><a href="/cms/contact">Contact US</a></li>
                </ul>   
            </div>
        </div>
    </nav>
