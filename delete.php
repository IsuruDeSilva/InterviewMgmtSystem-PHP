<?php
  include ("inc/classes/Delete.php");
  $delete = new Delete();

  if (isset($_GET['action']) and $_GET['action'] == 'questiondelete') {
    $delete->deleteQuestion();
  }

  if (isset($_GET['action']) and $_GET['action'] == 'deletecand') {
    $delete->deleteCandidate();
  }
?>
