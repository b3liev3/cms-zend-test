<?php
class Form_BugReportForm extends Pform\Form
{
    public function __construct()
    {
        parent::__construct('/bug/submit');
        $this->setId('bug-form');
        
        $author = new Pform\ElementText('author','Author');
        $author->setRequired();
        $id = new Pform\ElementHidden('id');
        $email = new Pform\ElementText('email','Email');
        $email->setRequired();
        $date = new Pform\ElementText('date','Date');
        $date->setRequired();
        $url = new Pform\ElementText('url','URL');
        $url->setRequired();
        $description = new Pform\ElementTextarea('description','Description');
        $description->setRequired();
        $priority = new Pform\ElementSelect('priority','Priority');
        $priority->setOptions(array(
            'prio-1' => 'prio1',
            'prio-2' => 'prio2',
            'prio-3' => 'prio3'
        ))
        ->setRequired();
        $status = new Pform\ElementSelect('status','Status');
        $status->setOptions(array(
            'option-1' => 'option1',
            'option-2' => 'option2',
            'option-3' => 'option3'
        ))
        ->setRequired();
        $submit = new Pform\ElementSubmit('submit','Submit');
        
        $this->addElement($author)
                ->addElement($id)
                ->addElement($email)
                ->addElement($date)
                ->addElement($url)
                ->addElement($description)
                ->addElement($priority)
                ->addElement($status)
                ->addElement($submit);
    }
    
}