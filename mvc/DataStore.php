<?php
/**
 * Description of DataStore
 *
 * @author peter
 */
class DataStore {
    private static $instance;
    private $vars = array();
    
    private function __construct() {
        //;
    }
    
    public static function getInstance() {
        if(empty (DataStore::$instance)) {
            DataStore::$instance = new DataStore();
        }
        return DataStore::$instance;
    }
    
    function setMessage($msg) {
        $this->vars['message'] = $msg;
    }
    
    function getMessage() {
        return $this->vars['message'];
    }
    
    function setVar($name, $value) {
        $this->vars[$name] = $value;
    }
    
    function getVar($name) {
        return $this->vars[$name];
    }
    
    function getVars() {
        return $this->vars;
    }
}

?>
