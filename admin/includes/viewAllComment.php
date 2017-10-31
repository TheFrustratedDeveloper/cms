                        <form action="" method="post">
                               <table class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                   <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>In Response to</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th colspan="2">Options</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php 
                                //view all post 
                                viewComments();
                                //delete comment
                                deleteComment();
                                //approve comments
                                approveComment();
                                //dis-approve comment
                                disApproveComment();
                            ?>
                        <div id="bulkSelector" class="col-xs-4"  style="padding: 0px;margin-right:5px;">
                        <?php
                        if(isset($_POST['checkBoxArray'])){
                        foreach($_POST['checkBoxArray'] as $checkBoxValue){
                            $bulkOption = $_POST['bulkOption'];
                            switch($bulkOption){
                                case 'approved':
                                    $query = "UPDATE comments SET cmt_status = '$bulkOption' WHERE cmt_id = $checkBoxValue";
                                    $publishPosts = mysqli_query($connect,$query);
                                    if(!$publishPosts){die();}else{header("Location:cmt_list.php");}
                                break;
                                case 'dis-approved':
                                    $query = "UPDATE comments SET cmt_status = '$bulkOption' WHERE cmt_id = $checkBoxValue";
                                    $draftPosts = mysqli_query($connect,$query);
                                    if(!$draftPosts){die();}else{header("Location:cmt_list.php");}
                                break;
                                case 'delete':
                                    $query = "DELETE FROM comments WHERE cmt_id = $checkBoxValue";
                                    $deletePosts = mysqli_query($connect,$query);
                                    if(!$deletePosts){die();}else{header("Location:cmt_list.php");}
                                break;
                                default : 
                                    echo "<div class='alert alert-danger'>
                                          <strong>Please Select Atleast One Option</strong>
                                          </div>";
                                    header( "refresh:1; url=cmt_list.php");
                            }
                        }
                        }
                        ?>
                        <select class="form-control form-group" name="bulkOption">
                            <option value="refresh" hidden selected>Select One Option</option>    
                            <option value="approved">Approve</option>
                            <option value="dis-approved">Dis-Approve</option>
                            <option value="delete">Delete</option>
                        </select>
                        </div>
                        <div class="col-cs-4">
                        <input type="submit" class="btn btn-success" value="Apply">
                        </div>                            
                        </table>
                        </form>