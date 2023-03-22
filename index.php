<?php
  include_once ("inc/classes/session.php");
  include ("inc/classes/View.php");

  $userSession = new Session();
  if ($userSession->getSession('login') != true) {
    header('Location: login.php');
  }
  $userSession->destroy();

  $view = new View();
  $viewCandidates = $view->viewCandidate();
  //var_dump($viewCandidates);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View all Candidates</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
<?php include ('nav.php'); ?>
    <div id="signupbox" style=" margin-top:10px" class="mainbox col-md-12  col-sm-8 ">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">View All Candidates</div>

            </div>
            <div class="panel-body" >
              <table class="table table-bordered" style="width: 100%; table-layout: auto;">
                <thead>
                  <tr>
                    <th style="width: 15%;">Candidate Name</th>
                    <th style="width: 10%;">Candidate Email</th>
                    <th style="width: 5%;">Contact</th>
                    <th style="width: 30%;">Candidate Qualification</th>
                    <th style="width: 5%;">Age</th>
                    <th style="width: 25%;">Candidate Address</th>
                    <th style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($viewCandidates as $viewCandidate): ?>
                  <tr>
                    <td><?php echo $viewCandidate['cand_name']; ?></td>
                    <td><?php echo $viewCandidate['cand_email']; ?></td>
                    <td><?php echo $viewCandidate['cand_phone']; ?></td>
                    <td><?php echo $viewCandidate['cand_qualification']; ?></td>
                    <td><?php echo $viewCandidate['cand_age']; ?></td>
                    <td><?php echo $viewCandidate['cand_address']; ?></td>
                    <td>
                      <a href="takeExam.php?id=<?php echo $viewCandidate['cand_id']; ?>" style="width: 100px;" class="btn btn-primary">Take Exam</a>
                      <a href="viewReport.php?id=<?php echo $viewCandidate['cand_id']; ?>" style="width: 100px; margin-top: 5px;" class="btn btn-success">View Report</a>
                      <a style="width: 100px; margin-top: 5px;" class="btn btn-danger">Remove</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
</div>
  </body>
</html>

<p class="text-center top_spac"> Developed by Isuru De Silva</p>