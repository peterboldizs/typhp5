<?php
require_once 'Command.php';
require_once 'MyDefault.php';
require_once 'TaskFacade.php';
/**
 * Description of AddTask
 *
 * @author peter
 */
class AddTask extends Command {

    protected function doExecute(RequestHelper $reqHelper) {
        $params = $reqHelper->getParams();
        if(empty ($params['addtask_submit'])) {
            $params = $reqHelper->setMessage("enter task details");
            return Command::CMD_UNPROCESSED;
        }
        
        if(empty ($params['summary']) || empty ($params['person'])) {
            $reqHelper->setMessage("all fields are mandatory");
            return Command::CMD_ERROR;
        }
        
        $taskfacade = new TaskFacade();
        $taskfacade->insertTask($params['summary'], $params['description'], $params['person']);
        $cmd = new MyDefault();
        return $cmd->execute($reqHelper);
        
    }
}

?>
