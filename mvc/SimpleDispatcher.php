<?php
require 'Dispatcher.php';
/**
 * Description of SimpleDispatcher
 *
 * @author peter
 */
class SimpleDispatcher extends Dispatcher {
    private $dspHash = array();
    
    function addCondition($cmd, $target, $status=-1) {
        $cmd = strtolower($cmd);
        if($status > 0) {
            $this->dspHash["$cmd.$status"] = $target;
        } else {
            $this->dspHash["$cmd"] = $target;
        }
    }
    
    public function getNext(RequestHelper $hlp) {
        list($cmd, $status) = array_pop($hlp->getCommandArray());
        $key = "$cmd.$status";
        $view = $this->dspHash[$key];
        if(empty ($view)) {
            $view = $this->dspHash[$cmd];
        }
        return $view;
    }
}

?>
