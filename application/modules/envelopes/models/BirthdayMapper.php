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
            $bday = new Envelopes_Model_Birthday($row[0]['username'], $this->_filterDate($row[0]['birthday']), $row[0]['complete']);
            $bday->setId($id);
            return $bday;
        }
        return null;
    }
    
    protected function _filterDate($date)
    {
        $aux = explode('-',$date);
        return implode('-',array($aux[1],$aux[2]));
    }
    
    function createObject($username,$birthday)
    {
        $b = new Envelopes_Model_Birthday($username, $birthday);
        return $b;
    }
    
    function delete($id)
    {
        return $this->getAdapter()->delete('birthdays',"id = {$id}");
    }
    
    function save(Envelopes_Model_Birthday $birthday)
    {
        if($birthday->getId() == -1){
            //insert
            $this->_insert($birthday);
        }else{
            //update
            $this->_update($birthday);
        }
    }
    
    protected function _update(Envelopes_Model_Birthday $birthday)
    {
        $data = array('username'=>$birthday->getUsername(),'birthday' => $birthday->getDate());
        $this->getAdapter()->update('birthdays', $data, "id = {$birthday->getId()}");
    }
    
    protected function _insert(Envelopes_Model_Birthday $birthday)
    {
        $this->getAdapter()->insert('birthdays', array('username'=>$birthday->getUsername(),'birthday' => $birthday->getDate()));
        $birthday->setId($this->getAdapter()->lastInsertId());
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
        $sql = "
            select 
                b.*,
                u.complete
            from 
                birthdays b
                inner join users u on b.username = u.username
            order by 
                b.birthday asc
            ";
        return $this->getAdapter()->fetchAll($sql);
    }
}