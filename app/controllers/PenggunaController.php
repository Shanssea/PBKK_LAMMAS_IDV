<?php

declare(strict_types=1);
use Phalcon\Security;

class PenggunaController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
       
    }

    public function loginpageAction()
    {
       
    }

    private function _registerSession($user)
    {
        $this->session->set('id', ['id' => $user->id_user]);
        $this->session->set('nama', ['nama' => $user->nama]);
        $this->session->set('nrp', ['nrp' => $user->nrp]);
        $this->session->set('telp', ['no_telp' => $user->no_telp]);
        $this->session->set('alamat', ['alamat' => $user->alamat]);

        if ($user->isAdmin){
            $this->session->set('isAdmin', ['isAdmin' => $user->isAdmin]);
        }else{
            $this->session->set('mhs', ['isAdmin' => $user->isAdmin]);
        }
    }

    public function loginAction()
    {
        if($this->request->isPost())
        { 
         $nrp    = $this->request->getPost('nrp');
         $password = $this->request->getPost('password');
        //  echo $nrp . $password;
        //  echo "</br>";
         $user = Pengguna::findFirst(
             [
                 'conditions' => 'nrp = :nrp:',
                 'bind'       => 
                 [
                     'nrp' => $nrp,
                 ],
             ]
         );
 
         if ($user) {
            $check = $this
               ->security
               ->checkHash($password, $user->password);

             if (true == $check) {
                // OK
                $this->_registerSession($user);

                if ($user->isAdmin){
                    return $this->response->redirect('/admin/'.$user->isAdmin);
                }else{
                    return $this->response->redirect("/mahasiswa/".$user->id_user);
                }
             }
             else {
                 // masih blom muncul
                $this->view->disable();
                $this->flashSession->error(
                    'Kamu gagal :('
                );
                return $this->response->redirect('/login');
             }
         } else {
             // masih blom muncul
             $this->flashSession->error(
                 'NRP atau password salah'
             );
             return $this->response->redirect('/login');
         }  
        }
     }

     public function logoutAction() { 
        $this->session->destroy();
        return $this->response->redirect('/');
     }
}

