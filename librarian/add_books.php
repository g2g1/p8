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
                        <h3>Add books info</h3>
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

                                <form name="form1" action="add_books.php" method="post" enctype="multipart/form-data" class="col-lg-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><input type="text" name="booksname" class="form-control" placeholder="Books Name" required="" /></td>
                                        </tr>

                                        <tr>
                                            <td><input type="file" name="f1" required="" /></td>
                                        </tr>

                                        <tr>
                                            <td><input type="text" name="bauthorname" class="form-control" placeholder="Books Author Name" required="" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="pname" class="form-control" placeholder="Publication Name" required="" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="bpurchasedt" class="form-control" placeholder="Books Purchase Date" required="" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="bprice" class="form-control" placeholder="Books Price" required="" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="bqty" class="form-control" placeholder="Books Quantity" required="" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="aqty" class="form-control" placeholder="Available quantity" required="" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit1" class="btn btn-default submit" value="insert books details" style="background-color:blue; color:white;" /></td>
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
    $tm = md5(time());

    $fnm = $_FILES['f1']['name'];
    $destination = "./books_images/".$tm.$fnm;
    $destination_name = "books_images/".$tm.$fnm;
    move_uploaded_file($_FILES['f1']['tmp_name'], $destination);

    $booksname = $_POST['booksname'];
    $bauthorname = $_POST['bauthorname'];
    $pname = $_POST['pname']; 
    $bpurchasedt = $_POST['bpurchasedt'];
    $bprice = $_POST['bprice']; 
    $bqty = $_POST['bqty']; 
    $aqty = $_POST['aqty'];

    $librarian = $_SESSION['librarian'];


    $query = "INSERT INTO p8_add_books (books_name,books_image,books_author_name,books_publication_name,books_purchase_date,books_price,books_qty,available_qty,librarian_username) VALUES(
    '$booksname',
    '$destination_name',
    '$bauthorname',
    '$pname',
    '$bpurchasedt',
    '$bprice',
    '$bqty',
    '$aqty',
    '$librarian');";
    $stmt = mysqli_query($link, $query);

    

}






include 'footer.php';
?>