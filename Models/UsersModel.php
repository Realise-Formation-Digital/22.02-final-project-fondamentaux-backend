<?php
/**/
require_once __DIR__ . "/Database.php";
/**/
class UsersModel extends Database
{
    public $id;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    /* */
    public function getAllUsers($offset = 0, $limit = 10)
    {
        //
        return $this->getMany(
            "SELECT * FROM users ORDER BY username ASC LIMIT $offset, $limit",
            "UsersModel"
        );
    }
    /**/
    public function getSingleUsers($id)
    {
        // 
        return $this->getSingle(
            "SELECT * FROM users WHERE id = $id",
            "UsersModel"
        );

    }
    /**/
    public function insertUsers($array)
    {
        //
        $keys = implode(", ", array_keys($array));
        $values = implode("', '", array_values($array));
        //
        return $this->insert(
            "INSERT INTO users ($keys) VALUES ('$values')",
            "UsersModel",
            "SELECT * FROM users"
        );
    }
    /**/
    public function updateUsers($array, $id)
    {
        //
        $values_array = [];
        foreach($array as $key => $value) {
            $values_array[] = "$key = '$value'";
        }
        $values = implode(",", array_values($values_array));
        //
        return $this->update(
            "UPDATE users SET $values WHERE id = $id",
            "UsersModel",
            "SELECT id FROM users WHERE id=$id",
            "SELECT * FROM users WHERE id=$id"
        );
    }

    /**/
    public function deleteUsers($id)
    {
        //
        return $this->delete(
            "DELETE FROM users WHERE id=$id",
            "SELECT id FROM users WHERE id=$id"
        );

    }
}
