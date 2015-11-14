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

        $p = $this->input->post();
        if (isset($p['quizDropDown'])) {
            $question = new Question_Model();
            $answer = new Answer_Model();
            $questions = $question->getByColumn($p['quizDropDown'], 'question_type_id');
            $questionStructure = [];
            foreach ($questions as $key => $value) {
                $answers = $answer->getByColumn($value->id, 'question_id');
                $questionAndAnswerPair = [
                    "question" => $value,
                    "answers" => $answers
                ];
                array_push($questionStructure, $questionAndAnswerPair);
            }
            $this->data['questionStructure'] = $questionStructure;
            $this->cache->save('questionStructure', $questionStructure, 0);
            $this->load_view('Quiz_View');
        } else {
            $this->load_view('Home_View');
        }
    }

}
