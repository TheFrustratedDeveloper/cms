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
                if(isset($_GET['s_id'])){
                    $sideBarID = $_GET['s_id'];
                    if($sideBarID == null){
                        header("Location:index.php");
                    }
                    
                    
                    $stmt = mysqli_prepare($connect,"SELECT post_id,post_title,post_author,post_date,post_img,post_content FROM posts WHERE cat_id = ? AND post_status = ? ");
                    $status = 'published';

                    mysqli_stmt_bind_param($stmt,"is",$sideBarID,$status);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt,$postI,$postTitle,$postAuthor,$postDate,$postImg,$postContent);
                    
                    
                    // if(mysqli_stmt_num_rows($stmt) === 0){
                    //     echo "<h2 class='text-center text-danger'>No posts related to this category</h2>";
                    // }else{
                    //     echo " ds";
                    // }
                    

                    

                    while(mysqli_stmt_fetch($stmt)):
                
                    ?>
                    <h2>
                    <a href="post.php?p_id=<?php echo $postID?>"><?php echo $postTitle ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $postAuthor ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo "   ".$postDate ?></p>
                    <hr> 
                    <a href="post.php?p_id=<?php echo $postID?>">
                        <img class="img-responsive" src="/cms/images/<?php echo $postImg;?>" alt="">
                    </a> 
                    <hr>
                    <p><?php echo $postContent ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                    <?php endwhile;  } else{
                    header("Location:index.php");
                } ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->
        <hr>
<?php include "includes/footer.php"; ?>