<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * A controller class which extends Base_Controller class.
 * This class includes a set of functions which will listen to the
 * user requests and responsible of loading viewable contents such as 'Home_View' to the user.
 * @author NLiyanage
 */
class Home_Controller extends Base_Controller {

    /**
     * Constructs a Question_Controller while loading model classes.
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Question_Type_Model');
    }

    /**
     * Defualt funtion when there is no controller function specified.
     * @return void
     */
    public function index() {
        $this->load_home();
    }

    /**
     * This function is responsible of loading Home_View.
     * @return void
     */
    public function load_home() {
        $quiz = new Question_Type_Model();
        $result = $quiz->get();
        $this->data['quizzes'] = $result;
        $this->load_view('Home_View');
    }

}
