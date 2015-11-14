<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Question_Type_Model');
    }

    public function index() {
        $this->load_home();
    }

    public function load_home() {
        $quiz = new Question_Type_Model();
        $result = $quiz->get();
        $this->data['quizzes']=$result;
        $this->load_view('Home_View');

    }

}
