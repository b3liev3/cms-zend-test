<?php
class Form_BugReportForm extends Form_Form
{
    public function __construct()
    {
        parent::__construct('/bug/submit');
        $this->setId('bug-form');
        
        $author = new Form_ElementText('author','Author');
        $author->setRequired();
        $email = new Form_ElementText('email','Email');
        $email->setRequired();
        $date = new Form_ElementText('date','Date');
        $date->setRequired();
        $url = new Form_ElementText('url','URL');
        $url->setRequired();
        $description = new Form_ElementTextarea('description','Description');
        $description->setRequired();
        $priority = new Form_ElementSelect('priority','Priority');
        $priority->setOptions(array(
            'prio-1' => 'prio1',
            'prio-2' => 'prio2',
            'prio-3' => 'prio3'
        ))
        ->setRequired();
        $status = new Form_ElementSelect('status','Status');
        $status->setOptions(array(
            'option-1' => 'option1',
            'option-2' => 'option2',
            'option-3' => 'option3'
        ))
        ->setRequired();
        $submit = new Form_ElementSubmit('submit','Submit');
        
        $this->addElement($author)
                ->addElement($email)
                ->addElement($date)
                ->addElement($url)
                ->addElement($description)
                ->addElement($priority)
                ->addElement($status)
                ->addElement($submit);
    }
    
}