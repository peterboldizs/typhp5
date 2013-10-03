<?php
require_once 'RequestHelper.php';
/**
 * Description of Dispatcher
 *
 * @author peter
 */
abstract class Dispatcher {
    //private $views;
    
    /*function __construct($viewdir) {
        $this->views = $viewdir;
    }*/
    
    abstract function getNext(RequestHelper $hlp);
    
    function dispatch(RequestHelper $hlp) {
        $next = $this->getNext($hlp);
        $view = "$next";
        if(!is_file($view)) {
            throw new Exception("cannot open $view");
        }
        include($view);
        exit;
    }
}

?>
