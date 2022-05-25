<?php
require_once __DIR__ . "/Database.php";
class ColumnModel extends Database
{
  public $id;
  public $name;
  public $color;
  
  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllColumns($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM columns ORDER BY name ASC LIMIT $offset, $limit",
      "ColumnModel",
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleColumn($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM columns WHERE id = $id",
      "ColumnModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertColumn($array)
  {
    $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);
    $resultat = $this->connection->query("SELECT COUNT(*) FROM columns");
    $final = $resultat->fetchColumn();

    // ---- TODO : Commenter ce bout de code ----

    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    if($final >= 3){
      return "L'ajout de données dans cette table est strictement intérdit et sera sanctioné par la loi selon l'article 3 du code de Lamine";
    }
    else{
    return $this->insert(
      "INSERT INTO columns ($keys) VALUES ('$values')",
      "ColumnModel",
      "SELECT * FROM columns"
    );
  }
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateColumn($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE columns SET $values WHERE id = $id",
      "ColumnModel",
      "SELECT id FROM columns WHERE id=$id",
      "SELECT * FROM columns WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteColumn($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM columns WHERE id=$id",
      "SELECT id FROM columns WHERE id=$id"
    );
  }

}
