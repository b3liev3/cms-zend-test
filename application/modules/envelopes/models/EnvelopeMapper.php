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
    
    function createObject($incharge,$forwhom,$closedate,$comments)
    {
        return new Envelopes_Model_Envelope($incharge,$forwhom,$closedate,$comments);
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
    
    protected function _update($id,array $data)
    {
        
    }
    
    protected function _insert(array $data)
    {
        
    }
    
}
    