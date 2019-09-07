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
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <form action="display_books.php" method="post" name="form1">
                                <input type="text" name="search" />
                                <input type="submit" name="submit1" value="Search" />

                            </form>    
                                <?php

                            if(isset($_POST['submit1'])){
                                $search = $_POST['search'];
                              

                                $query = "SELECT * FROM p8_add_books WHERE (books_name LIKE '%$search%');";
                                $stmt = mysqli_query($link, $query);
                                


                                echo "<table class='table table-bordered'>
                                            <tr><th>Books Name</th>  
                                            <th>Image</th>  
                                            <th>Author</th>  
                                            <th>Publication Name</th>  
                                            <th>Purchase Date</th>  
                                            <th>Price</th>  
                                            <th>Quantity</th>  
                                            <th>Available Quantity</th>  
                                            <th>Librarian</th></tr>  
                                ";
                                while ($rows = mysqli_fetch_array($stmt)) {
                                    echo " <tr>
                                            <td>".$rows['books_name']."</td>  
                                            <td><img src='".$rows['books_image']."' width='50' height='50'></td>  
                                            <td>".$rows['books_author_name']."</td>  
                                            <td>".$rows['books_publication_name']."</td>  
                                            <td>".$rows['books_purchase_date']."</td>  
                                            <td>".$rows['books_price']."</td>  
                                            <td>".$rows['books_qty']."</td>  
                                            <td>".$rows['available_qty']."</td>  
                                            <td>".$rows['librarian_username']."</td>  
                                            </tr>
                                    ";
                                }

                                echo "</table>";

                                }else{

                                $query = "SELECT * FROM p8_add_books;";
                                $stmt = mysqli_query($link, $query);
                                


                                echo "<table class='table table-bordered'>
                                            <tr><th>Books Name</th>  
                                            <th>Image</th>  
                                            <th>Author</th>  
                                            <th>Publication Name</th>  
                                            <th>Purchase Date</th>  
                                            <th>Price</th>  
                                            <th>Quantity</th>  
                                            <th>Available Quantity</th>  
                                            <th>Librarian</th></tr>  
                                ";
                                while ($rows = mysqli_fetch_array($stmt)) {
                                    echo " <tr>
                                            <td>".$rows['books_name']."</td>  
                                            <td><img src='".$rows['books_image']."' width='50' height='50'></td>  
                                            <td>".$rows['books_author_name']."</td>  
                                            <td>".$rows['books_publication_name']."</td>  
                                            <td>".$rows['books_purchase_date']."</td>  
                                            <td>".$rows['books_price']."</td>  
                                            <td>".$rows['books_qty']."</td>  
                                            <td>".$rows['available_qty']."</td>  
                                            <td>".$rows['librarian_username']."</td>  
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