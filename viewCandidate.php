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
<?php $page = "viewcandidate"; include ('nav.php'); ?>
<div class="container">

    <div id="signupbox" style=" margin-top:10px" class="mainbox col-md-12  col-sm-8 ">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Manage All Candidates</div>

            </div>
            <div class="panel-body" >
              <table class="table table-bordered table-striped table-hover" style="width: 100%; table-layout: auto;">
                <thead>
                  <tr>
                    <th style="width: 15%;">Candidate's Name</th>
                    <th style="width:5%">Gender</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 5%;">Contact</th>
                    <th style="width: 10%;">Qualification</th>
                    <th style="width: 5%;">Age</th>
                    <th style="width: 25%;">Address</th>
                    <th style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($viewCandidates as $viewCandidate): ?>
                  <tr>
                    <td style="vertical-align: middle;"><?php echo $viewCandidate['cand_name']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $viewCandidate['cand_gender']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $viewCandidate['cand_email']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $viewCandidate['cand_phone']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $viewCandidate['cand_qualification']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $viewCandidate['cand_age']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $viewCandidate['cand_address']; ?></td>
                    <td style="vertical-align: middle;">
                      <a href="takeExam.php?id=<?php echo $viewCandidate['cand_id']; ?>" style="width: 100px; border-radius:0%" class="btn btn-primary">Interview</a>
                      <a href="viewReport.php?id=<?php echo $viewCandidate['cand_id']; ?>" style="width: 100px; margin-top: 5px; border-radius:0%" class="btn btn-success">View Report</a>
                      <a href="delete.php?action=deletecand&id=<?php echo $viewCandidate['cand_id']; ?>" style="width: 100px; margin-top: 5px; border-radius:0%" class="btn btn-danger">Remove</a>
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