<?php 
    require_once __DIR__ . "/Database.php";

    class UserModel extends Database {

        public $id;
        public $username;
        public $firstname;
        public $lastname;
        public $email;


        public function getAllUser($offset = 0, $limit = 10) {
            // ---- TODO : Montre tous les User ordonee para nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM User ORDER BY nom ASC LIMIT $offset, $limit",
                "UserModel"
            );
        }

        public function getSingleUser($id) {
            // ---- TODO : Montre un seul User para son id ----
            return $this->getSingle(
                "SELECT * FROM User WHERE id = $id",
                "UserModel"
            );
        }

        /**
         * ---- TODO : Inserer une User ----
         */
        public function insertUser($array) {
            // ---- TODO : Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO User ($keys) VALUES ('$values')",
                "UserModel",
                "SELECT * FROM User"
            );
        }

        /**
         * ---- TODO : Modifier une User, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updateUser($array, $id) {
            // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- TODO : Modifie une User selectionner par son id ----
            return $this->update(
                "UPDATE User SET $values WHERE id = $id",
                "UserModel",
                "SELECT id FROM User WHERE id=$id",
                "SELECT * FROM User WHERE id=$id"
            );
        }

        /**
         * ---- TODO : Elimine une User par son id ----
         */
        public function deleteUser($id) {
            // ---- Elimine une User par son id ----
            return $this->delete(
                "DELETE FROM User WHERE id=$id",
                "SELECT id FROM User WHERE id=$id"
            );
        }
    }