<?php

session_start();
if(!isset($_SESSION['librarian'])){
    header("Location: login.php");
}


include 'header.php';
include '../includes/conn.inc.php';

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
                            $query = "SELECT * FROM p8_students_registration ";
                            $stmt = mysqli_query($link, $query);

                            echo "<table class='table table-bordered'>
                            <thead>
                            <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Sem</th>
                            <th>Enrollment</th>
                            <th>Status</th>
                            <th>Approve</th>
                            <th>Disapprove</th>
                            </tr>
                            </thead>
                            <tbody>
                            ";

                            while($rows = mysqli_fetch_array($stmt)){
                                
                            echo "
                            <tr>
                            <td>".$rows['firstname']."</td>
                            <td>".$rows['lastname']."</td>
                            <td>".$rows['username']."</td>
                            <td>".$rows['email']."</td>
                            <td>".$rows['contact']."</td>
                            <td>".$rows['sem']."</td>
                            <td>".$rows['enrollment']."</td>
                            <td>".$rows['status']."</td>
                            <td><a href='approve.php?id=".$rows['id']."'>Accept</a></td>
                            <td><a href='disapprove.php?id=".$rows['id']."'>Decline</a></td>
                            </tr>

                            ";

                                
                            }
                            

                            echo "</tbody></table>";
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