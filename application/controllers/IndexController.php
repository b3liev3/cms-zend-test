<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
                 
    }
    
    public function sessionTestAction()
    {
	  // action body
        echo "<pre>";
        echo print_r($_REQUEST,true);
        echo "</pre>";
        
        setcookie("message","no problemo");
        
        if(isset($_COOKIE['message'])){
            echo $_COOKIE['message'].'<br/>';
        }
        
        session_start();
        if(!isset($_SESSION['count'])){
            $_SESSION['count'] = 0;
        }else{
            $_SESSION['count']++;
        }
        echo 'counter: '.$_SESSION['count'].'<br/>';
    }


}

