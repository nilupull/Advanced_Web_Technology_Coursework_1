<?php

class Question_Model extends Base_Model {

    const DB_TABLE = 'question';
    const DB_TABLE_PK = 'id';

    public $id;
    public $name;
    public $quiz_id;

    public function __construct() {
        parent::__construct();
        settype($this->id, "integer"); 
        settype($this->name, "string"); 
        settype($this->quiz_id, "integer"); 
    }
    
}
