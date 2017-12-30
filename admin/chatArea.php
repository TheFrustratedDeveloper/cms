<?php include "includes/header.php" ?>
<?php 
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username' ";
        $run = mysqli_query($connect,$query);

    }
    
?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Messages
                            <small><?php echo $username; ?> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html"> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> <a href="post_list.php"> Profile </a>
                            </li>
                        </ol>
                    </div>
                    
                    <div style="overflow-x:auto;" class="col-lg-12">
                    <div class="col-lg-8">
                        <!-- <div class="chatArea">
                        <div class="position-fixed">
                            You are chatting with <?php echo $_SESSION['username'];?>
                            <hr/>
                        </div> -->
                            
                        </div>
                        <!-- <form name="chatForm" id="chatForm" method="post" enctype="multipart/form-data">
                            <textarea autofocus id="message" class="chatText" name="" cols="30" rows="6"></textarea>
                        </form> -->
                        <script>
                        
                            function loadMessages(){
                                $.post('includes/sendMessage.php?action=loadMessage',function(response){
                                    $('.chatArea').html(response);
                                })
                            }
                            $('.chatText').keyup(function(e){ //passing an event
                                if(e.which == 13){  //13 is ascii value of ENTER
                                   $('form').submit(); 
                                }
                            })
                            $('form').submit(function(){
                                var message = document.getElementById('message').value;
                                $.post('includes/sendMessage.php?action=message&message='+message,function(response){
                                    if(response == 0){
                                        loadMessages();  
                                        document.getElementById('chatForm').reset();
                                    }
                                });
                                return false;
                            })
                        </script>
                    </div>
                    <div class="col-lg-4">
                    <!-- All available users to chat with -->
                    </div>
                    
                    </div>
                </div>        
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>
