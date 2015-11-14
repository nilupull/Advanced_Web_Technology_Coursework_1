<?php

class Answer_Model extends Base_Model {

    const DB_TABLE = 'answer';
    const DB_TABLE_PK = 'id';

    public $id;
    public $name;
    public $question_id;
    public $mark;

    public function __construct() {
        parent::__construct();
        settype($this->id, "integer");
        settype($this->name, "string");
        settype($this->question_id, "integer");
        settype($this->mark, "integer");
    }

}
