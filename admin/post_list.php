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
                        
                        <?php 
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            }else{$source='';}
                            switch($source){
                                    case 'add_post';
                                        addNewPost();
                                        include "includes/addPostForm.php";
                                    break ;
                                    case 'edit_post';
                                        editPost();
                                        include "includes/editPostForm.php";
                                    break ;
                                default: include "includes/viewAllPost.php";
                            }
                         ?>
                    </div>
                </div>        
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>
