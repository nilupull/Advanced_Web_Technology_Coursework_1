<?php

/**
 * A model class which extends Base_Model class.
 * This class represents 'answer' entity.
 * @author NLiyanage
 */
class Answer_Model extends Base_Model {

    /**
     * Database table name.
     */
    const DB_TABLE = 'answer';

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
     * Related 'question' identifier.
     */
    public $question_id;

    /**
     * Mark carried out by this answer.
     */
    public $mark;

    /**
     * Constructs a Answer_Model while setting attribute types.
     * @return void
     */
    public function __construct() {
        parent::__construct();
        //setting attribute types.
        settype($this->id, "integer");
        settype($this->name, "string");
        settype($this->question_id, "integer");
        settype($this->mark, "integer");
    }

}
