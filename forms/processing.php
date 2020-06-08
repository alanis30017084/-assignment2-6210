<?php

require '../connection.php';

if(isset($_POST['submit']))
    {
        // Assign variables and insert into database
        $item_no = mysqli_real_escape_string($connection, $_POST['item_no']);
        $class = mysqli_real_escape_string($connection, $_POST['class']);
        $img = mysqli_real_escape_string($connection, $_POST['img']);
        $procedures = mysqli_real_escape_string($connection, $_POST['procedures']);

        $descriptions = mysqli_real_escape_string($connection, $_POST['descriptions']);
        $extra_1 = mysqli_real_escape_string($connection, $_POST['extra_1']);
        $extra_2 = mysqli_real_escape_string($connection, $_POST['extra_2']);
        $appendix = mysqli_real_escape_string($connection, $_POST['appendix']);

        $sql = "insert into subjects(item_no, class, img, procedures, descriptions, extra_1, extra_2, appendix)
        values('$item_no', '$class', '$img', '$procedures', '$descriptions', '$extra_1', '$extra_2', '$appendix')";
    
        if($connection->query($sql) === TRUE)
        {
            include '../templates/form_header.php';
            echo "
                <div class='container'><br>
                    <div class='card'>
                        <div class='card-body'>
                            <h2>Success! The new entry has been added to the database and will be displayed in the navigation.</h2>
                        </div>
                    </div>
                </div>
            ";
        }
        else
        {
            include '../templates/form_header.php';
            echo "
                <div class='container'><br>
                    <div class='card'>
                        <div class='card-body'>
                            <h2>There was an error submitting the data.</h2>
                            <p>{$connection->error}</p>
                        </div>
                    </div>
                </div>
            ";
        }
    }

    // Added delete functionality
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $del = "delete from subjects where item_no='$id'";

        if($connection->query($del) === TRUE)
        {
            include '../templates/form_header.php';
            echo "
                <div class='container'><br>
                    <div class='card'>
                        <div class='card-body'>
                            <h2>Success! The entry has been deleted.</h2>
                        </div>
                    </div>
                </div>
            ";
        }
        else{
            include '../templates/form_header.php';
            echo "
                <div class='container'><br>
                    <div class='card'>
                        <div class='card-body'>
                            <h2>There was an error deleting this record.</h2>
                            <p>{$connection->error}></p>
                        </div>
                    </div>
                </div>
            ";
        }
    }

    // Added update functionality
    if(isset($_POST['update']))
    {
        $item_no = mysqli_real_escape_string($connection, $_POST['item_no']);
        $class = mysqli_real_escape_string($connection, $_POST['class']);
        $img = mysqli_real_escape_string($connection, $_POST['img']);
        $procedures = mysqli_real_escape_string($connection, $_POST['procedures']);

        $descriptions = mysqli_real_escape_string($connection, $_POST['descriptions']);
        $extra_1 = mysqli_real_escape_string($connection, $_POST['extra_1']);
        $extra_2 = mysqli_real_escape_string($connection, $_POST['extra_2']);
        $appendix = mysqli_real_escape_string($connection, $_POST['appendix']);

        $upd="
            update subjects set item_no='$item_no', class='$class', img='$img', procedures='$procedures', 
            descriptions='$descriptions', extra_1='$extra_1', extra_2='$extra_2', appendix='$appendix'
            where item_no='$item_no'
        ";
        
        if($connection->query($upd) === TRUE)
        {
            include '../templates/form_header.php';
            echo "
                <div class='container'><br>
                    <div class='card'>
                        <div class='card-body'>
                            <h2>Success! The entry has been updated.</h2>
                        </div>
                    </div>
                </div>
            ";
        }
        else
        {
            include '../templates/form_header.php';
            echo "
                <div class='container'><br>
                    <div class='card'>
                        <div class='card-body'>
                            <h2>There was an error updating this record.</h2>
                            <p>{$connection->error}></p>
                        </div>
                    </div>
                </div>
            ";
        }
    }

?>