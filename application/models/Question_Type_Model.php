<?php

class Question_Type_Model extends Base_Model {

    const DB_TABLE = 'question_type';
    const DB_TABLE_PK = 'id';

    public $id;
    public $name;

    public function __construct() {
        parent::__construct();
        settype($this->id, "integer");
        settype($this->name, "string");
    }

}
