<?php
  /**
   * View class for view some data from database
   */
  include ("DB.php");
  include_once ("session.php");
  class View {
    private $db;
    private $msgSession;
    function __construct(){
      $this->db = new DB();
      $this->msgSession = new Session();
    }
    //method for view all candidates
    function viewCandidate(){
      //view all candidates
      $sql = "select * from candidates";
      $query = $this->db->simplequerywithoutcondition($sql);
      $results = $query->fetchAll();
      return $results;
    }

    //method for view all questions
    function viewQuestions(){
      //view all candidates
      $sql = "select * from questions";
      $query = $this->db->simplequerywithoutcondition($sql);
      $results = $query->fetchAll();
      return $results;
    }

    //method for view all questions
    function viewEditQuestions(){
      //view all candidates
      $questionId = $_GET['id'];
      $sql = "select * from questions where question_id = $questionId";
      $query = $this->db->simplequerywithoutcondition($sql);
      $results = $query->fetchAll();
      return $results;
    }

    //method for view all report
    function viewReport(){
      //view all candidates
      $candId = $_GET['id'];
      $sql = "select * from questions, reports, candidates where reports.cand_id = candidates.cand_id and reports.question_id = questions.question_id and reports.cand_id = $candId";
      $query = $this->db->simplequerywithoutcondition($sql);
      $results = $query->fetchAll();
      return $results;
    }

    //method for view all comments
    function viewReportComment(){
      //view all candidates
      $candId = $_GET['id'];
      $sql = "select * from comments where comments.cand_id = $candId";
      $query = $this->db->simplequerywithoutcondition($sql);
      $results = $query->fetchAll();
      return $results;
    }
  }
