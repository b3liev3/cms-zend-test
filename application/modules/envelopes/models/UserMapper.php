<?php
class Envelopes_Model_UserMapper{
    
    protected function _getAdapter()
    {
        return Zend_Db_Table::getDefaultAdapter();
    }
    
    /**
     * 
     * @param string $username
     * @return array
     */
    function findRow($username)
    {
        $row = $this->_getAdapter()->fetchAll("select * from users where username like ?",$username);
        if($row){
            return $row[0];
        }
        return $row;
    }
    
    /**
     * 
     * @return array
     */
    function findAllRows()
    {
        return $this->_getAdapter()->fetchAll("select * from users order by username");
    }
    
    /**
     * 
     * @return array
     */
    function findAllUsersWithNoBirthdays()
    {
        return $this->_getAdapter()->fetchAll("SELECT 
                                                u.*
                                                from
                                                users u
                                                left outer join birthdays b on u.username = b.username
                                                where b.id is null");
    }
    
    protected function _getRights($username)
    {
        if(in_array($username,array('ppages'))){
            return array('superadmin');
        }
        return array();
    }
    
    function find($id)
    {
        $row = $this->_getAdapter()->fetchAll("select * from users where username like ?",$id);
        if($row){
             /*
            [username] => ppages
            [complete] => Pere Pages
            [has_envelope] => 0
              */
            $data = $row[0];
            $rights = $this->_getRights($data['username']);
            if($data['has_envelope'] == 1){
                $hasEnvelope = true;
            }else{
                $hasEnvelope = false;
            }
            return new Envelopes_Model_User($data['username'], $rights, $data['complete'], $hasEnvelope);
        }
        return null;
    }
    
    function save(Envelopes_Model_User $user)
    {
        
    }
}
    