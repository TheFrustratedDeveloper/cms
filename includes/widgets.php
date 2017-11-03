                <?php 
                    if(isset($_SESSION['username'])){
                        echo "";
                    }else{
                        ?>
                <div class="panel panel-primary" style="position:sticky;top:0;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3" style="color:#e1ede5;">
                                    <i class="fa fa-pencil-square-o fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3" style="color:#e1ede5;">Content Writer ?</div>
                                </div>
                            </div>
                        </div>
                        <a href="/cms/registration" class="text-primary">
                            <div class="panel-footer">
                                <span class="pull-left">Join Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>                  
                    <?php
                    }
                ?>
                