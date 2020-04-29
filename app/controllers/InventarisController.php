<?php

class InventarisController extends ControllerBase
{
    // functions untuk admin

    public function createAction()
    {
        
    }

    public function submitAction()
    {
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
            header("refresh:2;url=/admin");
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
        $this->view->invenId = $invenId;

        $conditions = ['id_inv' => $invenId];
        $inven = Inventaris::findFirst([
            'conditions' => 'id_inv=:id_inv:',
            'bind' => $conditions,
        ]);

        $this->view->setVars(
            [
                'nama' => $inven->nama_inv,
                'status' => $inven->status_inv,
            ]
        );

        if ($this->request->isPost()) 
        {

            $dataSent = $this->request->get();

            $nama = $dataSent["nama"];
            $status = $dataSent["status"];

            $inven->nama_inv = $dataSent["nama"];
            $inven->status_inv = $dataSent["status"];

            $success = $inven->save();

            if ($success) {
                echo "Berhasil!";
                header("refresh:2;url=/admin");
            } else {
                echo "Oops, seems like the following issues were encountered: ";
    
                $messages = $inven->getMessages();
    
                foreach ($messages as $message) {
                    echo $message->getMessage(), "<br/>";
                }
            }
        }
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
            header("refresh:2;url=/admin");
        } else {
            echo "Oops, seems like the following issues were encountered: ";

            $messages = $inven->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
    }

    // functions untuk mahasiswa

    public function requestAction()
    {
        
    }

    public function addrequestAction()
    {
        
    }

}