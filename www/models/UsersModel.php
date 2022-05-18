<?php
require_once __DIR__ . "/Database.php";

class UsersModel extends Database
{
  public $id;
  public $nom;
  public $groupe;
  
  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllUserss($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM Users ORDER BY nom ASC LIMIT $offset, $limit",
      "UsersModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleUsers($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM Users WHERE id = $id",
      "UsersModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertUsers($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO Users ($keys) VALUES ('$values')",
      "UsersModel",
      "SELECT * FROM Users"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateUsers($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE Users SET $values WHERE id = $id",
      "UsersModel",
      "SELECT id FROM Users WHERE id=$id",
      "SELECT * FROM Users WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteUsers($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM Users WHERE id=$id",
      "SELECT id FROM Users WHERE id=$id"
    );
  }

  public function nomGroupeUsersMusique($UsersID)
  {
    return $this->getSingle(
      "SELECT a.nom, a.groupe, m.nom FROM Users a
        INNER JOIN Users_musique am ON am.Users_id = a.id
        INNER JOIN musique m ON m.id = am.musique_id
        WHERE a.id = $UsersID",
        "UsersModel"
    );
  }

  // 
  public function ajoutMusiqueUsers($valUsers, $valMusique,) {
    return $this->addRelation(
      'Users_musique', 'Users_id', 'musique_id', 

      "INSERT INTO Users_musique(Users_id, musique_id)
        VALUES ($valUsers, $valMusique)"

    
    );
  }

  public function supprimeMusiqueUsers($tableName, $id1Name, $id2Name, $id1Value, $id2Value) {
    return $this->removeRelation(
      'Users_musique', 'Users_id', 'musique_id',

     

    );
  }

}


// "SELECT * FROM Users a
    //   INNER JOIN Users_musique am on am.Users_id = a.id
    //   INNER JOIN musique m ON m.id = am.musique_id
    //   WHERE a.id = $UsersID"

