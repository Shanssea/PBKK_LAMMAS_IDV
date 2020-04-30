<?php

class MahasiswaController extends ControllerBase
{

    public function indexAction($id)
    {
        $id = $this->dispatcher->getParam('userId');

        $conditions = ['id' => $id];
        $this->view->invens = DaftarPinjamInv::find(
            [
            'condition' => 'id_user=:id:',
            'bind' => $condition
            ]
        );
    }

    public function requestInvAction()
    {
        $this->view->invens = Inventaris::find();
    }

    public function createInvAction($id,$invenId)
    {
        return $this->dispatcher->forward(
            [
                'controller' => 'inventaris',
                'action' => 'request',
                'params' => [$id,$invenId],
            ]
        );
    }

}

