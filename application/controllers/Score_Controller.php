<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * A controller class which extends Base_Controller class.
 * This class includes a set of functions which will listen to the
 * user requests and responsible of loading viewable contents such as 'Score_View' to the user.
 * @author NLiyanage
 */
class Score_Controller extends Base_Controller {

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
        $this->load_score();
    }

    /**
     * This function is responsible of loading Quiz_View.
     * @return void
     */
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
        $this->data['finalScore'] = $total;
        $this->data['submittedAnswers'] = $p;
        $this->data['timeTaken'] = $timeTaken;
        $this->load_view('Score_View');
    }
}
