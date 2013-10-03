<?php
require_once 'ApplicationResources.php';
require_once 'SimpleDispatcher.php';
require_once 'DataStore.php';
require_once 'Command.php';
require_once 'SimpleCommandFactory.php';
/**
 * Description of ApplicationResourcesImpl
 *
 * @author peter
 */
class ApplicationResourcesImpl extends ApplicationResources {
    private $dispatcher;
    private $cmdfactory;
    
    function __construct() {
        $this->dispatcher = new SimpleDispatcher("views");
        $this->cmdfactory = new SimpleCommandFactory();
    }
    
    function init() {
        $this->cmdfactory->addPackage("my_cmd");
        $this->cmdfactory->setDefaultCommand("MyDefault");
        $this->setupDispatcher();
        $this->primeDatabase();
    }
    
    function primeDatabase() {
        $user = "phpuser";
        $pass = "phppwd1";
        $host = "localhost";
        $database = "cdcol";
        
        $dsn = "mysql://$user:$pass@$host/$database";
        $ds = DataStore::getInstance();
        $ds->setVar("dsn", $dsn);
    }
    function setupDispatcher() {
        $success = Command::CMD_SUCCESS;
        $unproc = Command::CMD_UNPROCESSED;
        $error = Command::CMD_ERROR;
        
        $this->dispatcher->addCondition("MyDefault", "main.php");
        $this->dispatcher->addCondition("MyDefault", "error.php", $error);
        $this->dispatcher->addCondition("AddTask", "add.php");
        $this->dispatcher->addCondition("AddTask", "add.php", $success);
        return true;
    }

    public function getCommandFactory() {
        return $this->cmdfactory;
    }

    public function getDispatcher() {
        return $this->dispatcher;
    }
    
    
    
    
}

?>
