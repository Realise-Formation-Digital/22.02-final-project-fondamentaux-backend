<?php
/**/
require_once __DIR__ . "/Database.php";
/*check extension class*/
class UsersModel extends Database
{
 public $id;
 public $username;
 public $firstname;
 public $lastname;
 public $email;
 /* */
//  public function getAllUsers()
//  {

//  }


public function getAllUsers ($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM users ORDER BY name ASC LIMIT $offset, $limit",
      "UsersModel"
    );
  }




 /**/
//  public function getSingleUser()
//  {

//  }
//  /**/
//  public function insertUser()
//  {

//  }
//  /**/
//  public function updateUser()
//  {

//  }
//  /**/
//  public function deleteUser()
//  {

//  }
}
