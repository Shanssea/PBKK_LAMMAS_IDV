<?php

class MahasiswaController extends ControllerBase
{

    /**
     * DASHBOARD
     */

    public function indexAction($id)
    {
        $this->view->id = $id;

        $conditions = ['id' => $id];
        $x = $this->view->pinjInvs = ListPinjamInv::find(
            [
                'id_user = (:id:)',
                'bind' => $conditions,
            ]
        );
    }

    /**
     * INVENTARIS
     */

    public function listInvAction($id)
    {
        $this->view->id = $id;
        $this->view->pick("mahasiswa/requestInv");
        $this->view->invens = ListInv::find();
    }

    public function requestInvAction($id,$invenId)
    {
        return $this->dispatcher->forward(
            [
                'controller' => 'inventaris',
                'action' => 'request',
                'params' => [$id,$invenId],
            ]
        );
    }

    public function cancelInvAction($id,$invenId)
    {
        return $this->dispatcher->forward(
            [
                'controller' => 'inventaris',
                'action' => 'cancel',
                'params' => [$id,$invenId],
            ]
        );
    }

}

