<?php
class Envelopes_Model_EnvelopeMapper{
    
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
            $envelope = new Envelopes_Model_Envelope($r['incharge'],$r['forwhom'],$r['closedate'],$r['comments']);
            $envelope->setId($r['id']);
            return $envelope;
        }
        return null;
    }
    
    function createObject($incharge,$forwhom,$type,$closedate,$comments)
    {
        return new Envelopes_Model_Envelope($incharge,$forwhom,$type,$closedate,$comments);
    }
    
    function save(Envelopes_Model_Envelope $envelope)
    {
        $data = array();
        $data['incharge'] = $envelope->getInCharge();
        $data['forwhom'] = $envelope->getForWhom();
        $data['closedate'] = $envelope->getCloseDate();
        $data['comments'] = $envelope->getComments();
        
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
    