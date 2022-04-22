<?php
class UserModel extends Model implements IModel{

    private $id;
    private $nickname;
    private $nombre;
    private $email;
    private $rol;
    private $password;

    public function __construct(){
        
        parent::__construct();

        $this->id = 0;
        $this->nickname = '';
        $this->nombre = '';
        $this->email = '';
        $this->rol = '';
        $this->password = '';
    }

    private function getHashedPassword( $password ){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function exists($usuario)
    {
        try {
            $query = $this->prepare('SELECT u_nickname FROM usuario WHERE u_nickname = :usuario');
            $query->execute(
                [
                ':usuario' => $this->nickname
                ]
            );

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            error_log('USERMODEL:: exists -> PDO Exception '. $e);
            return false;
        }

    }

    public function comparePasswords( $password, $id)
    {
        try{
            $user = $this->get($id);

            return password_verify($password, $user->getPassword());
        }catch(PDOException $e){
            error_log('USERMODEL:: compare -> PDOException '. $e);
            return false;
        }
    }

    public function save()
    {
        try{
            $query = $this->prepare('INSERT INTO usuario(u_nickname, u_nombre, u_email, u_rol, u_pass) VALUES(:nickname, :nombre, :email, :rol, :password)');
            $query->execute(
                [
                    ':nickname' => $this->nickname,
                    ':nombre'   => $this->nombre,
                    ':email'    => $this->email,
                    ':rol'      => $this->rol,
                    ':password' => $this->password
                ]
            );

            return true;
        }catch(PDOException $e){

            error_log('USERMODEL:: save -> PDO Exception '. $e);
            return false;
        }
    }

    public function getAll(){

        $items = [];

        try {
            $query = $this->query('SELECT * from usuario');

            while( $p = $query->fetch(PDO::FETCH_ASSOC) ){
                $item = new UserModel();

                $item->setNombre($p['u_nombre']);
                $item->setNickname($p['u_nickname']);
                $item->setEmail($p['u_Email']);
                $item->setRol($p['u_rol']);
                $item->setPassword($p['u_password']);
                
                array_push($items, $item);
            }

            return $items;

        } catch (PDOException $e) {
            error_log('USERMODEL::getAll -> PDOException '. $e);
        }
    }

    public function get($id){

        try {
            $query = $this->query('SELECT * from usuario WHERE u_id="id');
            
            error_log('USERMODEL::get -> Query ' . $query);

            $query->execute(
            [
                   ':id' => $id
                ]
            );

            $usuario = $query->fetch(PDO::FETCH_ASSOC);

            $this->setNombre( $usuario['u_nombre']);
            $this->setNickname( $usuario['u_nickname']);
            $this->setEmail( $usuario['u_Email']);
            $this->setRol( $usuario['u_rol']);
            $this->setPassword( $usuario['u_password']);
            
            return $this;

        } catch (PDOException $e) {
            error_log('USERMODEL::getId -> PDOException '. $e);
        }

    }

    public function delete($id)
    {
        try {

            $query = $this->query('DELETE FROM usuario WHERE id = :id');
            $query->execute(
                [
                'id' => $id
                ]
            );

            return true;

        } catch (PDOException $e) {
            error_log('USERMODEL::Delete -> PDOException '. $e);
            return false;
        }
    }

    public function update()
    {
        try {
            $query = $this->prepare('UPDATE usuario SET u_nombre = :nombre, u_nickname = :nickname, u_email = :email, u_rol = :rol, u_password = :password WHERE id = :id');
            $query->execute(
                [
                    'id' => $this->id,
                    'nickname' => $this->nickname,
                    'nombre'   => $this->nombre,
                    'email'    => $this->email,
                    'rol'      => $this->rol,
                    'password' => $this->password        
                ]
            );
            
            return $this;

        } catch (PDOException $e) {
            error_log('USERMODEL::getId -> PDOException '. $e);
        }
    }

    public function from($array)
    {
        
        $this->id       = $array['u_id'];
        $this->nickname = $array['u_nickname'];
        $this->nombre   = $array['u_nombre'];
        $this->email    = $array['u_email'];
        $this->rol      = $array['u_rol'];
        $this->password = $array['u_pass'];
    }

    // GETTERS & SETTERS
    public function setId($id)            { $this->id = $id; }
    public function setNickname($nickname){ $this->nickname = $nickname; }
    public function setNombre($nombre)    { $this->nombre = $nombre; }
    public function setEmail($email)      { $this->email = $email; }
    public function setRol($rol)          { $this->rol = $rol; }
    public function setPassword($password){ $this->password = $this->getHashedPassword($password); }
    
    public function getId()      { return $this->id; }
    public function getNickname(){ return $this->nickname; }
    public function getNombre()  { return $this->nombre; }
    public function getEmail()   { return $this->email; }
    public function getRol()     { return $this->rol; }
    public function getPassword(){ return $this->password; }
    

}
?>