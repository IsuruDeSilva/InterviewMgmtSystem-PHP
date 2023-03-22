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
    <title>Home</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>
  <body>

<!------ Include the above in your HEAD tag ---------->
<?php $page = "home"; include ('nav.php'); ?>
<div class="container">
  <div class="row">
    <br>
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-user-circle"></i>
        <span class="count-numbers"><?php include 'counter/countAdmin.php'?></span>
        <span class="count-name">System Users</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-users"></i>
        <span class="count-numbers"><?php include 'counter/countCandidates.php'?></span>
        <span class="count-name">Candidates</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-list-alt"></i>
        <span class="count-numbers"><?php include 'counter/countQuestions.php'?></span>
        <span class="count-name">Questions</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-comments-o"></i>
        <span class="count-numbers"><?php include 'counter/countComments.php'?></span>
        <span class="count-name">Comments</span>
      </div>
    </div>
  </div>
    
</div>
</div>
  </body>
</html>


<style>
  .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 105px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #6d6d6d;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color:#1fb1c3;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>