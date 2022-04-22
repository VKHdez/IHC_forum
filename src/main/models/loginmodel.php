<?php

require_once 'src/main/models/usermodel.php';

class LoginModel extends Model implements IModel{

    function __construct()
    {
        parent::__construct();
    }

    public function save()
    {

    }

    public function getAll()
    {

    }

    public function get($id)
    {

    }

    public function delete($id)
    {

    }

    public function update()
    {

    }

    public function from($array)
    {
        
    }

    function login($email, $password)
    {
        try{
            $query = $this->prepare('SELECT * FROM usuario WHERE u_email = :email');
            $query->execute(
                [
                    ':email' => $email
                ]
            );

            if ($query->rowCount() == 1) {
                $item = $query->fetch(PDO::FETCH_ASSOC);

                error_log('LOGINMODEL::login -> ' . print_r($item, true));

                $userM = new UserModel();
                $userM->from($item);

                if (password_verify($password, $userM->getPassword())) {
                    error_log('LOGINMODEL:: Login -> Success');
                    return $userM;
                } else {
                    error_log('LOGINMODEL:: Wrong Password');
                }
            }
        }catch(PDOException $e){
            error_log('LOGINMODEL:: login -> Exception ' . $e);
        }
    }
    
}
?>