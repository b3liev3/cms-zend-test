<?php
class Form_BugReportListToolsForm
{
    protected $form;
    
    public function __call($name,$arguments)
    {
        return $this->form->{$name}($arguments[0]);
    }
    
    public function __toString()
    {
        return $this->form->render();
    }
    
    public function __construct()
    {
        $this->form = new Form_Form('/bug/list');
        
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
        $this->form->addElement($sort);
        $field = new Form_ElementSelect('field', 'Field');
        $field->setOptions($options);
        $this->form->addElement($field);
        
        $filter = new Form_ElementText('filter','Filter');
        $this->form->addElement($filter);
        
        $this->form->addElement(new Form_ElementSubmit('submit'));
    }
}