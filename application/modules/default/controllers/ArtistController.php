<?php
class ArtistController extends Zend_Controller_Action
{
    public function listAllArtistsAction()
    {
        
    }
    
    public function newAction()
    {
        //Get all genres
        $genres = array(
           "Country",
            "Rock",
            "Hip-Hop"
        );
        
        $this->view->genres= $genres;
    }
    
    public function saveArtistAction()
    {
        
    }
    
    public function artistaffiliatecontentAction()
    {
        echo 'hi'; exit;
    }
    
    public function profileAction()
    {
        echo 'aristname:';
        echo $this->_request->getParam('artistname');
        echo 'hi'; exit;
    }
}