<?php

class AdminController extends ControllerBase
{
    
    /**
     * DASHBOARD
     */

    public function indexAction($id)
    {
        $status = "unverified";
        $this->view->pinjInvs = ListPinjamInv::find(
            [
                'status = (:status:) AND id_lab = (:id:)',
                'bind' => [
                    'id' => $id,
                    'status' => $status,
                ]
            ]
        );
    }

    /**
     * INVENTARIS
     */
        
    public function createInvAction($id)
    {
        return $this->dispatcher->forward([
                'controller' => 'inventaris',
                'action' => 'create',
                'params' => [$id]
            ]);
    }

    public function updateInvAction($id,$invenId)
    {
        return $this->dispatcher->forward([
                'controller' => 'inventaris',
                'action' => 'update',
                'params' => [$id,$invenId],
            ]);
    }

    public function deleteInvAction($id,$invenId)
    {
        return $this->dispatcher->forward([
                'controller' => 'inventaris',
                'action' => 'delete',
                'params' => [$id,$invenId],
            ]);
    }

    public function listInvAction($id)
    {
        $conditions = ['id' => $id];
        $this->view->invens = Inventaris::find(
            [
                'conditions' => 'id_lab=:id:',
                'bind' => $conditions,
            ]
        );
    }

    public function confirmInvAction($id,$pinjInvId)
    {
        return $this->dispatcher->forward([
            'controller' => 'inventaris',
            'action' => 'confirm',
            'params' => [$id,$pinjInvId],
        ]);
    }

    public function declineInvAction($id,$pinjInvId)
    {
        return $this->dispatcher->forward([
            'controller' => 'inventaris',
            'action' => 'decline',
            'params' => [$id,$pinjInvId],
        ]);
    }

}

