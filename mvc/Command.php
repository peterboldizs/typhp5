<?php
/**
 * Description of Command
 *
 * @author peter
 */
abstract class Command {
    const CMD_SUCCESS = 200;
    const CMD_UNPROCESSED = 400;
    const CMD_ERROR = 500;
    
    final function execute(RequestHelper $reqHelper) {
       $status = $this->doExecute($reqHelper);
       $reqHelper->registerCommand(get_class($this), $status);
       return $status;
    }
    
    abstract protected function doExecute(RequestHelper $reqHelper);
}

?>
