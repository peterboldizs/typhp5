<?php
require_once 'ApplicationResources.php';
/**
 * Description of CommandFactory
 *
 * @author peter
 */
abstract class CommandFactory {
    abstract function getDefaultCommand();
    abstract function getCommand(RequestHelper $reqhelper);
}

?>
