<?php
class Form_BugReportListToolsForm extends Form_Form
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
        $sort = new Form_ElementSelect('sort', 'Sort');
        $sort->setOptions($options);
        $this->addElement($sort);
        $field = new Form_ElementSelect('field', 'Field');
        $field->setOptions($options);
        $this->addElement($field);
        
        $filter = new Form_ElementText('filter','Filter');
        $this->addElement($filter);
        
        $this->addElement(new Form_ElementSubmit('submit'));
    }
}