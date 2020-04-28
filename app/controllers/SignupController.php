<?php

use Phalcon\Security;

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    
    public function registerAction()
    {
        $user = new Pengguna();

        if($this->request->isPost())
        {
            $dataSent = $this->request->getPost();

            $user = new Pengguna();
            $security = new Security();
            
            $hashed = $security->hash($dataSent["password"]);
            
            $user->password = $hashed;
            $user->nama = $dataSent["nama"];
            $user->nrp = $dataSent["nrp"];
            $user->alamat = $dataSent["alamat"];
            $user->no_telp = $dataSent["no_telp"];
            $user->isAdmin = 0;

            $success = $user->save();
        }

        if ($success) {
            echo "Thanks you for signing up!";
            header("refresh:2;url=/");
        } else {
            echo "Oops, seems like the following issues were encountered: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }
}