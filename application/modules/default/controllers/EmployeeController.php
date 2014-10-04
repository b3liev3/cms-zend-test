<?php
    class EmployeeController extends Zend_Controller_Action {

	public function init()
	{
	    /* Initialize action controller here */
	}

	public function indexAction()
	{
	   $boss = new Employee\NastyBoss();
	   $boss->addEmployee(Employee\Employee::recruit("Harry"));
	   $boss->addEmployee(Employee\Employee::recruit("Bob"));
	   $boss->addEmployee(Employee\Employee::recruit("Mary"));
	   
	   $boss->projectFails();
	   $boss->projectFails();
	   $boss->projectFails();

	   exit;
	}
    }