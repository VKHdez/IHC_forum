<?php
class Login extends SessionController
{
    function __construct()
    {
        
        parent::__construct();
        
        error_log('Login:: created');
    }

    function render()
    {
        $this->view->render('login');
    }

    function authenticate()
    {
        if ($this->existPOST(['email', 'password'])) {
            $email = $this->getPOST('email');
            $password = $this->getPOST('password');

            if ($email == '' || $email == empty($email) || $password == '' || empty($password)) {
                $this->redirect('register', ['error' => ErrorMessages::ERROR_REGISTER_NEWUSER_EMPTY]);
            }

            $user = $this->model->login($email, $password);

            if ($user != null) {
                $this->initialize($user);
            } else {
                $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA]);
            }
        } else {
            $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA]);
        }
    }
}
?>