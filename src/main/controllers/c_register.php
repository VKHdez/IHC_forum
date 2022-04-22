<?php

include_once 'src/main/models/usermodel.php';

class Register extends SessionController  {

    function __construct()
    {
        
        parent::__construct();
        error_log('Registration:: created');
    }

    function render() 
    {
        $this->view->render('register', []);
    }

    function newUser()
    {
        if ($this->existPOST(['nickname', 'email', 'password'])) {

            $nickname = $this->getPOST('nickname');
            $email    = $this->getPOST('email');
            $password = $this->getPOST('password');

            if ($nickname == '' || $nickname == empty($nickname) || $password == '' || empty($password) || $email == '' || empty($email) ) {

                $this->redirect('register', ['error' => ErrorMessages::ERROR_REGISTER_NEWUSER_EMPTY]);
            }

            $user = new UserModel();            
            $user->setNickname($nickname);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRol('usuario');

            if ($user->exists($nickname)) {

                $this->redirect('register', ['error' => ErrorMessages::ERROR_REGISTER_NEWUSER_EXISTS]);
            } else if ($user->save()) {
                
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_REGISTER_NEWUSER]);
            } else {
                $this->redirect('register', ['error' => ErrorMessages::ERROR_REGISTER_NEWUSER]);    
            }
        } else {
            $this->redirect('register', ['error' => ErrorMessages::ERROR_REGISTER_NEWUSER_EMPTY]);
        }
    }
}
?>