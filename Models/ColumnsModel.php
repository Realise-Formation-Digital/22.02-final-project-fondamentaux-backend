<?php
/*vérifie si le fichier database a été inclus et évite de l'inclure une deuxième fois*/
require_once __DIR__ . "/Database.php";
/*création du modèle columns*/
class ColumnsModel extends Database
{
    public $id;
    public $name;
    public $color;
    /*fonction pour recupérer toutes les colonnes*/
    public function getAllColumns($offset = 0, $limit = 10)
    {
        //
        return $this->getMany(
            "SELECT * FROM columns ORDER BY name ASC LIMIT $offset, $limit",
            "ColumnsModel"
        );

    }
    /*fonction pour recupérer une colonne*/
    public function getSingleColumns($id)
    {
        //
        return $this->getSingle(
            "SELECT * FROM columns WHERE id = $id",
            "ColumnsModel"
        );

    }
    /*fonction pour insérer des colonnes*/
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
    /*foncton pour la mise à jour des colonnes*/
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
    /*fonction pour supprimer des colonnes*/
    public function deleteColumns($id)
    {
        //
        return $this->delete(
            "DELETE FROM columns WHERE id=$id",
            "SELECT id FROM columns WHERE id=$id"
        );

    }
}