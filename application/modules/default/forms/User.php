<?php
class Form_User extends Pform\Form
{
    public function __construct() {
        parent::__construct('');
        
        $id = new Pform\ElementHidden('id');
        $username = new Pform\ElementText('user');
        $username->setLabel('Username');
        $firstname = new Pform\ElementText('firstname');
        $firstname->setLabel('Firstname');
        $lastname = new Pform\ElementText('lastname');
        $lastname->setLabel('Lastname');
        $update = new \Pform\ElementSubmit('update');
        $update->setValue('Update');
        
        $this->addElement($id)
                ->addElement($username)
                ->addElement($firstname)
                ->addElement($lastname)
                ->addElement($update);
    }
}