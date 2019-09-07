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
                                <form action="" name="form1" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select name="enr" class="form-control">
                                                <?php
                                                    $query = "SELECT student_enrollment FROM p8_issue_books WHERE books_return_date = ''";
                                                    $res = mysqli_query($link, $query);
                                                    while($rows = mysqli_fetch_array($res)){
                                                        echo "
                                                            <option>".$rows['student_enrollment']."</option>

                                                        ";
                                                    }


                                                ?>
                                                </select> 

                                            </td>
                                            <td>        
                                                <input type="submit" name="submit1" value="search" style="background-color: blue;color: white;" class="form-control">


                                            </td>
                                        </tr>
                                    </table>
                                </form>

                                <?php
                                if (isset($_POST['submit1'])) {
                                    $enr = $_POST['enr'];
                                    $query = "SELECT * FROM p8_issue_books WHERE student_enrollment = '$enr' AND books_return_date = '';";
                                    $res = mysqli_query($link, $query);

                                    echo "
                                    <table class='table table-bordered'>
                                        <th>Student Enrollment</th>
                                        <th>Student Name</th>
                                        <th>Student Sem</th>
                                        <th>Student Contact</th>
                                        <th>Student Email</th>
                                        <th>Books Name</th>
                                        <th>Books Issue Date</th>
                                        <th>Return Book</th>

                                    ";


                                    while($rows = mysqli_fetch_array($res)){
                                        echo "
                                            <tr>
                                            <td>".$rows['student_enrollment']."</td>
                                            <td>".$rows['student_name']."</td>
                                            <td>".$rows['student_sem']."</td>
                                            <td>".$rows['student_contact']."</td>
                                            <td>".$rows['student_email']."</td>
                                            <td>".$rows['books_name']."</td>
                                            <td>".$rows['books_issue_date']."</td>
                                            <td><a href='return.php?id=".$rows['id']."'>Return</a></td>
                                            </tr>
                                        ";
                                    }

                                    echo "</table>";

                                }



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