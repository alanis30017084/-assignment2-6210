<?php include "templates/form_header.php"; ?>

    <!-- Form to add content to database -->

    <?php

        include "connection.php";
        $item_no = trim($_GET['update'], "'");
        $record = $connection->query("select * from subjects where item_no='$item_no'") or die($connection->error());
        $row = $record->fetch_assoc();
    
    ?>
    <h1>UPDATE RECORD <?php echo $row['item_no'];?></h1>
    <h3>Use the following fields to update information of an SCP entry.<br>Use \n to separate paragraphs.</h3>
    <hr style="border: 1px solid white;">

    <form class="form-group" method="post" action="connection.php">
    <input type="hidden" name="item_no" value="<?php echo $row['item_no']; ?>">

    <label>Class</label><br>
    <input type="text" class="form-control" name="class" value="<?php echo $row['class']; ?>">
    <br>
    <label>Image</label>
    <input type="text" class="form-control" name="img" value="<?php echo $row['img']; ?>">
    <br>
    <label>Containment Procedures</label><br>
    <textarea class="form-control" rows="5" name="procedures" placeholder="<?php echo $row['procedures']; ?>"><?php echo $row['procedures']; ?></textarea>
    <br>
    <label>Description</label><br>
    <textarea class="form-control" rows="5" name="descriptions" placeholder="<?php echo $row['descriptions']; ?>"><?php echo $row['descriptions']; ?></textarea>
    <br>
    <label>Additional Material</label><br>
    <textarea class="form-control" rows="5" name="extra_1" placeholder="<?php echo $row['extra_1']; ?>"><?php echo $row['extra_1']; ?></textarea>
    <br>
    <label>Additional Material</label><br>
    <textarea class="form-control" rows="5" name="extra_2" placeholder="<?php echo $row['extra_2']; ?>"><?php echo $row['extra_2']; ?></textarea>
    <br>
    <label>References/Appendices</label><br>
    <textarea class="form-control" rows="5" name="appendix" placeholder="<?php echo $row['appendix']; ?>"><?php echo $row['appendix']; ?></textarea>
    <br>
    <input type="submit" class="btn btn-warning" name="update" value="Update SCP entry">
    </form>
    
    <?php include 'templates/footer.php'; ?>