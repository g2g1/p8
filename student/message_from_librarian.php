<?php
include 'header.php';

$usernameSession = $_SESSION['username'];
$query = "UPDATE p8_messages SET read1 = 'yes' WHERE dusername = '$usernameSession';";
$result = mysqli_query($link,$query);
?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Full Name</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    </tr>  
                            <?php
                            $query = "SELECT * FROM p8_messages WHERE dusername = '$usernameSession' ORDER BY id DESC;";
                            $res = mysqli_query($link, $query);
                            while($rows = mysqli_fetch_array($res)){
                                $libUserName = $rows['susername'];
                                $query2 = "SELECT * FROM p8_librarians_registration WHERE username = '$libUserName'";
                                $res2 = mysqli_query($link, $query2);
                                while($rows2 = mysqli_fetch_array($res2)){
                                    $libFullName = $rows2['firstname']." ".$rows2['lastname']; 
                                }

                                echo "

                                    <tr>
                                    <td>".$libFullName."</td>
                                    <td>".$rows['title']."</td>
                                    <td>".$rows['msg']."</td>
                                    
                                    </tr>

                                ";

                            }

                            echo "</table>";
                            
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php
include 'footer.php';
?>