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
                                    <table>
                                        <tr>
                                            <td>
                                                <select name="enr" class="form-control selectpicker">
                                                    <?php
                                                    $query = "SELECT enrollment FROM p8_students_registration";
                                                    $stmt = mysqli_query($link, $query);
                                                    while($rows = mysqli_fetch_array($stmt)){
                                                        echo "
                                                            <option>
                                                                ".$rows['enrollment']."
                                                            </option>
                                                        ";
                                                    }

                                                    ?>
                                                </select> 
                                            </td>
                                            <td>
                                                <input type="submit" value="search" name="submit1" class="form-control btn btn-default" style="margin-top:5px;">
                                            </td>    
                                        </tr>


                                    </table>

                                    <?php
                                    if(isset($_POST['submit1'])){
                                        $enr = $_POST['enr'];
                                        $query = "SELECT * FROM p8_students_registration WHERE enrollment = '$enr';";
                                        $res = mysqli_query($link, $query);
                                        while($rows = mysqli_fetch_array($res)){
                                            $firstname = $rows['firstname']; 
                                            $lastname = $rows['lastname']; 
                                            $username = $rows['username']; 
                                            $email = $rows['email']; 
                                            $contact = $rows['contact']; 
                                            $sem = $rows['sem']; 
                                            $firstname = $rows['firstname']; 
                                            $enr = $rows['enrollment'];
                                            $_SESSION['enrollment'] = $enr;
                                            $_SESSION['username'] = $username;
                                        }
                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <input type="text" name="enrollment" value="<?=$enr?>" class="form-control" disabled>
                                            </td>
                                        </tr>      
                                        <tr>                                      
                                            <td>
                                                <input type="text" name="studentname" value="<?php echo $firstname.' '.$lastname ?>" class="form-control" required>
                                            </td>                                            
                                        </tr>

                                        <tr>                                      
                                            <td>
                                                <input type="text" name="studentsem" value="<?=$sem?>" class="form-control" required>
                                            </td>                                            
                                        </tr>

                                        <tr>                                      
                                            <td>
                                                <input type="text" name="studentcontact" value="<?=$email?>" class="form-control" required>
                                            </td>                                            
                                        </tr>
                                        <tr>                                      
                                            <td>
                                                <input type="text" name="studentemail" value="<?=$contact?>" class="form-control" required>
                                            </td>                                            
                                        </tr>
                                        <tr>                                      
                                            <td>
                                                <select name="booksname" class="form-control selectpicker">
                                                <?php
                                                $query = "SELECT books_name FROM p8_add_books";
                                                $stmt = mysqli_query($link, $query);
                                                while($rows = mysqli_fetch_array($stmt)){
                                                    echo "
                                                        <option>".$rows['books_name']."</option>

                                                    ";
                                                }


                                                ?>
                                                </select>
                                            </td>                                            
                                        </tr>

                                        <tr>                                      
                                            <td>
                                                <input type="text" name="booksissuedate" value="<?php echo date('d-m-Y') ?>" class="form-control" required>
                                            </td>                                            
                                        </tr>
                                        <tr>                                      
                                            <td>
                                                <input type="text" name="studentusername" value="<?=$username?>" class="form-control" disabled>
                                            </td>                                            
                                        </tr>
                                        <tr>                                      
                                            <td>
                                                <input type="submit" name="submit2"
                                                class="form-control btn btn-default" value="Issue Books" style="background-color: blue; color:white;" />
                                            </td>                                            
                                        </tr>

                                    </table>




                                    <?php
                                    }

                                    ?>

                                </form>

                                <?php

                                if(isset($_POST['submit2'])){
                                    $enrollment = $_SESSION['enrollment'];
                                    $studentname = $_POST['studentname'];
                                    $studentsem = $_POST['studentsem'];
                                    $studentcontact = $_POST['studentcontact'];
                                    $studentemail = $_POST['studentemail'];
                                    $studentusername = $_SESSION['username'];

                                    $booksname = $_POST['booksname'];
                                    $booksissuedate = $_POST['booksissuedate'];


                                    $query = "INSERT INTO p8_issue_books
                                    (student_enrollment,student_name,student_sem,student_contact,student_email,books_name,books_issue_date,books_return_date,student_username) 
                                    
                                    VALUES('$enrollment','$studentname','$studentsem','$studentcontact','$studentemail','$booksname','$booksissuedate','','$studentusername')";
                                    $stmt = mysqli_query($link, $query);

                                    $query = "UPDATE p8_add_books SET available_qty=available_qty-1 WHERE books_name = '$booksname'";
                                    $res = mysqli_query($link, $query);


                                ?>
                                <script type="text/javascript">
                                    alert("Books issued successfully");
                                    window.location.href = window.location.href;
                                </script>

                                <?php

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