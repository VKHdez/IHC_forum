<?php
require 'src/main/controllers/controller.php';
require 'src/main/models/usermodel.php';

/**
 * CLASS SessionController
 * 
 * @category None
 * @package  None
 * @author   VictorHdez <victor.hdezalvarez@gmail.com>
 * @license  GNU
 * @link     None
 */
class SessionController extends Controller {
    private $userSession;
    private $username;
    private $userid;

    private $session;
    private $site;

    private $user;

    /**
     * Function __construct
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    /**
     * FUNCTION _init
     * 
     * @return void
     */
    private function _init()
    {
        $this->session = new Session();

        $json = $this->getJSONFileConfig();
        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];

        $this->validateSession();
    }

    private function getJSONFileConfig()
    {
        $string = file_get_contents('src/conf/access.json');    
        
        $json = json_decode($string, true);

        return $json;
    }

    public function validateSession()
    {
        error_log('SESSIONCONTROLLER:: Validate Session');

        if ($this->existsSession()) {
            $rol = $this->getUserSessionData()->getRol();

            if ($this->isPublic()) {
                $this->redirectDefaultSiteByRole($rol);
            } else {
                if ($this->isAuthorized($rol)) { // Login
                    error_log('SESSION CONTROLLER:: validateSession() -> Authorized access');
                } else {
                    $this->redirectDefaultSiteByRole($rol);
                }
            }

        } else {

            if ($this->isPublic()) {

            } else {
                header('Location: '. constant('URL'). '');
            }
        
        }
    }

    function existsSession(){
        if($this->session->exists()) return false;
        if($this->session->getCurrentUser() == null ) return false;

        $userid = $this->session->getCurrentUser();

        if($userid) return true;

        return false;
    }

    function getUserSessionData()
    {
        $id = $this->session->getCurrentUser();

        $this->user = new UserModel();
        $this->user->get($id);

        error_log('SESSIONCONTROLLER::getUserSessionData -> '. $this->user->getNickname());

        return $this->user;
    }

    function isPublic(){

        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for($i = 0; $i< sizeof($this->sites); $i++ ){

            if( ( $currentURL == $this->sites[$i]['site'] ) && $this->sites[$i]['access'] == 'public' ){

                return true;
            }
        }

        return false;
    }

    function getCurrentPage(){
        
        $actualLink = trim($_SERVER['REQUEST_URI']);
        $url = explode('/', $actualLink);
        error_log("SESSIONCONTROLLER::getCurrentPage -> ". $url[3]);
        
        return $url[3];
    }

    private function redirectDefaultSiteByRole( $rol )
    {
        $url = '';
        for ( $i=0; $i < sizeof($this->sites); $i++ ) {
            if ($this->sites[$i]['rol'] == $rol) {
                $url = $this->sites[$i]['site'];
                break;
            }
        }

        header('location:'. constant('URL') . $url);
    }

    private function isAuthorized( $rol )
    {
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for($i = 0; $i< sizeof($this->sites); $i++ ){
            if( $currentURL = $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public' ){
                return true;
            }
        }

        return false;
    }

    function initialize( $user )
    {        
        $this->session->setCurrentName($user->getNickname());
        $this->session->setCurrentUser($user->getId());

        $this->authorizeAccess($user->getRol());
    }

    function authorizeAccess( $rol )
    {
        switch( $rol ) {
        case 'usuario':
            $this->redirect($this->defaultSites['usuario'], []);
            break;
        case 'admin':
            $this->redirect($this->defaultSites['admin'], []);
            break;
        }
    }

    function logout()
    {
        $this->session->closeSession();
    }
}

?>