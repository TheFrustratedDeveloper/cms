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
                            Add Category
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php"> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <a href="add_cat.php"> Add Category</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat">Category Name</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <?php create_category(); ?><!-- to create category -->
                            <input class="btn btn-primary" type="submit" name="submit" value="Submit"><br><br><br>
                            <?php update_category(); ?><!-- to show the selected category in textfield and update it -->
                        </div>
                    </form>
                </div>
                <!-- /.row -->
                <!-- /.table -->
                <div class="col-sm-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td><b>Cat_id</b></td>
                            <td><b>Cat_title</b></td>
                            <td colspan="2"><b>Options</b></td>
                        </tr>
                    </thead>
                    <tbody>
                       <?php //to delete the selected category direct from table
                            delete_category();
                            //to show category in table with options
                            $stmt = mysqli_prepare($connect,"SELECT cat_id,cat_title FROM category");
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt,$catID,$catTitle);
                            while(mysqli_stmt_fetch($stmt)){
                                echo "<tr>";
                                echo "<td>$catID</td>";
                                echo "<td>$catTitle</td>";
                            ?>
                            <form method="post">
                                <input type="hidden" name="deleteID" value="<?php echo $catID ;?>" > <?php 
                                echo "<td><input type='submit' class ='btn btn-danger  form-control' name='delete' value='Delete'></td>"; ?>
                            </form>
                            <?php
                                // echo "<td><a class='btn btn-danger form-control' href='add_cat.php?delete=$catID&title=$catTitle'>Delete</a></td>";
                                echo "<td><a class='btn btn-primary form-control' style='margin-left:5px;' href='add_cat.php?edit=$catID&title=$catTitle'>Edit</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>
