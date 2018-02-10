<?php include "includes/header.php" ?>
    <div id="wrapper">
       <?php 
            
        ?>
        <!-- Navigation -->
        <?php include "includes/nav.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Panel
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>     
                <!-- /.row -->
  
<div class="row">
    <!--   POSTS  -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $postCount = panelCount('posts'); ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post_list.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!--    COMMENTS  -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $cmtCount = panelCount('comments'); ?></div>
                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="cmt_list.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!--    CATEGORIES  -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $catCount = panelCount('category'); ?></div>
                        <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="add_cat.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> 
    <!--    USERS  -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php 
                            if($_SESSION['role'] == 'Admin'){
                                echo $usrCount = subCount('users');  
                            }else{
                                echo $usrCount = countGraph('users','role','Content writer');
                            }
                              ?>
                        </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users_list.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                
<?php
$postPublishedCount     =       countGraph('posts','post_status','published');
$postDraftCount         =       countGraph('posts','post_status','draft');
$postCmtCount           =       countGraph('comments','cmt_status','draft');
$postSubCount           =       subCount('subscribers');
$contentCreaterCount    =       countGraph('users','role','Content writer');
$postPenCount           =       countGraph('users','role','pending');                     
?>
                        <div class="row">
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                    ['Data', 'Count'],
                                    <?php 
                                    $elements = ['Total Posts','Active Posts','Draft Posts','Total Comments','Pending Comments','Categories','Content Writer','Pending','Subscribers Users'];
                                    $elementsCount = [$postCount,$postPublishedCount,$postDraftCount,$cmtCount,$postCmtCount,$catCount,$contentCreaterCount,$postPenCount,$postSubCount];
                                    for($count = 0;$count<9;$count++){
                                       echo "['{$elements[$count]}',$elementsCount[$count]],";
                                    }
                                    ?>
                                    ]);
                                var options = {
                                    chart: {
                                    title: 'Webpage Statics',
                                    subtitle: 'Counts',
                                    }
                                };
                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                            </script>
                            <div class="container-fluid" id="columnchart_material" style="width:'auto'; height:300px;"></div>
                        </div> 
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php" ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>



<script>
    $(document).ready(function(){
        var pusher = new Pusher('7bb18b86772a3dd10359', {
        cluster: 'ap2',
        encrypted: true
        });

        var channel = pusher.subscribe('notifications');
        channel.bind('new_user', function(data) {
        toastr.success(`${data.message} just registered as content writer`);
        console.log(data.message);
        });
    });
</script>