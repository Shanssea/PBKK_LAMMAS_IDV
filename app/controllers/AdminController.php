<?php

class AdminController extends ControllerBase
{

    public function indexAction()
    {
        $status = "unverified";
        $this->view->pinjInvs = DaftarPinjamInv::find(
            [
                'status = (:status:)',
                'bind' => [
                    'status' => $status
                ]
            ]
        );
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

    public function confirmInvAction($id)
    {
        return $this->dispatcher->forward([
            'controller' => 'inventaris',
            'action' => 'confirm',
            'params' => $id
        ]);
    }

}

