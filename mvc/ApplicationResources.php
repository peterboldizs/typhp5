<?php
/**
 * Description of ApplicationResources
 *
 * @author peter
 */
abstract class ApplicationResources {
    public abstract function init();
    public abstract function getDispatcher();
    public abstract function getCommandFactory();
}

?>
