<?php include "includes/db_connect.php"; ob_start();?>
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
                    if(isset($_GET['p_id'])){
                        $p_id = $_GET['p_id'];   
                        $selectAllfromPosts = "SELECT * FROM posts WHERE post_id=$p_id";
                        $showAllfromPosts = mysqli_query($connect,$selectAllfromPosts);
                        while($row = mysqli_fetch_assoc($showAllfromPosts)){
                            $postID = $row['post_id'];
                            $postTitle = $row['post_title'];
                            $postAuthor = $row['post_author'];
                            $postDate = $row['post_date'];
                            $postImg = $row['post_img'];
                            $postContent = $row['post_content'];
                            $views_count = $row['views_count'];
                            
                            $updateViews = "UPDATE posts SET views_count = views_count +1 WHERE post_id = $p_id";
                            mysqli_query($connect,$updateViews);
                ?>
                    <h2>
                    <a href="/cms/post/<?php echo $postID?>"><?php echo $postTitle ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $postAuthor ?>"><?php echo $postAuthor ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo "   ".$postDate ?></p>
                    <hr>
                        <img class="img-responsive" src="/cms/images/<?php echo imagePlaceHolder($postImg);?>" alt="">
                    <hr>
                    <p><?php echo $postContent ?></p>
                    <div style="float:right;margin-right:5px;margin-top:5px;">
                        <a class="btn btn-primary" href="#">SHARE&nbsp;&nbsp;&nbsp;<i class="fa fa-share-alt" aria-hidden="true"></i></a>
                    </div>
                    
                <?php } } ?>
                
                <!-- Blog Comments -->
                <?php 
                    if(isset($_POST['createComment'])){
                        $p_id = $_GET['p_id'];
                        $author = $_POST['cmt_author'];
                        $email = $_POST['cmt_email'];
                        $comment = $_POST['cmt_content'];
                        date('d-m-y');
                        
                        if(!empty($author) && !empty($comment)){
                            
                            $query = "INSERT INTO comments(cmt_post_id,cmt_author,cmt_email,cmt_content,cmt_date) VALUES($p_id,'$author','$email','$comment',now())";
                            $commentQuery = mysqli_query($connect,$query);
                            if(!$commentQuery){die("ERROR");}else{
                                echo "  <div class='alert alert-success'>
                                        <strong>Comment Added!</strong>
                                        </div>";
                                header( "refresh:2; url=post.php?p_id=$p_id");
                            }
                        }
                        else{
                            echo "<script type='text/javascript'> alert('Author or Comment section cannot be empty');</script>";
                            header( "refresh:2; url=post.php?p_id=$p_id");
                        }    
                    }
                        
                        
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">NAME</label>
                            <input type="text" name="cmt_author" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-MAIL<sup><span class="fa fa-star"></span></sup></label>
                            <input type="email" name="cmt_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment Here</label>
                            <textarea name="cmt_content" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="createComment" class="btn btn-primary">Submit</button><br><br>
                        <div>
                            <label class="form-control alert-info" for="star"><sup><span class="fa fa-star"></span></sup> Are not mandatory! </label>
                        </div>
                        
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                
                <?php
                    $p_id = $_GET['p_id'];
                    $selectQuery = "SELECT * FROM comments WHERE cmt_post_id = $p_id AND cmt_status = 'approved'";
                    $performSelectQuery = mysqli_query($connect,$selectQuery);
                    if(!$performSelectQuery)die();
                    while($row = mysqli_fetch_assoc($performSelectQuery)){
                        $authorName = $row['cmt_author'];
                        $commentDate = $row['cmt_date'];
                        $authorCmt = $row['cmt_content'];
                ?>
                  <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" width="50" height="50" src="images/users/user.png" alt="image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $authorName; ?>
                            <small><?php echo $commentDate; ?></small>
                        </h4>
                        <?php echo $authorCmt; ?>
                    </div>
                </div> 
                    
                <?php } ?>
                
                
                
                
                
                <!-- Comment -->
                
                
                
                


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