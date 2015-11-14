<?php

/**
 * A model class which extends Base_Model class.
 * This class represents 'question_type' entity.
 * @author NLiyanage
 */
class Question_Type_Model extends Base_Model {

    /**
     * Database table name.
     */
    const DB_TABLE = 'question_type';

    /**
     * Database primary key name.
     */
    const DB_TABLE_PK = 'id';

    /**
     * primary key attribute.
     */
    public $id;

    /**
     * name of the answer.
     */
    public $name;

    /**
     * Constructs a Question_Type_Model while setting attribute types.
     * @return void
     */
    public function __construct() {
        parent::__construct();
        settype($this->id, "integer");
        settype($this->name, "string");
    }

}
