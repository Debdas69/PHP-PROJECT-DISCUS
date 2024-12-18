<!DOCTYPE html>
<html lang="en">

<head>
   <title>Discuss Project</title>
   <?php include('./client/commonFiles.php') ?>
</head>

<body>
   <?php
   session_start();
   include('./client/header.php');

   // Check for the 'signup' query parameter
   if (isset($_GET['signup']) && !isset($_SESSION['user']['username'])) {
      include('./client/signup.php');
   // Check for the 'login' query parameter
   } else if (isset($_GET['login']) && !isset($_SESSION['user']['username'])) {
      include('./client/login.php');
   // Check for the 'ask' query parameter
   } else if (isset($_GET['ask'])) {
      include('./client/ask.php');
   // Check for the 'q-id' query parameter
   } else if (isset($_GET['q-id'])) {
      $qid = $_GET['q-id'];
      include('./client/question-details.php');
   // Check for the 'c-id' query parameter
   } else if (isset($_GET['c-id'])) {
      $cid = $_GET['c-id'];
      include('./client/questions.php');
   // Check for the 'u-id' query parameter
   } else if (isset($_GET['u-id'])) {
      $uid = $_GET['u-id'];
      include('./client/questions.php');
   // Check for the 'latest' query parameter
   } else if (isset($_GET['latest'])) {
      include('./client/questions.php');
   // Check for the 'search' query parameter
   } else if (isset($_GET['search'])) {
      $search  = $_GET['search'];
      include('./client/questions.php');
   // Default case if none of the above query parameters are set
   } else {
      include('./client/questions.php');
   }
   ?>
</body>

</html>
