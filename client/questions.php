<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<div class="container">
  <div class="row">
    <div class="col-8">
      <h1 class="heading">Questions</h1>
      <?php
      include("./common/db.php");

      // Initialize variables
      $cid = isset($_GET["c-id"]) ? $_GET["c-id"] : null;
      $uid = isset($_GET["u-id"]) ? $_GET["u-id"] : null;
      $search = isset($_GET["search"]) ? $_GET["search"] : null;

      // Build query based on GET parameters
      if ($cid) {
        $query = "SELECT * FROM questions WHERE category_id=$cid";
      } else if ($uid) {
        $query = "SELECT * FROM questions WHERE user_id=$uid";
      } else if (isset($_GET["latest"])) {
        $query = "SELECT * FROM questions ORDER BY id DESC";
      } else if ($search) {
        $query = "SELECT * FROM questions WHERE `title` LIKE '%$search%'";
      } else {
        $query = "SELECT * FROM questions";
      }

      // Execute the query
      $result = $conn->query($query);

      // Loop through results
      foreach ($result as $row) {
        $title = $row['title'];
        $id = $row['id'];
        echo "<div class='row question-list'>
              <h4 class='my-question'><a href='?q-id=$id'>$title</a>";
        
        // Check if user is logged in and $uid is set
        if ($uid) {
          echo "<a href='./server/requests.php?delete=$id'>Delete</a>";
        }

        echo "</h4></div>";
      }
      ?>
    </div>
    <div class="col-4">
      <?php include('categorylist.php'); ?>
    </div>
  </div>
</div>
