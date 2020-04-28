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
        $this->session->set(
            'auth',
            [
                'nama' => $user->nama,
            ]
        );
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
                 'bind'       => [
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
                $this->flash->success(
                    'Kamu Berhasil Login ' . $user->nama . '!'
                );
                
                return $this->dispatcher->forward([
                    'controller' => 'index',
                    'action' => 'index',
                ]);
             }
             else {
                $this->flashSession->error(
                    'Kamu gagal :('
                );
             }
         } else {
             $this->flashSession->error(
                 'NRP atau password salah'
             );
             return $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index',
            ]);

             //$this->security->hash(rand());
         }
         //   $user = Pengguna::findFirst(array( 
         //      'nama = :nama: and password = :password:',
         //      'bind' => array( 
         //         'nama' => $this->request->getPost("nama"), 
         //         'password' => $this->request->getPost("password") 
         //      ) 
         //   ));  
         //   if ($user === false) { 
         //      $this->flash->error("Incorrect credentials"); 
         //      return $this->dispatcher->forward(array( 
         //         'controller' => 'index','action' => 'index' 
         //      )); 
         //   } 
         //   $message = "loginmu berhasil";
         //   $this->session->set('auth', $user);
         // //   return $this->dispatcher->forward(array( 
         // //    'controller' => 'index',
         // //    'action' => 'index',
         // //    // 'params'=> array(1, 2, 3)
         // //   ));  
         //   return $this->dispatcher->forward([
         //    "controller" => "index",
         //    "action" => "index",
         //    "params" => [
         //        "BISAPLIZ"
         //    ]
         //    ]);
            
        }
     }

     public function logoutAction() { 
      //   $this->session->remove('auth');
        $this->session->destroy();
        return $this->dispatcher->forward(array( 
           'controller' => 'index', 'action' => 'index' 
        )); 
     }
}

