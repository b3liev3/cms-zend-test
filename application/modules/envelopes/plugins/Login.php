<?php

class Envelopes_Plugin_Login extends Zend_Controller_Plugin_Abstract {

    CONST CONST_EXPIRATION_TIME = 900;
    
    function __construct()
    {

    }

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $login = new Zend_Session_Namespace('Envelopes');
        $login->setExpirationSeconds(self::CONST_EXPIRATION_TIME);
        if(!isset($login->user)){
            $url = $this->_getUrl($request);
            $login->redirectTo = $url;
            $request->setModuleName('envelopes')->setControllerName('index')->setActionName('login');
        }else{
            if(isset($_GET['as']) && $login->user->isSuperAdmin()){
                $mapper = new Envelopes_Model_UserMapper();
                $user = $mapper->find($_GET['as']);
                if($user){
                    Zend_Registry::set('user',$user);
                    Envelopes_Model_Messages::add('Seeing it as '.$_GET['as'],'warning');
                }else{
                    Envelopes_Model_Messages::add('User '.$_GET['as'].' not found','error');
                    Zend_Registry::set('user',$login->user);
                }
            }else{
                Zend_Registry::set('user',$login->user);
            }
        }
    }
    
    protected function _getUrl(Zend_Controller_Request_Abstract $request)
    {
        $url = array();
        $url[] = $request->getModuleName();
        $url[] = $request->getControllerName();
        $url[] = $request->getActionName();
        return implode('/',$url).$this->_getParams($request);
    }
    
    protected function _getParams(Zend_Controller_Request_Abstract $request)
    {
        
        $params = $request->getParams();
        $res = array();
        
        $notParam = array('module','controller','action','user','password','login');
        if($params){
            foreach($params as $key => $param){
                if(!in_array($key,$notParam)){
                    if(is_string($param) && is_string($key)){
                        $res[] = $key.'='.$param;
                    }else{
                        //???
                    }
                }
            }
        }
        
        if($res){
            return '?'.implode('&',$res);
        }else{
            return '';
        }
        
    }
}