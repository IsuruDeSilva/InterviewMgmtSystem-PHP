<?php
  include_once ("inc/classes/session.php");
  include ("inc/classes/View.php");
  include ("inc/classes/Create.php");

  $userSession = new Session();
  if ($userSession->getSession('login') != true) {
    header('Location: login.php');
  }
  $userSession->destroy();

  if (!isset($_GET['id'])) {
    header("Location: viewCandidate.php");
  }

  $view = new View();
  $create = new Create();
  $viewQuestions = $view->viewQuestions();
  $viewCandidates = $view->viewCandidate();




  //var_dump($_POST);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Interview Section</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>

<!------ Include the above in your HEAD tag ---------->
<?php $page="viewcandidate"; include ('nav.php'); ?>
<div class="container">

    <div id="signupbox" style=" margin-top:10px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Take Interview</div>

            </div>

            <div class="panel-body" >
              <h2>Candidate Details</h2>

              <table class="table table-bordered" style="width: 100%; table-layout: auto;">
                <thead>
                  <tr>
                    <th style="width: 25%;">Candidate Name</th>
                    <th style="width: 20%;">Candidate Email: </th>
                    <th style="width: 20%;">Candidate Contact: </th>
                    <th style="width: 35%;">Candidate Qualification</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($viewCandidates as $viewCandidate): ?>
                  <?php if (isset($_GET['id']) && $_GET['id'] == $viewCandidate['cand_id']): ?>
                  <tr>
                    <td><?php echo $viewCandidate['cand_name']; ?></td>
                    <td><?php echo $viewCandidate['cand_email']; ?></td>
                    <td><?php echo $viewCandidate['cand_phone']; ?></td>
                    <td><?php echo $viewCandidate['cand_qualification']; ?></td>
                  </tr>

                  <?php endif; ?>

                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
            <div class="panel-body" >
              <form class="" action="" method="post">
                <table class="table table-bordered table-hover" style="width: 100%; table-layout: auto;">
                  <thead>
                    <tr>
                      <th style="width: 10%;">#</th>
                      <th style="width: 60%;">Question</th>
                      <th style="width: 30%;">Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0; foreach ($viewQuestions as $viewQuestion): ?>
                    <tr>
                      <td><?php $i += 1; echo $i; ?></td>
                      <td>
                        <?php echo $viewQuestion['question']; ?>
                        <input type="hidden" name="questionId<?php echo $i; ?>" value="<?php echo $viewQuestion['question_id']; ?>">
                      </td>
                      <td><input type="number" class="form-control" placeholder="Range: 1-10" name="result<?php echo $i; ?>"></td>
                    </tr>
                    <?php endforeach; ?>

                    <tr>
                      <td colspan="2" style="text-align: right; vertical-align: middle; "><b>Comment:</b></td>
                      <td><textarea name="comment" class="form-control" rows="2" cols="20"></textarea></td>
                    </tr>
                    <?php $takeExam = $create->createExam($_POST); ?>
                  </tbody>

                </table>



                <div class="form-group">
                    <div class="aab controls col-md-5 "></div>
                    <div class="controls col-md-4 ">
                        <input type="submit" name="submitReport" value="Submit" style="border-radius:0%" class="btn btn-primary btn btn-primary" id="addQuestion" />
                    </div>
                </div>
              </form>

            </div>
        </div>
    </div>
</div>
</div>
<p class="text-center top_spac"> Developed by Isuru De Silva</p>
  </body>
</html>
