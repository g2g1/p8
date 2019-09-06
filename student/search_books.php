<?php
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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="search_books.php" name="form1" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                            
                                            <td><input type="text" name="search" placeholder="Search" class="form-control"></td>
                                            <td><input type="submit" name="submit1" value="Submit" class="form-control btn btn-default" style="background-color: blue; color:white;"></td>
                                        

                                        </tr>
                                        
                                    </table>
                                </form>
                            <?php 
                            if(isset($_POST['submit1'])){
                                $i = 0;
                                $search = $_POST['search'];
                                $query = "SELECT * FROM p8_add_books WHERE books_name LIKE '%$search%'";
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
                                                <b>Available: ".$rows['available_qty']."</b>
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



                            }else{

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
                                                <b>Available: ".$rows['available_qty']."</b>
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