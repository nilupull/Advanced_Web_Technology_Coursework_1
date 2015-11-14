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
     * @param integer id
     * @param string column 
     * @return array of Model objected indexed by primary key value.
     */
    public function getByColumn($id, $column) {

        $query = $this->db->get_where($this::DB_TABLE, array(
            $column => $id,
        ));

        $objectArray = [];
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->initModelObjectWithValues($row);
            $objectArray[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $objectArray;
    }

    /**
     * Fetch an array of Model objects.
     * @return array of Model objected indexed by primary key value.
     */
    public function get() {

        $query = $this->db->get($this::DB_TABLE);

        $objectArray = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->initModelObjectWithValues($row);
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
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }

}
