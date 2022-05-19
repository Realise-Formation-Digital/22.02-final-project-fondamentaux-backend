<?php 
    require_once __DIR__ . "/Database.php";

    class ColumnModel extends Database {

        public $id;
        public $nom;
        public $color;

        public function getAllColumn($offset = 0, $limit = 10) {
            // ---- TODO : Montre tous les Column ordonee para nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM Column ORDER BY nom ASC LIMIT $offset, $limit",
                "ColumnModel"
            );
        }

        public function getSingleColumn($id) {
            // ---- TODO : Montre un seul Column para son id ----
            return $this->getSingle(
                "SELECT * FROM Column WHERE id = $id",
                "ColumnModel"
            );
        }

        /**
         * ---- TODO : Inserer une Column ----
         */
        public function insertColumn($array) {
            // ---- TODO : Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO Column ($keys) VALUES ('$values')",
                "ColumnModel",
                "SELECT * FROM Column"
            );
        }

        /**
         * ---- TODO : Modifier une Column, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updateColumn($array, $id) {
            // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- TODO : Modifie une Column selectionner par son id ----
            return $this->update(
                "UPDATE Column SET $values WHERE id = $id",
                "ColumnModel",
                "SELECT id FROM Column WHERE id=$id",
                "SELECT * FROM Column WHERE id=$id"
            );
        }

        /**
         * ---- TODO : Elimine une Column par son id ----
         */
        public function deleteColumn($id) {
            // ---- Elimine une Column par son id ----
            return $this->delete(
                "DELETE FROM Column WHERE id=$id",
                "SELECT id FROM Column WHERE id=$id"
            );
        }
    }