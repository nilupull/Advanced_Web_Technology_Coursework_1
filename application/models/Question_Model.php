<?php

/**
 * A model class which extends Base_Model class.
 * This class represents 'question' entity.
 * @author NLiyanage
 */
class Question_Model extends Base_Model {

    /**
     * Database table name.
     */
    const DB_TABLE = 'question';

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
     * Related 'question_type' identifier.
     */
    public $question_type_id;

    /**
     * Constructs a Question_Model while setting attribute types.
     * @return void
     */
    public function __construct() {
        parent::__construct();
        settype($this->id, "integer");
        settype($this->name, "string");
        settype($this->question_type_id, "integer");
    }

}
