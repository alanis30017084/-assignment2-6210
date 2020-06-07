<?php include "templates/header.php"; ?>
    <!-- Database content -->
    <div class='container'><br>
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
          $update = "forms/update.php?update=" . $id;
          $delete = "forms/processing.php?delete=" . $id;

          $procedures = str_replace('\n', '<br><br>', $procedures);
          $descriptions = str_replace('\n', '<br><br>', $descriptions);
          $extra_1 = str_replace('\n', '<br><br>', $extra_1);
          $extra_2 = str_replace('\n', '<br><br>', $extra_2);
          $appendix = str_replace('\n', '<br><br>', $appendix);

          // Added update & delete buttons after SCP entry
          echo "

            <div class='card'>
              <img class='card-img-top' src='{$img}'>
              <div class='card-body'>
              <h5 class='card-title'>Item #: {$item_no}</h5>
              <h6 class='card-subtitle mb-2 text-muted'>Object Class: {$class}</h6>
              <br>
              <p class='card-text'><b>Special Containment Procedures:</b><br> {$procedures}</p>
              <p class='card-text'><b>Description:</b><br> {$descriptions}</p>
              <hr>
              <p class='card-text'>
                <p>{$extra_1}</p>
                <p>{$extra_2}</p>
                <p>{$appendix}</p>
              </p>           
              <a href='{$update}' class='card-link btn btn-outline-success' type='button'>Update</a>
              <a href='{$delete}' class='card-link btn btn-outline-danger' type='button'>Delete</a>
              </div>
            </div><br>
          ";
        }
        else
        {
          echo "
          <div class='card'>
            <div class='card-body'>
              <h1>WARNING: ACCESS TO THIS DATABASE IS FOR AUTHORIZED PERSONNEL ONLY.</h1>
              <h3>To continue, select an SCP to view or create a new entry.</h3>
            </div>
          </div><br><br><br><br><br><br><br><br><br><br><br>
          ";
        }

      ?>
    </div>
    <?php include 'templates/footer.php'; ?>