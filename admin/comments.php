<?php include "includes/header.php" ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            All Posts
                            <small>Author_Name</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html"> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <a href="post_list.php"> All Posts</a>
                            </li>
                        </ol>
                    </div>
                    <div style="overflow-x:auto;" class="col-lg-12">
                      <h1 class="display-3">
                          <?php
    
                            
                          ?>   
                      </h1>
                       <table class="table table-bordered table-hover">
                           <th>ID</th>
                           <th>AUTHOR</th>
                           <th>EMAIL</th>
                           <th>DATE</th>
                           <th>CONTENT</th>
                           <th>STATUS</th>
                           <th colspan="3">OPTIONS</th>
                           
                           <?php 
                            
                           ?>
                           <?php 
                           if(isset($_GET['p_id'])){
                               $p_id = $_GET['p_id'];
                               $query = "SELECT post_title FROM posts WHERE post_id = $p_id";
                            $run = mysqli_query($connect,$query);
                            $title = mysqli_fetch_array($run);
                            echo "<h1><a href='../post.php?p_id=$p_id'> ".$title['post_title'] ."</a></h1>";
                               $query = "SELECT * FROM comments WHERE cmt_post_id =" . mysqli_real_escape_string($connect,$_GET['p_id']). " ";
                               $showComments = mysqli_query($connect,$query);
                               while($row = mysqli_fetch_assoc($showComments)){
                                   $cmt_id = $row['cmt_id'];
                                   $cmt_author = $row['cmt_author'];
                                   $cmt_email = substr($row['cmt_email'],0,11) ;
                                   $cmt_content = $row['cmt_content'];
                                   $cmt_status = $row['cmt_status'];
                                   $cmt_date = $row['cmt_date'];   
                               echo "<tr><td>$cmt_id</td>";
                               echo "<td>$cmt_author</td>";
                               echo "<td>$cmt_email...</td>";
                               echo "<td>$cmt_date</td>";
                               echo "<td>$cmt_content</td>";
                               echo "<td>$cmt_status</td>";
                               echo "<td><a href='comments.php?approve=$cmt_id&p_id=".$_GET['p_id']." ' class='btn btn-sm btn-primary'>Approve</a></td>";
                               echo "<td><a href='comments.php?disapprove=$cmt_id&p_id=".$_GET['p_id']." 'class='btn btn-sm btn-warning'>Dis-Approve</a></td>";
                               echo "<td><a href='comments.php?remove=$cmt_id&p_id=".$_GET['p_id']." 'class='btn btn-sm btn-danger'>Remove</a></td></tr>";
                               
                               }
                           }
if(isset($_GET['approve'])){
    $apvID = $_GET['approve'];
    $query = "UPDATE comments SET cmt_status = 'approved' WHERE cmt_id = $apvID";
    $apvQuery = mysqli_query($connect,$query);
    if(!$apvQuery){die();}else{
        header("Location:comments.php?p_id=".$_GET['p_id'] ." ");

}
}
if(isset($_GET['disapprove'])){
    $apvID = $_GET['disapprove'];
    $query = "UPDATE comments SET cmt_status = 'dis-approved' WHERE cmt_id = $apvID";
    $apvQuery = mysqli_query($connect,$query);
    if(!$apvQuery){die();}else{
        header("Location:comments.php?p_id=".$_GET['p_id'] ." ");

}
}
if(isset($_GET['remove'])){
    $apvID = $_GET['remove'];
    $query = "DELETE FROM comments WHERE cmt_id = $apvID";
    $apvQuery = mysqli_query($connect,$query);
    if(!$apvQuery){die();}else{
        header("Location:comments.php?p_id=".$_GET['p_id'] ." ");

}
}
                            
                           ?>
                       </table>
                    </div>
                </div>        
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>
