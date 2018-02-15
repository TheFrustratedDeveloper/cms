                 <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post" class="collapse">
                            <li>
                                <a href="post_list.php?source=add_post">Add Post</a>
                            </li>
                            <li>
                                <a href="post_list.php">View All Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="add_cat.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    <li>
                        <a href="cmt_list.php"><i class="fa fa-fw fa-comment"></i> Comments</a>
                    </li>
                    <?php 
                      if($_SESSION['role'] == 1){
                          ?>
                          <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> User <i class="fa fa-fw fa-sort-desc"></i></a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="users_list.php?source=add_user">Add User</a>
                            </li>
                            <li>
                                <a href="users_list.php">View All Users</a>
                            </li>
                        </ul>
                    </li>
                          <?php
                      }else{
                        ?>
                            <li></li>
                        <?php  
                      }  
                    ?>
                    <li style="background-color:#337ab7;"><a  style="color:white;"href="">Users Online : <span  class="userOnline"> </span> </a></li>
                </ul>
            </div>