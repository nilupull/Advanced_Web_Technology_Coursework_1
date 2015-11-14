<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * A controller class which extends Base_Controller class.
 * This class includes a set of functions which will listen to the
 * user requests and responsible of loading viewable contents such as 'Quiz_View' to the user.
 * @author NLiyanage
 */
class Question_Controller extends Base_Controller {

    /**
     * Constructs a Question_Controller while loading model classes.
     * @return void
     */
    public function __construct() {
        parent::__construct();
        //loading model classes.
        $this->load->model('Question_Model');
        $this->load->model('Answer_Model');
    }

    /**
     * Defualt funtion when there is no controller function specified.
     * @return void
     */
    public function index() {
        $this->load_question();
    }

    /**
     * This function is responsible of loading Quiz_View.
     * @return void
     */
    public function load_question() {
        //Getting all the POST parameters as an array
        $p = $this->input->post();
        //Checking for unset value quizDropDown
        if (isset($p['quizDropDown'])) {
            $question = new Question_Model();
            $answer = new Answer_Model();
            //Getting filtered(by question_type_id column) Question records as Question_Model type array.
            $questions = $question->getByColumn($p['quizDropDown'], 'question_type_id');
            //declaring and initializing an associative array to store questions and answers
            $questionStructure = [];
            //Iterate through fetched questions
            foreach ($questions as $key => $value) {
                //Getting filtered(by question_id column) Answer records as Answer_Model type array.
                $answers = $answer->getByColumn($value->id, 'question_id');
                //declaring and initializing an associative array with Question_Model object
                //and respective Answer_Model object array
                $questionAndAnswerPair = [
                    "question" => $value,
                    "answers" => $answers
                ];
                array_push($questionStructure, $questionAndAnswerPair);
            }
            //Assigining questionStructure values to the associative array 'data'.
            $this->data['questionStructure'] = $questionStructure;
            //Caching for further usage of questionStructure and setting expire time to unlimited
            $this->cache->save('questionStructure', $questionStructure, 0);
            //Invoking a superclass function responsible of loading views.
            $this->load_view('Quiz_View');
        } else {
            //If quizDropDown value is not set loading Error_View
            $this->load_view('Error_View');
        }
    }

}
