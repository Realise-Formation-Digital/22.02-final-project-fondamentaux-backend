<?php

    require_once __DIR__ . "/Database.php";

    class TasksModel extends Database {

        public $id;
        public $name;
        public $description;
        public $date_from;
        public $date_to;
        public $status;

        public function getAlltasks($offset = 0, $limit = 10) {
            // ---- Montre tous les taskss par nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM tasks ORDER BY nom ASC LIMIT $offset, $limit",
                "TasksModel"
            );
        }

        public function getSingletasks($id) {
            // ---- Montre un seul tasks par son id ----
            return $this->getSingle(
                "SELECT * FROM tasks WHERE id = $id",
                "TasksModel"
            );
        }

        /**
         * ---- Inserer un tasks ----
         */
        public function inserttasks($array) {
            // ---- Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO tasks ($keys) VALUES ('$values')",
                "TasksModel",
                "SELECT * FROM tasks"
            );
        }

        /**
         * ---- Modifier un tasks, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updatetasks($array, $id) {
            // ---- Declare un array, pour chaque cle dans l'array il prend la valeur puis il les separes par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- Modifie le tasks selectionné par son id ----
            return $this->update(
                "UPDATE tasks SET $values WHERE id = $id",
                "TasksModel",
                "SELECT id FROM tasks WHERE id=$id",
                "SELECT * FROM tasks WHERE id=$id"
            );
        }

        /**
         * ---- Elimine un tasks par son id ----
         */
        public function deletetasks($id) {
            // ---- Elimine un tasks par son id ----
            return $this->delete(
                "DELETE FROM tasks WHERE id=$id",
                "SELECT id FROM tasks WHERE id=$id"
            );
        }

        public function gethoraire(){
            return $this->getMany(
                "SELECT tasks.id, tasks.name, tasks.description, tasks.date_from, tasks.date_to, tasks.status, users.username
                FROM tasks
                INNER JOIN users_tasks
                ON users_tasks.tasks_id = tasks.id
                INNER JOIN users
                ON users.id = users_tasks.users_id
                WHERE tasks.id = users_tasks.users_id",
                "TasksModel"
            );
        }

    }
