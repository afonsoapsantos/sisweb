<?php

    namespace Sisweb\Controller;
    use \Sisweb\Model\User;

    class UserController {

        public function create($post)
        {
            $user = new User();
            $user->getMaxId();
            $user->setData($post);
            $user->setdtregisteruser(date("Y-m-d"));
            $user->create();
        }

        public function login($login, $password)
        {
            $user = new User();
            $user->login($login, $password);

        }
        
    }

?>