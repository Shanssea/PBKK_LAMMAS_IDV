<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->users = Pengguna::find();
        $this->view->invens = Inventaris::find();
    }

}

