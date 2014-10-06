<?php
class Envelopes_Model_UserMapper{
    
    function getAdapter()
    {
        return Zend_Db_Table::getDefaultAdapter();
    }
    
    
    function findRow($username)
    {
        $row = $this->getAdapter()->fetchAll("select * from users where username like ?",$username);
        if($row){
            return $row[0];
        }
        return $row;
    }
    
    function findAllRows()
    {
        return $this->getAdapter()->fetchAll("select * from users order by username");
    }
    
    function findAllUsersWithNoBirthdays()
    {
        return $this->getAdapter()->fetchAll("SELECT 
                                                u.*
                                                from
                                                users u
                                                left outer join birthdays b on u.username = b.username
                                                where b.id is null");
    }
}
    