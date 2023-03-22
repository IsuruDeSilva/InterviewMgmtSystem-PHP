<?php
  include_once ("inc/classes/session.php");
  include ("inc/classes/View.php");
  include ("inc/classes/Create.php");

  $userSession = new Session();
  if ($userSession->getSession('login') != true) {
    header('Location: login.php');
  }
  $userSession->destroy();

  $view = new View();
  $create = new Create();
  $viewQuestions = $view->viewEditQuestions();
  $create->editQuestion($_POST);
  //var_dump($viewCandidates);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Question</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>

<!------ Include the above in your HEAD tag ---------->
<?php $page = "viewquestion"; include ('nav.php'); ?>
<div class="container">

    <div id="signupbox" style=" margin-top:10px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Edit Interview Question</div>

            </div>
            <div class="panel-body" >
              <form class="" action="" method="post">
              <table class="table table-bordered" style="width: 100%; table-layout: auto;">
                <thead>
                  <tr>
                    <th style="width: 10%;">#</th>
                    <th style="width: 80%;">Question</th>
                    <th style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($viewQuestions as $viewQuestion): ?>
                  <tr>
                    <td><?php $i += 1; echo $i; ?></td>
                    <td><input style="width: 100%;" type="text" class="form-control" name="question" value="<?php echo $viewQuestion['question']; ?>"></td>
                    <td><input value="Submit" name="editQuestion" style="width: 100px; border-radius:0%" type="submit" class="btn btn-primary"></td>
                  </tr>
                  <?php endforeach; ?>


                </tbody>
              </table>
              </form>
            </div>
        </div>
    </div>
</div>
</div>
  </body>
</html>
