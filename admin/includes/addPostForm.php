               <form action="" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="catID">Category</label>
                                <select class="form-control" name="category_id">
                                    <option hidden value="" selected> Select One </option>
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
                                <input name="author" type="text" value="<?php echo $_SESSION['username'];?>" class="form-control" readonly  >
                            </div>
                            <div class="form-group">
                                <label for="img">Image</label>
                                <input type="file"  name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Content</label>
                                <textarea style="height:350px;" name="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                <input type="text" name="tags" placeholder="Use Comma to Seperate Tags" class="form-control"  required>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="draft">Select Post Status</option>
                                    <option value="published">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Publish Post" name="publish" class="btn btn-success">
                            </div>
                    </form>