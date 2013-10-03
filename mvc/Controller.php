<?php

require_once 'ApplicationResources.php';
require_once 'RequestHelper.php';
require_once 'CommandFactory.php';
/**
 * Description of Controller
 *
 * @author peter
 */
class Controller {
    private $appRes;
    
    function __construct(ApplicationResources $res) {
        $this->appRes = $res;
        $res->init();
    }
    
    function handleRequest() {
        $command;
        $requestHelper = new RequestHelper();
        $com_factory = $this->appRes->getCommandFactory();
        try {
            $command = $com_factory->getCommand($requestHelper);
            $command->execute($requestHelper);
            $this->appRes->getDispatcher()->dispatch($requestHelper);
        } catch(Exception $e) {
            throw $e;
        }
    }
}

?>
