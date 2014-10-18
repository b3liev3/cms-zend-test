<?php
class Envelopes_Model_EnvelopeMapper{
    
    CONST DB_ID = 'id';
    CONST DB_INCHARGE = 'incharge';
    CONST DB_FORWHOM = 'forwhom';
    CONST DB_CLOSEDATE = 'closedate';
    CONST DB_COMMENTS = 'comments';
    CONST DB_YEAR = 'year';
    CONST DB_TYPE = 'type';
    
    CONST CONST_TYPE_BIRTHDAY = 'BIRTHDAY';
    CONST CONST_TYPE_BABY = 'BABY';
    CONST CONST_TYPE_WEDDING = 'WEDDING';
    CONST CONST_TYPE_OTHER = 'OTHER';
    
    function getAdapter()
    {
        return Zend_Db_Table::getDefaultAdapter();
    }
    
    /**
     * 
     * @param int $id
     * @return \Envelopes_Model_Envelope|null
     */
    function find($id)
    {
        $row = $this->getAdapter()->fetchAll("select * from envelopes where id = ?",$id);
        if($row){
            $r = $row[0];
            $envelope = new Envelopes_Model_Envelope($r[self::DB_INCHARGE],$r[self::DB_FORWHOM],$r[self::DB_CLOSEDATE],$r[self::DB_COMMENTS]);
            $envelope->setId($r[self::DB_ID]);
            return $envelope;
        }
        return null;
    }
    
    function createObject(array $data)
    {
        if(!isset($data[self::DB_INCHARGE])){
            $data[self::DB_INCHARGE] = '';
        }
        if(!isset($data[self::DB_FORWHOM])){
            $data[self::DB_FORWHOM] = '';
        }
        if(!isset($data[self::DB_TYPE])){
            $data[self::DB_TYPE] = '';
        }
        if(!isset($data[self::DB_CLOSEDATE])){
            $data[self::DB_CLOSEDATE] = '';
        }
        if(!isset($data[self::DB_COMMENTS])){
            $data[self::DB_COMMENTS] = '';
        }
        if(!isset($data[self::DB_YEAR])){
            $data[self::DB_YEAR] = '';
        }
        if(!isset($data[self::DB_TYPE])){
            $data[self::DB_TYPE] = '';
        }
        return new Envelopes_Model_Envelope($data[self::DB_INCHARGE],$data[self::DB_FORWHOM],$data[self::DB_TYPE],$data[self::DB_CLOSEDATE], $data[self::DB_COMMENTS],$data[self::DB_YEAR],$data[self::DB_TYPE]);
    }
    
    function save(Envelopes_Model_Envelope $envelope)
    {
        $data = array();
        $data[self::DB_INCHARGE] = $envelope->getInCharge();
        $data[self::DB_FORWHOM] = $envelope->getForWhom();
        $data[self::DB_CLOSEDATE] = $envelope->getCloseDate();
        $data[self::DB_COMMENTS] = $envelope->getComments();
        $data[self::DB_YEAR] = $envelope->getYear();
        $data[self::DB_TYPE] = $envelope->getType();
        
        if($envelope->hasBeenSaved()){
            $this->_insert($data);
        }else{
            $this->_update($envelope->getId(), $data);
        }
    }
    
    function getEnvelopeTableRows()
    {
        $date = date('m-d',time());
        $thisYear = date('Y',time());
        $nextYear = $thisYear + 1;
        $sql = "SELECT
                    case when b.birthday > '1900-{$date}' then {$thisYear}
                    else {$nextYear} end as 'finalyear',
                    b.id as birthdayid,
                    b.*,
                    e.id as envelopeid,
                    e.*,
                    ifnull(e.year,'1900-1-1') as year,
                    u.*
                FROM
                    birthdays b
                    inner join users u on b.username = u.username
                    left outer join envelopes e on b.username = e.forwhom
                WHERE
                    ifnull(e.type,'BIRTHDAY') = 'BIRTHDAY'
                    and u.has_envelope = 1
                order by 
                    b.birthday asc,
                    u.username asc,
                    ifnull(e.year,'1900-1-1') asc
            ";
        
        $rows = $this->getAdapter()->fetchAll($sql);            
                    
        $res = array();            
        if($rows){
            foreach($rows as $row){
                $code = $row['birthday'].$row['username'];
                $res[$code] = array(
                    'birthday' => $row['birthday'],
                    'YEAR' => $row['finalyear'],
                    'username' => $row['username'],
                    'complete' => $row['complete'],
                    'birthdayid' => $row['birthdayid'],
                    'envelopeid' => $row['envelopeid']);
            }
        }
        
        return $res; 
    }
    
    protected function _update($id,array $data)
    {
        
    }
    
    protected function _insert(array $data)
    {
        
    }
    
}
    