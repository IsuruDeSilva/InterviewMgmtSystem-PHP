  <nav class="navbar navbar-inverse" style="width: 100% !important; margin: auto;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><i class="fa fa-file-text"></i> Interview Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="<?php if($page=='home'){ echo 'active'; }?>"><a href="home.php"><i class="fa fa-home"></i></a></li>
      <li class="<?php if($page=='addcandidate'){ echo 'active'; }?>"><a href=addCandidate.php>Add New Candidate</a></li>
      <li class="<?php if($page=='viewcandidate'){ echo 'active'; }?>"><a href="viewCandidate.php">Manage Candidates</a></li>
      <li class="<?php if($page=='addquestion'){ echo 'active'; }?>"><a href="addQuestion.php">Add New Question</a></li>
      <li class="<?php if($page=='viewquestion'){ echo 'active'; }?>"><a href="viewQuestions.php">Manage Questions</a></li>
      
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="?action=logout"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
  </div>
</nav>
