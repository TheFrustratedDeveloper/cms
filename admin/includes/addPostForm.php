<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove();
    });
}, 4000);
</script>
               <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-lg-5">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="author">Author</label>
                                <input name="author" type="text" value="<?php echo $_SESSION['username'];?>" class="form-control" readonly  >
                            </div>
                        
                            <div class="form-group col-lg-3">
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
                            </div>
                   
                            
                            <div class="form-group">
                                <label for="img">Image</label>
                                <input type="file"  name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date">Content</label>

                                <textarea id="textarea" name="content" class="form-control"><?php echo "<div class='alert alert-danger'>USE FULL SCREEN FOR BETTER USER EXPERIENCE<i class='fa fa-arrows-alt fa-2x' style='margin-left:215px;'aria-hidden='true'></i></div>"; ?></textarea>
                            </div>
                            <div class="row">
                            <div class="form-group col-lg-9">
                                <label for="tag">Tags</label>
                                <input type="text" name="tags" placeholder="Use Comma to Seperate Tags" class="form-control"  required>
                            </div>
                            
                            <div class="form-group col-lg-3">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="draft">Select Post Status</option>
                                    <option value="published">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            </div>
                           <div class="row">
                            <div class="form-group col-md-3 col-md-offset-9">
                                <input type="submit" value="Publish Post" name="publish" class="btn btn-primary form-control">
                            </div>
                            </div>                       
                    </form>