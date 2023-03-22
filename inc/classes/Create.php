<?php
  /**
   * Create class for create some data in database
   */
  include_once ("DB.php");
  include_once ("session.php");
  class Create {
    private $db;
    private $msgSession;
    function __construct(){
      $this->db = new DB();
      $this->msgSession = new Session();
    }

    //candidate creating method
    public function createCandidate($data){
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCand'])) {
        $candName              = $data['candName'];
        $candGender            = $data['candGender'];
        $candEmail             = $data['candEmail'];
        $candQualification     = $data['candQuali'];
        $candAge               = $data['candAge'];
        $candNumber            = $data['candNumber'];
        $candAddress           = $data['candAddress'];


        //form server validation
        //check input field empty or not
        if (empty($candName) or empty($candGender) or empty($candEmail) or empty($candQualification) or empty($candAge) or empty($candNumber) or empty($candAddress)){
          $msg = '<div class="alert alert-danger"><b>Form Fillup Error!</b> Fields Must Not be Empty</div>';
          return $msg;
          exit();
        }

        //email field validation
        if (filter_var($candEmail, FILTER_VALIDATE_EMAIL) === false) {
          $msg = '<div class="alert alert-danger"><b>Form Fillup Error!</b> Invalid Email</div>';
          return $msg;
          exit();
        }

        //insert data to databsae if everything is okay
        $sql = "insert into candidates(cand_name, cand_gender, cand_email, cand_phone, cand_age, cand_address, cand_qualification) values(?, ?, ?, ?, ?, ?, ?)";
        $arr = array($candName, $candGender, $candEmail, $candNumber, $candAge, $candAddress, $candQualification);
        $results = $this->db->simplequery($sql, $arr);
        if ($results) {
          $msg = '<div class="alert alert-success"><b>Registration Success!</b> You have successfully added a new candidate.</div>';
          return $msg;
        } else {
          $msg = '<div class="alert alert-danger"><b>Registration Error!</b> Please try again</div>';
          return $msg;
        }

      }
    }

    //question creating method
    public function createQuestion($data){
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addQuestion'])) {
        $question = $data['question'];

        //form server validation
        //check input field empty or not
        if (empty($question)){
          $msg = '<div class="alert alert-danger"><b>Something went wront!</b> Field should not be empty!</div>';
          return $msg;
          exit();
        }

        //insert data to databsae if everything is okay
        $sql = "insert into questions(question) values(?)";
        $arr = array($question);
        $results = $this->db->simplequery($sql, $arr);
        if ($results) {
          $msg = '<div class="alert alert-success"><b>Question Added!</b> You have successfully added a new interview question.</div>';
          return $msg;
        } else {
          $msg = '<div class="alert alert-danger"><b>Something went wront!</b> Please try again</div>';
          return $msg;
        }

      }
    }



    //report creating for a candidate method
    public function createExam($data){
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitReport'])) {

          $candId = $_GET['id'];
          $comment = $data['comment'];
          $count = count($data);
          for ($x=1; $x < $count; $x++) {
            if (!empty($data["questionId$x"])  and !empty($data["result$x"])) {
              $questionId = $data["questionId$x"];
              $result = $data["result$x"];

              //insert data to databsae if everything is okay
              $sql = "insert into reports(question_id, cand_id, result) values(?, ?, ?)";
              $arr = array($questionId, $candId, $result);
              $results = $this->db->simplequery($sql, $arr);

            }
          }

          $sql = "insert into comments(comment, cand_id) values(?, ?)";
          $arr = array($comment, $candId);
          $results = $this->db->simplequery($sql, $arr);

          echo '<div class="alert alert-success"><b>Report Created!</b> You have successfully stored a candidate report.</div>';
      }
    }


    //question editing method
    public function editQuestion($data){
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editQuestion'])) {
        $question = $data['question'];
        $questionId = $_GET['id'];

        //form server validation
        //check input field empty or not
        if (empty($question)){
          $msg = '<div class="alert alert-danger"><b>Something went wrong!</b> Fields should not be empty</div>';
          return $msg;
          exit();
        }

        //insert data to databsae if everything is okay
        $sql = "update questions set question = ? where question_id = $questionId";
        $arr = array($question);
        $results = $this->db->simplequery($sql, $arr);
        if ($results) {
          header('Location: viewQuestions.php');
        } else {
          $msg = '<div class="alert alert-danger"><b>Something went wrong!</b> Please try again</div>';
          return $msg;
        }

      }
    }


  }

?>
