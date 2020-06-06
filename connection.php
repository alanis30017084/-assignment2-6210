<?php
    $user = "a3001708_user";
    $pw = "Toiohomai1234";
    $db = "a3001708_foundation";

    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));
    $result = $connection->query("select * from subjects") or die($connection->error);

    if(isset($_POST['submit']))
    {
        // Assign variables and insert into database
        $item_no = $_POST['item_no'];
        $class = $_POST['class'];
        $img = $_POST['img'];
        $procedures = $_POST['procedures'];

        $descriptions = $_POST['descriptions'];
        $extra_1 = $_POST['extra_1'];
        $extra_2 = $_POST['extra_2'];
        $appendix = $_POST['appendix'];

        $sql = "insert into subjects(item_no, class, img, procedures, descriptions, extra_1, extra_2, appendix)
        values('$item_no', '$class', '$img', '$procedures', '$descriptions', '$extra_1', '$extra_2', '$appendix')";
    
        if($connection->query($sql) === TRUE)
        {
            include 'templates/form_header.php';
            echo "<h2>SCP Added</h2>
            <p><a href='index.php'>Back to index</a></p>";
            include 'templates/footer.php';
        }
        else
        {
            include 'templates/form_header.php';
            echo "<h2>Error submitting data</h2>
            <p>{$connection->error}</p>
            <p><a href='form.php'>Back to form</a></p>";
            include 'templates/footer.php';
        }
    }

    // Added delete functionality
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $del = "delete from subjects where item_no='$id'";

        if($connection->query($del) === TRUE)
        {
            include 'templates/form_header.php';
            echo "<p>Record deleted successfully. <a href='index.php'>Return to main page</a></p>";
            include 'templates/footer.php';
        }
        else{
            echo "
            <p>There was an error deleting this record.</p>
            <p>{$connection->error}></p>
            <p><a href='index.php'>Return to main page</a></p>            
            ";
        }
    }

    // Added update functionality
    if(isset($_POST['update']))
    {
        $item_no = $_POST['item_no'];
        $class = $_POST['class'];
        $img = $_POST['img'];
        $procedures = $_POST['procedures'];

        $descriptions = $_POST['descriptions'];
        $extra_1 = $_POST['extra_1'];
        $extra_2 = $_POST['extra_2'];
        $appendix = $_POST['appendix'];

        $upd="
            update subjects set item_no='$item_no', class='$class', img='$img', procedures='$procedures', 
            descriptions='$descriptions', extra_1='$extra_1', extra_2='$extra_2', appendix='$appendix'
            where item_no='$item_no'
        ";
        
        if($connection->query($upd) === TRUE)
        {
            include 'templates/form_header.php';
            echo "<h2>SCP Updated</h2>
            <p><a href='index.php'>Back to index</a></p>";
            include 'templates/footer.php';
        }
        else
        {
            include 'templates/form_header.php';
            echo "<h2>Error updating data</h2>
            <p>{$connection->error}</p>
            <p><a href='index.php'>Back to main</a></p>";
            include 'templates/footer.php';
        }
    }
?>