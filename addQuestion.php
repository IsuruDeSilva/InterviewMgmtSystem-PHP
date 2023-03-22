<?php
  include_once ("inc/classes/session.php");
  include ("inc/classes/Create.php");

  $userSession = new Session();
  if ($userSession->getSession('login') != true) {
    header('Location: login.php');
  }
  $userSession->destroy();
  $create = new Create();
  $addQuestion = $create->createQuestion($_POST);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Questions</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>

<!------ Include the above in your HEAD tag ---------->
<?php $page = "addquestion"; include ('nav.php'); ?>
<div class="container">

<div style="width: 50%; margin: 25px auto;">
  <?php
    if (isset($addQuestion)) {
      echo $addQuestion;
    }
  ?>
</div>


    <div id="signupbox" style=" margin-top:10px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Add New Interview Question</div>

            </div>
            <div class="panel-body" >
                <form method="post" action="">

                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Add a Question<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="question" name="question" placeholder="Add a Question" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="addQuestion" value="Add New Question" class="btn btn-primary btn btn-primary" style="border-radius:0%" id="addQuestion" />
                            </div>
                        </div>



                </form>
            </div>
        </div>
    </div>
</div>
</div>
  </body>
</html>

<p class="text-center top_spac"> Developed by Isuru De Silva</p>