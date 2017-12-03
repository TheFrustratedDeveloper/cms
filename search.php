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
                    if(isset($_GET['submit'])){
                    $search = $_GET['search'];
                    $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%' AND post_status ='published'";
                    $searchResult = mysqli_query($connect,$query);
                    //to count rows in table = $count = mysqli_num_rows($searchResult);
                                   
                    while($row = mysqli_fetch_assoc($searchResult)){
                        $postTitle = $row['post_title'];
                        $postAuthor = $row['post_author'];
                        $postDate = $row['post_date'];
                        $postImg = $row['post_img'];
                        $postContent = $row['post_content'];
                    ?>
                    <h2>
                    <a href="#"><?php echo $postTitle ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $postAuthor ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo "   ".$postDate ?></p>
                    <hr>
                        <img class="img-responsive" src="images/<?php echo $postImg;?>" alt="">
                    <hr>
                    <p><?php echo $postContent ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                <?php  } 
                    }
                ?>
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