<?php
/**/
require_once __DIR__ . "/Database.php";
/**/
class ColumnsModel extends Database
{
    public $id;
    public $name;
    public $color;
    /**/
    public function getAllColumns($offset = 0, $limit = 10)
    {
        //
        return $this->getMany(
            "SELECT * FROM columns ORDER BY name ASC LIMIT $offset, $limit",
            "ColumnsModel"
        );

    }
    /**/
    public function getSingleColumns($id)
    {
        //
        return $this->getSingle(
            "SELECT * FROM columns WHERE id = $id",
            "ColumnsModel"
        );

    }
    /**/
    public function insertColumns($array)
    {
        //
        $keys = implode(", ", array_keys($array));
        $values = implode("', '", array_values($array));
        //
        return $this->insert(
            "INSERT INTO columns ($keys) VALUES ('$values')",
            "ColumnsModel",
            "SELECT * FROM columns"
        );

    }
    /**/
    public function updateColumns($array, $id)
    {
        //
        $values_array = [];
        foreach($array as $key => $value) {
            $values_array[] = "$key = '$value'";
        }
        $values = implode(",", array_values($values_array));

        //
        return $this->update(
            "UPDATE columns SET $values WHERE id = $id",
            "ColumnsModel",
            "SELECT id FROM columns WHERE id=$id",
            "SELECT * FROM columns WHERE id=$id"
        );
    
    }
    /**/
    public function deleteColumns($id)
    {
        //
        return $this->delete(
            "DELETE FROM columns WHERE id=$id",
            "SELECT id FROM columns WHERE id=$id"
        );

    }
}