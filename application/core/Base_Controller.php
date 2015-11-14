<?php
/**
 * A controller class which extends CI_Controller class.
 * This class includes a generalized view loading mechanism 
 * and a default caching system.
 * @author NLiyanage
 */
class Base_Controller extends CI_Controller {

    /**
     * An associative array which will then pass as a parameter to the view.
     */
    public $data = [];

    /**
     * Constructs a Base_Controller while loading apc caching driver.
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->driver('cache', ['adapter' => 'apc', 'backup' => 'file']);
    }
    /**
     * Load Base_View page by sending the mentioned sub-view as a parameter
     * @param string $subView
     * @return void
     */
    protected function load_view($subView) {
        //initializing data array with specified subview
        $this->data['subview'] = $subView;
        //loading Base_View by sending initialized data array as a parameter.
        $this->load->view('base/Base_View', $this->data);
    }

}
