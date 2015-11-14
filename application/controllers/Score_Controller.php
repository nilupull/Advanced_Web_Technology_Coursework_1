<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Score_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Question_Model');
        $this->load->model('Answer_Model');
    }

    public function index() {
        $this->load_score();
    }

    private function load_score() {
        $p = $this->input->post();

        $total = 0;
        $timeTaken = $this->input->post('timeTaken');
        if ($p) {
            array_pop($p);
            array_pop($p);
            foreach ($p as $key => $value) {
                $questionStructure = $this->cache->get('questionStructure');
                foreach ($questionStructure as $qKey => $qValue) {
                    foreach ($qValue['answers'] as $aKey => $aValue) {
                        $b = $aValue->id;
                        if ($b == $value) {
                            $total+= $aValue->mark;
                        }
                    }
                }
            }
        }
        $this->data['finalScore']=$total;
        $this->data['submittedAnswers']=$p;
        $this->data['timeTaken']=$timeTaken;
        $this->load_view('Score_View');
    }

}
