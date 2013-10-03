<?php

require_once 'CommandFactory.php';
require_once 'ApplicationResources.php';

/**
 * Description of SimpleCommandFactory
 *
 * @author peter
 */
class SimpleCommandFactory extends CommandFactory {

    private $packages = array();
    private $defaultCmd = "DefaultCommand";

    function __construct() {
        array_push($this->packages, "command");
    }

    function addPackage($pkg) {
        array_push($this->packages, $pkg);
    }
    
    function setDefaultCommand($str) {
        $this->defaultCmd = $str;
    }

    
    
    private function getCommandByName($cmd) {
        $cmdpath = "$cmd.php";
        if(file_exists($cmdpath)) {
            require_once $cmdpath;
            $cmd_obj = new $cmd();
            if($cmd_obj instanceof Command) {
                return $cmd_obj;
            }
        }
        throw new CommandNotFoundException("Command $cmd not found");
    }
    
    public function getCommand(RequestHelper $reqhelper) {
        $cmd = $reqhelper->getCommand();
        if(empty ($cmd)) {
            $cmd = $this->getDefaultCommand();
        }
        return $this->getCommandByName($cmd);
    }

    public function getDefaultCommand() {
        return $this->defaultCmd;
    }

}

?>
