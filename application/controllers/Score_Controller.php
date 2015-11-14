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
        //loading model classes.
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
        //Getting all the POST parameters as an array
        $post_params = $this->input->post();
        if (isset($post_params['timeTaken'])) {
            //a variable to store the final score
            $total = 0;
            //accessing timeTaken value
            $timeTaken = $this->input->post('timeTaken');
            $selectedQuestionType=$this->input->post('questionType');
            if ($post_params) {
                //removing submit button and timeTaken hidden field values from array
                array_pop($post_params);
                array_pop($post_params);
                array_pop($post_params);
                //
                //Iterate through post_params array
                foreach ($post_params as $key => $value) {
                    //accessing previously cached questionStructure array
                    $questionStructure = $this->cache->get($selectedQuestionType);
                    //Iterate through questionStructure array
                    foreach ($questionStructure as $qKey => $qValue) {
                        //Iterate through answers array
                        foreach ($qValue['answers'] as $aKey => $aValue) {
                            //answer id matched with post_param's answer ID
                            if ($aValue->id == $value) {
                                //add answer mark to the final score
                                $total+= $aValue->mark;
                            }
                        }
                    }
                }
            }
            //Assigining required values to the associative array 'data'.
            $this->data['finalScore'] = $total;
            $this->data['submittedAnswers'] = $post_params;
            $this->data['timeTaken'] = $timeTaken;
            //Invoking a superclass function responsible of loading views.
            $this->load_view('Score_View');
        } else {
            //If timeTaken value is not set loading Error_View
            $this->load_view('Error_View');
        }
    }

}
