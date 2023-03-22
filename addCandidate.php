<?php
  include_once ("inc/classes/session.php");
  include ("inc/classes/Create.php");

  $userSession = new Session();
  if ($userSession->getSession('login') != true) {
    header('Location: login.php');
  }
  $userSession->destroy();
  $create = new Create();
  $addCandidate = $create->createCandidate($_POST);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add a Candidate</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>

<!------ Include the above in your HEAD tag ---------->
<?php $page = "addcandidate"; include ('nav.php'); ?>
<div class="container">

<div style="width: 50%; margin: 25px auto;">
  <?php
    if (isset($addCandidate)) {
      echo $addCandidate;
    }
  ?>
</div>


    <div id="signupbox" style=" margin-top:10px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Add New Candidate</div>

            </div>
            <div class="panel-body" >
                <form method="post" action="">

                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Candidate's FullName*<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="candName" maxlength="30" name="candName" placeholder="Candidate Name" style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div>

                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Gender<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                 <select class="form-control" aria-label="Default select example" name="candGender" id="candGender" required>
                                    <option selected>Please Select..</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="OT">Others</option>
                                </select>
                            </div>
                        </div>

                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="candEmail" name="candEmail" placeholder="Email Address" style="margin-bottom: 10px" type="email" />
                            </div>
                        </div>


                        <div id="div_id_location" class="form-group required">
                            <label for="id_location" class="control-label col-md-4  requiredField"> Candidate Qualification<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="candQuali" name="candQuali" placeholder="Candidate Qualification" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div id="div_id_number" class="form-group required">
                             <label for="id_number" class="control-label col-md-4  requiredField"> Age <span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                 <input class="input-md textinput textInput form-control" id="candAge" name="candAge" placeholder="Age" style="margin-bottom: 10px" type="text"  required/>
                            </div>
                        </div>

                        <div id="div_id_number" class="form-group required">
                             <label for="id_number" class="control-label col-md-4  requiredField"> Contact Number*<span class="asteriskField"></span> </label>
                             <div class="controls col-md-8 ">
                                 <input class="input-md textinput textInput form-control" id="candNumber" name="candNumber" placeholder="Contact Number" style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div>
                        <div id="div_id_location" class="form-group required">
                            <label for="id_location" class="control-label col-md-4  requiredField"> Address<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="candAddress" name="candAddress" placeholder="Full Address" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="addCand" value="Add New Candidate" class="btn btn-primary btn btn-primary" style="border-radius:0%" id="addCand" />
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
