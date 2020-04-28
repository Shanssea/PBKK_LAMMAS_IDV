<?php

class InventarisController extends ControllerBase
{
    public function createAction()
    {

    }

    public function submitAction()
    {
        $user = new Inventaris();

        if($this->request->isPost())
        {
            $dataSent = $this->request->getPost();

            $inven = new Inventaris();

            $inven->nama_inv = $dataSent["nama"];
            $inven->status_inv = $dataSent["status"];

            $success = $inven->save();
        }

        if ($success) {
            echo "Berhasil!";
            header("refresh:2;url=/");
        } else {
            echo "Oops, seems like the following issues were encountered: ";

            $messages = $inven->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }

    public function editAction($invenId)
    {
        $conditions = ['id_inv' => $invenId];
        $inven = Inventaris::findFirst([
            'conditions' => 'id_inv=:id_inv:',
            'bind' => $conditions,
        ]);

        $this->view->inven = $inven;

        if ($this->request->isPost()) 
        {
            $dataSent = $this->request->get();

            $inven->nama_inv = $dataSent["nama"];
            $inven->status_inv = $dataSent["status"];

            $success = $inven->save();

            if ($success) {
                echo "Berhasil!";
                header("refresh:2;url=/");
            } else {
                echo "Oops, seems like the following issues were encountered: ";
    
                $messages = $inven->getMessages();
    
                foreach ($messages as $message) {
                    echo $message->getMessage(), "<br/>";
                }
            }
        }

        $this->view->disable();
    }

    public function deleteAction($invenId)
    {
        $conditions = ['id_inv' => $invenId];
        $inven = Inventaris::findFirst([
            'conditions' => 'id_inv=:id_inv:',
            'bind' => $conditions,
        ]);

        $success = $inven->delete();

        if ($success) {
            echo "Berhasil!";
            header("refresh:2;url=/");
        } else {
            echo "Oops, seems like the following issues were encountered: ";

            $messages = $inven->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
    }

}