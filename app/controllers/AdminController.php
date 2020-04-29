<?php

class AdminController extends ControllerBase
{

    public function indexAction()
    {

    }
        

    public function createInvAction()
    {
        return $this->dispatcher->forward([
                'controller' => 'inventaris',
                'action' => 'create',
            ]);
    }

    public function listInvAction()
    {
        $this->view->invens = Inventaris::find();
    }

}

