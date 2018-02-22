<?php include "includes/db_connect.php";?>
<?php include "includes/header.php";?>
    <!-- Navigation -->
    <?php include "includes/nav.php";?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <?php
                    
                    $postCounts = "SELECT *  FROM posts WHERE post_status = 'published' ";
                    $showPostsCount = mysqli_query($connect,$postCounts);
                    $count = mysqli_num_rows($showPostsCount);
                    $perPage = 5;
                    $count = ceil($count / $perPage);
                    if($count < 1){
                        echo "<h3 class='text-center text-danger'>NO POSTS</h3>";
                    }else{
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page = "";
                        }

                        if($page == "" || $page == 1){
                            $pageNo = 0;
                        }else{
                            $pageNo = ($page * $perPage) - $perPage;
                        }

                        $selectAllfromPosts = "SELECT * FROM posts where post_status = 'published' ORDER BY post_id DESC LIMIT $pageNo , $perPage ";
                        $showAllfromPosts = mysqli_query($connect,$selectAllfromPosts);
                        while($row = mysqli_fetch_assoc($showAllfromPosts)){
                            $postID = $row['post_id'];
                            $postTitle = $row['post_title'];
                            $postAuthor = $row['post_author'];
                            $postDate = $row['post_date'];
                            $postImg = $row['post_img'];
                            $postContent = substr($row['post_content'],0,500);
                            $postStatus = $row['post_status']; 
                        ?>
                        <h2>
                        <a href="post/<?php echo $postID?>"><?php echo $postTitle ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author_posts.php?author=<?php echo $postAuthor ?>"><?php echo $postAuthor ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo "   ".$postDate ?></p>
                        <hr> 
                        <a href="post.php?p_id=<?php echo $postID?>">
                            <img class="img-responsive" src="images/cover/<?php echo imagePlaceHolder($postImg);?>" alt="">
                        </a> 
                        <hr>
                        <p><?php echo $postContent ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $postID?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                <?php } }?>
                <!-- Pager -->
                <ul class="pagination" style="float:right;">                    
                    <?php 
                        for($i = 1; $i <= $count; $i++){
                            if($i == $page){
                                echo "<li class='active'><a href='index.php?page=$i'>{$i}</a></li>";
                            }
                            else{
                                echo "<li><a href='index.php?page=$i'>{$i}</a></li>";
                            }
                        }
                    ?>
                </ul>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->
        <hr>
<?php include "includes/footer.php"; ?>