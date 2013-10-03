<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'DataStore.php';
/**
 * Description of RequestHelper
 *
 * @author peter
 */
class RequestHelper {
    private $params = array();
    private $commandArray = array();
    private $datastore;
    
    function RequestHelper() {
        $this->datastore = DataStore::getInstance();
        $this->params = $_REQUEST;
    }
    
    function getCommand() {
        return $this->params['cmd'];
    }
    
    function overrideParams() {
        $this->params = $params;
    }
    
    function getOrigParams() {
        return $_REQUEST;
    }
    
    function getParams() {
        return $params;
    }
    
    function saveVar($name, $value) {
        $this->datastore->setVar($name, $value);
    }
    
    function getVar($name) {
        return $this->datastore->getVar($name);
    }
    
    function getVars() {
        return $this->datastore->getVars();
    }
    
    function setMessage($msg) {
        $this->datastore->setMessage($msg);
    }
    
    function registerCommand($name, $status) {
        $this->commandArray[] = array($name, $status);
    }
    
    function getCommandArray() {
        return $this->commandArray;
    }
}

?>
