<?php

class AdminController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->users = Pengguna::find();
        $this->view->invens = Inventaris::find();
    }

    public function createInvAction()
    {
        return $this->dispatcher->forward([
                'controller' => 'inventaris',
                'action' => 'create',
            ]);
    }

}

