<?php
  require_once __DIR__ . "/../models/UsersModel.php";

  class UsersController extends BaseController
  {

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function getList() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $UsersModel = new UsersModel();

        // ---- TODO : Commenter ce bout de code ----
        $limit = 10;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
          $limit = $urlParams['limit'];
        }

        // ---- TODO : Commenter ce bout de code ----
        $offset = 0;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
          $offset = ($urlParams['page'] - 1) * $limit;
        }

        // ---- TODO : Commenter ce bout de code ----
        $Userss = $UsersModel->getAllUserss($offset, $limit);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($Userss);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function get() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $UsersModel = new UsersModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $Users = $UsersModel->getSingleUsers($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($Users);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function store() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $UsersModel = new UsersModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['nom'])) {
          throw new Exception("Aucun nom n'a été spécifié");
        }
        if (!isset($body['groupe'])) {
          throw new Exception("Aucun groupe n'a été spécifié");
        }
        
        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToInsert = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'groupe'])) {
            $valuesToInsert[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $Users = $UsersModel->insertUsers($valuesToInsert);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($Users);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function update() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $UsersModel = new UsersModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['id'])) {
          throw new Exception("Aucun identifiant n'a été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToUpdate = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'groupe'])) {
            $valuesToUpdate[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $Users = $UsersModel->updateUsers($valuesToUpdate, $body['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($Users);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function destroy() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $UsersModel = new UsersModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $Users = $UsersModel->deleteUsers($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode("L'utilisateur a été correctement supprimé");

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

// Xavier 


    public function getUsersGroupeMusique() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $UsersModel = new UsersModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['UsersID']) || !is_numeric($urlParams['UsersID'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $Users = $UsersModel->nomGroupeUsersMusique($urlParams['UsersID']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($Users);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }


    public function addMusiqueUsers() {

      try {
        // ---- Création d'un objet en instanciant musiqueModel ----
        $musiqueModel = new MusiqueModel();

        // ---- Vérification si body vide ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("Le champ n'est pas valide");
        }

        // ---- Vérification si Users id est spécifié ----
        if (!isset($body['Users_id'])) {
          
          throw new Exception("Aucun Users n'a été spécifié");
        }
        // ---- Vérification si Users id est spécifié ----
        if (!isset($body['musique_id'])) {
          throw new Exception("Aucune musique n'a été spécifiée");
        }

        // ---- Variable musiqueUsers = à la référence de la fonction ajoutMusiqueUsers qui contient dans $body les valeurs renvoyées aux variables
          // $id1Value, $id2Value dans la fonction ----
        $musiqueUsers = $musiqueModel->ajoutMusiqueUsers($body['Users_id'], $body['musique_id']);

        // ---- Change les string en objet Json ----
        $responseData = json_encode($musiqueUsers);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }


  }
