<?php
  include_once ("DB.php");

  class Delete{
    private $db;
    function __construct(){
      $this->db = new DB();
    }

    public function deleteQuestion(){
      if (isset($_GET['action']) and $_GET['action'] == 'questiondelete') {
        $question_id = $_GET['id'];

        $sql = "DELETE FROM reports WHERE question_id = $question_id";
        $query = $this->db->simplequerywithoutcondition($sql);

        $sql = "DELETE FROM questions WHERE question_id = $question_id";
        $query = $this->db->simplequerywithoutcondition($sql);
        header('Location: viewQuestions.php');
      }
    }


    public function deleteCandidate(){
      if (isset($_GET['action']) and $_GET['action'] == 'deletecand') {
        $cand_id = $_GET['id'];

        $sql = "DELETE FROM reports WHERE cand_id = $cand_id";
        $query = $this->db->simplequerywithoutcondition($sql);

        $sql = "DELETE FROM comments WHERE cand_id = $cand_id";
        $query = $this->db->simplequerywithoutcondition($sql);

        $sql = "DELETE FROM candidates WHERE cand_id = $cand_id";
        $query = $this->db->simplequerywithoutcondition($sql);
        header('Location: viewCandidate.php');
      }
    }
  }
?>
