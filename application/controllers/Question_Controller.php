<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Question_Model');
        $this->load->model('Answer_Model');
    }

    public function index() {
        $this->load_question();
    }

    public function load_question() {

        $p = $this->input->post();
        if (isset($p['quizDropDown'])) {
            $question = new Question_Model();
            $answer = new Answer_Model();
            $questions = $question->getByColumn($p['quizDropDown'], 'quiz_id');
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
