<?php include "templates/header.php"; ?>
    <!-- Database content -->
    <div>
      <?php
        if(isset($_GET['subjects']))
        {
          $item_no = trim($_GET['subjects'], "'");
          $record = $connection->query("select * from subjects where item_no='$item_no'") or die($connection->error());
          $row = $record->fetch_assoc();

          $item_no = $row['item_no'];
          $class = $row['class'];
          $img = $row['img'];
          $procedures = $row['procedures'];
          $descriptions = $row['descriptions'];
          $extra_1 = $row['extra_1'];
          $extra_2 = $row['extra_2'];
          $appendix = $row['appendix'];

          // Added update & delete variables
          $id = $row['item_no'];
          $update = "update.php?update=" . $id;
          $delete = "connection.php?delete=" . $id;

          $procedures = str_replace('\n', '<br><br>', $procedures);
          $descriptions = str_replace('\n', '<br><br>', $descriptions);
          $extra_1 = str_replace('\n', '<br><br>', $extra_1);
          $extra_2 = str_replace('\n', '<br><br>', $extra_2);
          $appendix = str_replace('\n', '<br><br>', $appendix);

          // Added update & delete buttons after SCP entry
          echo "
            <h3><b>Item #:</b> {$item_no}</h3>
            <h3><b>Object Class:</b> {$class}</h3>
            <p><img src='{$img}'</p>
            <h3>Special Containment Procedures:</h3> <p>{$procedures}</p>
            <h3>Descriptions:</h3> <p>{$descriptions}</p>
            <hr style='border: 1px solid white;'><br>
            <p>{$extra_1}</p>
            <p>{$extra_2}</p>
            <p>{$appendix}</p>
            
            <p>
            <a href='{$update}' class='btn btn-warning'>Update</a>
            <a href='{$delete}' class='btn btn-danger'>Delete</a>
          ";
        }
        else
        {
          echo "
            <h1>WARNING: ACCESS TO THIS DATABASE IS FOR AUTHORIZED PERSONNEL ONLY.</h1>
            <p>To continue, select an SCP to view or create a new entry.</p>
          ";
        }

      ?>
    </div>
    <?php include 'templates/footer.php'; ?>