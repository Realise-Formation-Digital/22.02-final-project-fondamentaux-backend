<?php
/*vérifie si le fichier database a été inclus et évite de l'inclure une deuxième fois*/
require_once __DIR__ .  "/Database.php";
/*création du modèle tasks*/
class TasksModel extends Database
{
    public $id;
    public $name;
    public $description;
    public $date_from;
    public $date_to;
    public $status;
    /*fonction pour recupérer toutes les tâches*/
    public function getAllTasks($offset = 0, $limit = 10)
    {
        // 
        return $this->getMany(
            "SELECT * FROM tasks ORDER BY name ASC LIMIT $offset, $limit",
            "TasksModel"
        );

    }
    /*fonction pour recupérer une tâche*/
    public function getSingleTasks($id)
    {
        //
        return $this->getSingle(
            "SELECT * FROM tasks WHERE id = $id",
            "TasksModel"
        );
    
    }
    /*fonction pour insérer des tâches*/
    public function insertTasks($array)
    {
        //
        $keys = implode(", ", array_keys($array));
        $values = implode("', '", array_values($array));

        //
        return $this->insert(
            "INSERT INTO tasks ($keys) VALUES ('$values')",
            "TasksModel",
            "SELECT * FROM tasks"
        );

    }
    /*foncton pour la mise à jour des tâches*/
    public function updateTasks($array, $id)
    {
        //
        $values_array = [];
        foreach($array as $key => $value) {
            $values_array[] = "$key = '$value'";
        }
        $values = implode(",", array_values($values_array));

        //
        return $this->update(
            "UPDATE tasks SET $values WHERE id = $id",
            "TasksModel",
            "SELECT id FROM tasks WHERE id=$id",
            "SELECT * FROM tasks WHERE id=$id"
        );

    }
    /*fonction pour supprimer des tâches*/
    public function deleteTasks($id)
    {
        //
        return $this->delete(
            "DELETE FROM tasks WHERE id=$id",
            "SELECT id FROM tasks WHERE id=$id"
        );

    }
}