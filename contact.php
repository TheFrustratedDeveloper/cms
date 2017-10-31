<?php  include "includes/db_connect.php"; include "includes/header.php"; ?>
<?php 

if(isset($_POST['sendMessage'])){
    $to = "dhruvsaaaxena.1998@gmail.com";
    $subject = $_POST['subject'];
    $txt = $_POST['message'];
    $from = $_POST['email'];
    $headers = "From: $from ";
    
    mail($to,$subject,$txt,$headers);
}
?>
    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact US</h1>
                     <form action="contact.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="fname">Name</label>
                                    <input type="text" class="form-control" required name="name">
                                </div>
                                <div class="form-group">
                                    <label for="author">E-Mail</label>
                                    <input type="email" class="form-control" required name="email">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" required name="subject">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="" cols="30" rows="8" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Submit" name="sendMessage" class="btn btn-lg btn-success">
                                </div>
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>

<? php include "includes/footer.php"; ?>
