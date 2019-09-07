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
                                <h2>Books With Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php
                                $i = 0;
                                $query = "SELECT * FROM p8_add_books";
                                $res = mysqli_query($link, $query);
                                echo "<table class='table table-bordered'>
                                            <tr>
                                ";

                                while($rows = mysqli_fetch_array($res)){
                                $i += 1;
                                echo "
                                            <td>
                                                <img src='../librarian/".$rows['books_image']."' width ='100' height='100'>
                                                <br>
                                                <b>".$rows['books_name']."</b>
                                                <br>
                                                <b>Total: ".$rows['books_qty']."</b>
                                                <br>
                                                <b>Available: ".$rows['available_qty']."</b>
                                                <br>
                                                <b><a href='all_student_of_this_books.php?id=".$rows['books_name']."' style='color:red;'>Students associated with this book</a></b>
                                            </td>



                                ";

                                    if($i%4 == 0){
                                        echo "</tr><tr>";
                                    }

                                }
                            
                            echo "
                                        </tr>
                                    </table> 
                            ";

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