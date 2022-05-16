<?php

    require_once __DIR__ . "/../models/ColumnsModel.php";

    class ColumnsController extends BaseController {

        public function getList() {
            try {
                $ColumnsModel = new ColumnsModel();
        
                $limit = 10;
                $urlParams = $this->getQueryStringParams();
                if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
                    $limit = $urlParams['limit'];
                }
        
                $offset = 0;
                $urlParams = $this->getQueryStringParams();
                if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
                    $offset = ($urlParams['page'] - 1) * $limit;
                }
        
                $Columnss = $ColumnsModel->getAllColumns($offset, $limit);
        
                $responseData = json_encode($Columns);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
  
        public function get() {
            try {
                $ColumnsModel = new ColumnsModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $Columns = $ColumnsModel->getSingleColumns($urlParams['id']);
        
                $responseData = json_encode($Columns);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function store() {
            try {
                $ColumnsModel = new ColumnsModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['id'])) {
                    throw new Exception("Aucun ID n'a été spécifié");
                }
                if (!isset($body['name'])) {
                    throw new Exception("Aucun nom n'a été spécifié");
                }
                if (!isset($body['color'])) {
                    throw new Exception("La couleur n'a pas été spécifié");
                }
        
                $keys = array_keys($body);
                $valuesToInsert = [];
                foreach($keys as $key) {
                    if (in_array($key, ['id', 'name', 'color'])) {
                        $valuesToInsert[$key] = $body[$key];
                    }
                }
        
                $Columns = $ColumnsModel->insertColumns($valuesToInsert);
        
                $responseData = json_encode($Columns);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function update() {
            try {
                $ColumnsModel = new ColumnsModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                if (!isset($body['id'])) {
                    throw new Exception("Aucun identifiant n'a été spécifié");
                }
        
                $keys = array_keys($body);
                $valuesToUpdate = [];
                foreach($keys as $key) {
                    if (in_array($key, ['id', 'name', 'color'])) {
                        $valuesToUpdate[$key] = $body[$key];
                    }
                }
        
                $Columns = $ColumnsModel->updateColumns($valuesToUpdate, $body['id']);
        
                $responseData = json_encode($Columns);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function destroy() {
            try {
                $ColumnsModel = new ColumnsModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $Columns = $ColumnsModel->deleteColumns($urlParams['id']);
        
                $responseData = json_encode("La colonne a été correctement supprimé");
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }