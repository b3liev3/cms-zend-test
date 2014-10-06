<?php
class Envelopes_Model_BirthdayMapper{
    
    function getAdapter()
    {
        return Zend_Db_Table::getDefaultAdapter();
    }
    
    
    function find($id)
    {
        $row = $this->getAdapter()->fetchAll("select 
            b.username,
            b.birthday,
            u.complete,
            b.id
            from 
            birthdays b
            inner join users u on b.username = u.username
            where b.id = ?",$id);
        if($row){
            $bday = new Envelopes_Model_Birthday($row[0]['username'], $row[0]['complete'], $row[0]['birthday']);
            $bday->setId($id);
            return $bday;
        }
        return null;
    }
    
    function findByUsername($username)
    {
        $row = $this->getAdapter()->fetchAll("select
            b.username,
            b.birthday,
            u.complete,
            b.id
            from 
            birthdays b
            inner join users u on b.username = u.username
            where b.username = ?",$username);
        if($row){
            $bday = new Envelopes_Model_Birthday($row[0]['username'], $row[0]['complete'], $row[0]['birthday']);
            $bday->setId($row[0]['id']);
            return $bday;
        }
        return null;
    }
    
    function findAllRows()
    {
        return $this->getAdapter()->fetchAll("select * from birthdays order by birthday");
    }
}