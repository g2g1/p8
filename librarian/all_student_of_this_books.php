<?php
session_start();
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
                            <?php
                            $id = $_GET['id'];
                            $query = "SELECT * FROM p8_issue_books WHERE books_name = '$id' AND
                            books_return_date = ''";
                            $res = mysqli_query($link, $query);

                            echo "
                            <table class='table table-bordered'>
                                <tr>
                                <th>Student Name</th>
                                <th>Student Enrollment</th>
                                <th>Books Name</th>
                                <th>Student Email</th>
                                <th>Student Contact</th>
                                <th>Books issue date</th>
                                </tr>

                            ";


                            while($rows = mysqli_fetch_array($res)){
                                echo "
                                <tr>
                                <td>".$rows['student_name']."</td>
                                <td>".$rows['student_enrollment']."</td>
                                <td>".$rows['books_name']."</td>
                                <td>".$rows['student_email']."</td>
                                <td>".$rows['student_contact']."</td>
                                <td>".$rows['books_issue_date']."</td>
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