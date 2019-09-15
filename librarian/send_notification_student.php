<?php
session_start();
if(!isset($_SESSION['librarian'])){
    header("Location: login.php");
}

include '../includes/conn.inc.php'; 

include 'header.php';
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
                                <form name="form1" action="send_notification_student.php" method="post" enctype="multipart/form-data" class="col-lg-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select class="form-control" name="dusername">
                                                <?php
                                                $query = "SELECT * FROM p8_students_registration";
                                                $res = mysqli_query($link, $query);

                                                while($rows = mysqli_fetch_array($res)){
                                                    echo "
                                                    <option value='".$rows['username']."'>".$rows['username']."(".$rows['enrollment'].")</option>
                                                    ";
                                                }


                                                ?>    
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" name="title" placeholder="Enter Title"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea type="text" name="msg" class="form-control">

                                                </textarea>    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" value="Send Message">
                                            </td>
                                        </tr>
                                    </table>
                                </form>        


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php
if(isset($_POST['submit1'])){
    $librarian = $_SESSION['librarian'];
    $dusername = $_POST['dusername'];
    $title = $_POST['title'];
    $msg = $_POST['msg'];


    $query = "INSERT INTO p8_messages (susername,dusername,title,msg,read1)
     VALUES ('$librarian','$dusername','$title','$msg','n');";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));

    if($res){
        ?>
        <script type="text/javascript">
            alert("Message sent successfully");
        </script>
         <?php
    }else{
        ?>
        <script type="text/javascript">
            alert("Message couldn't be sent");
        </script>
         <?php
    }
}






include 'footer.php';
?>