<?php
require_once 'Command.php';
require_once 'TaskFacade.php';
/**
 * Description of MyDefault
 *
 * @author peter
 */
class MyDefault extends Command {

    protected function doExecute(RequestHelper $reqHelper) {
        $reqHelper->setMessage("welcome");
        $taskfacade = new TaskFacade();
        $tasks = $taskfacade->getTasks();
        $reqHelper->saveVar("tasks", $tasks);
        
        return Command::CMD_SUCCESS;
        
    }
}

?>
