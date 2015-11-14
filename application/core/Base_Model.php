<?php

/**
 * A model class which extends CI_Model class.
 * This class includes a set of Read functions
 * @author NLiyanage
 */
class Base_Model extends CI_Model {

    /**
     * Constructs a Base_Model.
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Fetch an array of Model objects filtered by id and column name.
     * @param integer value
     * @param string column 
     * @return array array of Model objects indexed by primary key value.
     */
    public function getByColumn($value, $column) {
        //Building select query to fetch data from the DB_TABLE table 
        //while mentioning the filtering column and value
        $query = $this->db->get_where($this::DB_TABLE, [$column => $value,]);
        $objectArray = [];
        //getting type of the model class
        $class = get_class($this);
        //fetching results and iterate through results
        foreach ($query->result() as $row) {
            //declaring and initializing with model type 
            $model = new $class;
            //assigning values
            $model->initModelObjectWithValues($row);
            //storing object inside an associative array indexed by DB_TABLE_PK
            $objectArray[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $objectArray;
    }

    /**
     * Fetch an array of Model objects.
     * @return array array of Model objects indexed by primary key value.
     */
    public function get() {
        //Building select query to fetch data from the DB_TABLE table 
        $query = $this->db->get($this::DB_TABLE);
        $objectArray = array();
        //getting type of the model class
        $class = get_class($this);
        //fetching results and iterate through results
        foreach ($query->result() as $row) {
            //declaring and initializing with model type 
            $model = new $class;
            //assigning values
            $model->initModelObjectWithValues($row);
            //storing object inside an associative array indexed by DB_TABLE_PK
            $objectArray[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $objectArray;
    }

    /**
     * Initialize model object values from a stdclass object values.
     * @param stdclass row
     * @return void
     */
    private function initModelObjectWithValues($row) {
        //Iterate through row
        foreach ($row as $key => $value) {
            //assigning row values to the respective attribute of the model object
            $this->$key = $value;
        }
    }

}
