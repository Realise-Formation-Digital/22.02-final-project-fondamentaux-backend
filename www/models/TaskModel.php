<?php
require_once __DIR__ . "/Database.php";

class TaskModel extends Database
{
  public $id;
  public $name;
  public $description;
  public $date_from;
  public $date_to;
  public $status;
  public $columns_id;
  public $users_id;

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAlltasks($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM tasks ORDER BY name ASC LIMIT $offset, $limit",
      "TaskModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleTask($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM tasks WHERE id = $id",
      "TaskModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertTask($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO tasks ($keys) VALUES ('$values')",
      "TaskModel",
      "SELECT * FROM tasks"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateTask($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE tasks SET $values WHERE id = $id",
      "TaskModel",
      "SELECT id FROM tasks WHERE id=$id",
      "SELECT * FROM tasks WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteTask($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM tasks WHERE id=$id",
      "SELECT id FROM tasks WHERE id=$id"
    );
  }

}
