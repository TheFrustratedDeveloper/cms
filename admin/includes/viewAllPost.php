<?php include "deleteModel.php" ?>
<script>
    $(document).ready(function(){
        $('.delete_link').on('click',function(){
            var id = $(this).attr('rel');
            var delete_url = "post_list.php?delete="+id+" ";
            $('.modal_delete_link').attr('href',delete_url);
            $('#myModal').modal('show');
        });
    });
</script>   

<form action="" method="post">                        
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
               <th><input type="checkbox" name="" id="selectAllBoxes"></th>
               <th>ID</th>
                <th>Title</th>
                <th colspan="2">Views</th>
                <th>Author</th>
                <th>Category</th>
                <th>Date</th>
                <th>Status</th>
                <th>Cmts</th>
                <th>Cover</th>
                <th colspan ="2">Publish or Draft </th>
                <th colspan ="2">Options</th>
            </tr>
        </thead>
    <?php
        if($_SESSION['role'] != 'Admin'){
            $author = $_SESSION['username'];
            $selectAllfromPosts = "SELECT posts.post_id,posts.post_title,posts.views_count,posts.post_author,posts.post_date,posts.post_img,posts.post_status,category.cat_title FROM posts LEFT JOIN category on posts.cat_id = category.cat_id WHERE posts.post_author ='$author' ORDER BY posts.post_id DESC";
        }else{
            $selectAllfromPosts = "SELECT posts.post_id,posts.post_title,posts.views_count,posts.post_author,posts.post_date,posts.post_img,posts.post_status,category.cat_title FROM posts LEFT JOIN category on posts.cat_id = category.cat_id ORDER BY posts.post_id DESC";
        }
    //view all post 
    $showAllfromPosts = mysqli_query($connect,$selectAllfromPosts);

    while($row = mysqli_fetch_assoc($showAllfromPosts)){
        $postID = $row['post_id'];
        $cat_title = $row['cat_title'];
        $postTitle = $row['post_title'];
        $postViews = $row['views_count'];
        $postAuthor = $row['post_author'];
        $postDate = $row['post_date'];
        $postImg = $row['post_img'];
        $postStatus = $row['post_status'];
        //Print into table                    
        echo "<tr>";
        echo "<td><input type='checkbox' class='checkboxes' name='checkBoxArray[]' value=$postID></td>";
        echo "<td>$postID</td>";
        echo "<td><a href='../post.php?p_id=$postID'>$postTitle</a></td>";
        echo "<td>$postViews</td>";
        echo "<td><a href='post_list.php?reset=$postID' class= 'btn btn-default fa fa-refresh' title='Reset Views' id='reset' data-toggle='popover' data-trigger='hover' data-content='You can reset Views'>&nbsp;&nbsp;Reset</a></td>";
        echo "<td>$postAuthor</td>";
        echo "<td>$cat_title</td>";
        echo "<td>$postDate</td>";
        echo "<td>$postStatus</td>";
        
        $query = "SELECT * FROM comments WHERE cmt_post_id = '$postID' ";
        $cmtCount = mysqli_query($connect,$query);
        $cmtRows = mysqli_num_rows($cmtCount);
        
        echo "<td><a href='comments.php?p_id=$postID'>$cmtRows</a></td>";
        echo "<td><img width='100' src='../images/$postImg' alt='$postImg'></td>";
        echo "<td class='bg-success'><a class='btn btn-success form-control' href='post_list.php?publish=$postID'>Publish</a></td>";
        echo "<td class='bg-danger'><a class='btn btn-warning form-control' href='post_list.php?draft=$postID'>Draft</a></td>";  
        echo "<td class='bg-info'><a class='btn btn-primary form-control' href='post_list.php?source=edit_post&p_id=$postID'>Edit</a></td>";                      
        ?>
        <form method="post">
            <input type="hidden" name="post_id" value="<?php echo $postID ?>">
        <?php 
            echo "<td><input class='btn btn-danger' name='delete' type='submit' value='Delete'></td>"; 
        ?>       
        </form>
        <?php
        
        
        // echo "<td class='bg-danger'><a rel='$postID' href='javascript:void(0)' class='delete_link btn btn-danger'>Delete</a></td>";
        //echo "<td class='bg-danger'><a onClick=\"javascript : return confirm('Are you Sure to Delete This ?'); \" class='btn btn-danger form-control' href='post_list.php?delete=$postID&title=$postTitle'>Delete</a></td>";
        echo "</tr>";
    }
    if(isset($_GET['reset'])){
        $id = $_GET['reset'];
        $query = "UPDATE posts SET views_count = 0 WHERE post_id = $id";
        $resetViews = mysqli_query($connect,$query);
        header("Location:post_list.php");
    }   
    //delete post
    deletePost();
    //edit post
    publishPost();
    //publish post
    draftPost();
    ?>
     <div id="bulkSelector" class="col-xs-4"  style="padding: 0px;margin-right:5px;">
            <?php
                    if(isset($_POST['checkBoxArray'])){
                        foreach($_POST['checkBoxArray'] as $checkBoxValue){
                            $bulkOption = $_POST['bulkOption'];
                            
                            switch($bulkOption){
                                case 'published':
                                    $query = "UPDATE posts SET post_status = '$bulkOption' WHERE post_id = $checkBoxValue";
                                    $publishPosts = mysqli_query($connect,$query);
                                    if(!$publishPosts){die();}else{header("Location:post_list.php");}
                                break;
                                    
                                case 'draft':
                                    $query = "UPDATE posts SET post_status = '$bulkOption' WHERE post_id = $checkBoxValue";
                                    $draftPosts = mysqli_query($connect,$query);
                                    if(!$draftPosts){die();}else{header("Location:post_list.php");}
                                break;
                                    
                                case 'delete':
                                    $query = "DELETE FROM posts WHERE post_id = $checkBoxValue";
                                    $deletePosts = mysqli_query($connect,$query);
                                    if(!$deletePosts){die();}else{header("Location:post_list.php");}
                                break;
                                    
                                case 'clone':
                                    $query = "SELECT * FROM posts WHERE post_id = $checkBoxValue";
                                    $selectQuery = mysqli_query($connect,$query);
                                    while($row = mysqli_fetch_assoc($selectQuery)){
                                        $cat_id = $row['cat_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_img = $row['post_img'];
                                        $post_content = $row['post_content'];
                                        $post_tag = $row['post_tag'];
                                    }
                                    $cloneQuery = "INSERT INTO posts(post_title,cat_id,post_author,post_img,post_content,post_tag,post_date) VALUES('$post_title',$cat_id,'$post_author','$post_img','$post_content','$post_tag',now())";
                                    $doCloneQuery = mysqli_query($connect,$cloneQuery);
                                    if(!$doCloneQuery){die();}else{header("Location:post_list.php");}
                                break;
                                    
                                default : 
                                    echo "<div class='alert alert-danger'>
                                          <strong>Please Select Atleast One Option</strong>
                                          </div>";
                                header( "refresh:1; url=post_list.php");
                            }
                        }
                    }
                ?>
           <select class="form-control form-group" name="bulkOption">
               <option value="refresh" hidden selected>Select One Option</option>    
               <option value="published">Publish</option>
               <option value="draft">Draft</option>
               <option value="delete">Delete</option>
               <option disabled><hr></option>
               <option value="clone">Clone</option>
           </select>
       </div>
       <div class="col-cs-4">
           <input type="submit" class="btn btn-success" value="Apply">
           <a href="post_list.php?source=add_post" class="btn btn-primary">Add New</a>
       </div>
    </table>
</form>
