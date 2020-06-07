<?php include "../templates/form_header.php"; ?>
    <p><a href='../index.php'>Back to index</a></p>
    <h1>ADD NEW SCP RECORD</h1>
    <h3>Use the following fields to enter information of a new SCP to the database.<br>Use \n to separate paragraphs.</h3>
    <hr style="border: 1px solid white;">

    <!-- Form to add content to database -->
    <form class="form-group" method="post" action="processing.php">

    <label>Item Number</label><br>
    <input type="text" class="form-control" name="item_no" placeholder="SCP-####" pattern="[a-zA-Z0-9-]+" required>
    <br>
    <label>Class</label><br>
    <input type="text" class="form-control" name="class" placeholder="Safe/Euclid/Keter/Thaumiel/Neutralized" required>
    <br>
    <label>Image</label>
    <input type="text" class="form-control" name="img" placeholder="Submit image link">
    <br>
    <label>Containment Procedures</label><br>
    <textarea class="form-control" rows="5" name="procedures" required></textarea>
    <br>
    <label>Description</label><br>
    <textarea class="form-control" rows="5" name="descriptions" required></textarea>
    <br>
    <label>Additional Material</label><br>
    <textarea class="form-control" rows="5" name="extra_1"></textarea>
    <br>
    <label>Additional Material</label><br>
    <textarea class="form-control" rows="5" name="extra_2"></textarea>
    <br>
    <label>References/Appendices</label><br>
    <textarea class="form-control" rows="5" name="appendix"></textarea>
    <br>
    <input type="submit" class="btn btn-danger" name="submit" value="Add SCP to database">
    </form>
    
    <?php include '../templates/footer.php'; ?>