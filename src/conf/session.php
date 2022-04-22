<?php
/**
 * Session Class
 * This class provides an abstraction to set and destroy the sessions using $_SESSION global variable 
 * 
 * @category Class
 * @package  None
 * @author   VictorHdez <victor.hdezalvarez@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     None
 */
class Session
{

    private $_sessionName = 'usuario';
    private $_sessionID = 1;

    /**
     * Method __construct 
     * 
     * @return void None
     */
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE ) {
            session_start();
        }
    }

    /**
     * Method setCurrentUser
     * 
     * @param string $user - User to be added to the $_SESSION Variable
     * 
     * @return void None
     */
    public function setCurrentUser( $id )
    {
        $_SESSION['id'] = $id;
    }
    
    /**
     * 
     */
    public function setCurrentName( $user )
    {
        $_SESSION[$this->_sessionName] = $user;
    }

    public function getCurrentUser()
    {
        return $_SESSION['id'];
    }

    public function getCurrentName()
    {
        return $_SESSION[$this->_sessionName];
    }

    public function closeSession()
    {
        session_unset();
        session_destroy();
    }

    public function exists()
    {
        return isset($_SESSION[$this->_sessionName]);
    }

}
?>