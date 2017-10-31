<?php 
if(isset($_GET['p_id'])){
    $p_id = $_GET['p_id'];
    }
        $selectAllfromPosts = "SELECT * FROM posts WHERE post_id = $p_id";
        $showAllfromPosts = mysqli_query($connect,$selectAllfromPosts); 
        while($row = mysqli_fetch_assoc($showAllfromPosts)){
            $postID = $row['post_id'];
            $catID = $row['cat_id'];
            $postTitle = $row['post_title'];
            $postAuthor = $row['post_author'];
            $postDate = $row['post_date'];
            $postImg = $row['post_img'];
            $postTag = $row['post_tag'];
            $postContent = $row['post_content'];
            $postStatus = $row['post_status'];            
        }
        $catQuery = "SELECT * FROM category WHERE cat_id = $catID";
        $doCatQuery = mysqli_query($connect,$catQuery);
        $select = mysqli_fetch_assoc($doCatQuery);
        $selectTitle = $select['cat_title'];

?>
                                    
                          <form action="" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                                <label for="title">Title</label>
                                <input value="<?php echo $postTitle ?>" type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="catID">Category</label>
                                <select class="form-control" name="category_id" id="">
                                    <option value="<?php echo $catID ; ?> " hidden selected><?php echo $selectTitle ; ?></option>
<?php 
$selectAllfromCat = "SELECT * FROM category";
$showAllfromCat = mysqli_query($connect,$selectAllfromCat); 
while($row = mysqli_fetch_assoc($showAllfromCat)){
    $catID = $row['cat_id'];
    $catTitle = $row['cat_title'];
    echo "<option value='$catID'>$catTitle</option>";
}
                                       
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input value="<?php echo "$postAuthor" ?>" type="text" class="form-control" name="author" readonly>
                            </div>
                            <div class="form-group">
                                <label for="img">Image</label>
                                <img src="../images/<?php echo "$postImg" ?>" width="200" style="margin-bottom:15px;">
                                <input type="file" name="image" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label for="date">Content</label>
                                <textarea style="height:350px;" name="content" class="form-control"><?php echo "$postContent" ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                <input type="text" value="<?php echo "$postTag" ?>" name="tags" placeholder="Use Comma to Seperate Tags" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" value="<?php echo "$postStatus" ?>" class="form-control" name="status">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Edit Post" name="Edit" class="btn btn-success">
                            </div>
                    </form>