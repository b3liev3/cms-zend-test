<?php
class Form_BugReportListToolsForm extends Pform\Form
{    
    public function __construct()
    {
        parent::__construct('/bug/list');
        
        $options = array(
            '0' => 'None',
            'priority' => 'Priority',
            'status' => 'Status',
            'date' => 'Date',
            'url' => 'URL',
            'author' => 'Submitter'
        );
        $sort = new Pform\ElementSelect('sort', 'Sort');
        $sort->setOptions($options);
        $this->addElement($sort);
        $field = new Pform\ElementSelect('field', 'Field');
        $field->setOptions($options);
        $this->addElement($field);
        
        $filter = new Pform\ElementText('filter','Filter');
        $this->addElement($filter);
        
        $this->addElement(new Pform\ElementSubmit('submit'));
    }
}