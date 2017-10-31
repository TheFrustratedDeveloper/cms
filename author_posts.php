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
                    if(isset($_GET['author'])){
                        $author = $_GET['author'];
                    }
                    $selectAllfromPosts = "SELECT * FROM posts WHERE post_status = 'published' AND post_author='$author' ";
                    $showAllfromPosts = mysqli_query($connect,$selectAllfromPosts);
                    while($row = mysqli_fetch_assoc($showAllfromPosts)){
                        $postID = $row['post_id'];
                        $postTitle = $row['post_title'];
                        $postAuthor = $row['post_author'];
                        $postDate = $row['post_date'];
                        $postImg = $row['post_img'];
                        $postContent = substr($row['post_content'],0,500);
                    ?>
                    <h2>
                    <a href="post.php?p_id=<?php echo $postID?>"><?php echo $postTitle ?></a>
                    </h2>
                    <p class="lead">
                        by <?php echo $postAuthor ?>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo "   ".$postDate ?></p>
                    <hr> 
                    <a href="post.php?p_id=<?php echo $postID?>">
                        <img class="img-responsive" src="images/<?php echo $postImg;?>" alt="">
                    </a> 
                    <hr>
                    <p><?php echo $postContent ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $postID?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                <?php  } ?>
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