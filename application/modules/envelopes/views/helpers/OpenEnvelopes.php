<?php 
class Envelopes_View_Helper_OpenEnvelopes extends Zend_View_Helper_Abstract{
    
    protected $_mockupData = array(
        array('presentstatus' => 'BOUGHT', 'daysleft' => 7, 'id' => 234, 'type' => 'bday', 'closedate' => '2014-10-23' , 'forwhom' => 'Ronan Lescop' ,      'incharge' => 'Lucia Vicens', 'contributed' => 'Y'),
        array('presentstatus' => 'NOIDEAS', 'daysleft' => 5,'id' => 235, 'type' => 'bday', 'closedate' => '2014-11-25' , 'forwhom' => 'Karine Lesueur' ,    'incharge' => 'Lucia Vicens', 'contributed' => 'N'),
        array('presentstatus' => 'GIVEN', 'daysleft' => 3,'id' => 236, 'type' => 'bday', 'closedate' => '2014-11-30' , 'forwhom' => 'JB Verrey' ,         'incharge' => 'Lucia Vicens', 'contributed' => 'N'),
        array('presentstatus' => 'NONE', 'daysleft' => 2,'id' => 237, 'type' => 'baby', 'closedate' => '2014-12-21' , 'forwhom' => 'Loris Candylaftis' , 'incharge' => 'Lucia Vicens', 'contributed' => 'N'),
        array('presentstatus' => 'BOUGHT', 'daysleft' => 0,'id' => 238, 'type' => 'wedding', 'closedate' => '2014-12-24' , 'forwhom' => 'Gabriel Esparza' ,   'incharge' => 'Lucia Vicens', 'contributed' => 'N')
    );
    
    function openEnvelopes()
    {
        $html = array();
        $html[] = "<table id='open-envelopes-table' class='uk-table uk-table-striped uk-table-condensed'>";
        $html[] = $this->_getHeader();
        $html[] = $this->_getBody($this->_mockupData);
        $html[] = "</table>";
        return implode('',$html);
    }
    
    protected function _getHeader()
    {
        $html = array();
        $html[] = "<thead>";
        $html[] = "<tr>";
        
        $html[] = "<th>Last Call</th>";
        $html[] = "<th>Contributed</th>";
        $html[] = "<th>Subject</th>";
        $html[] = "<th>Present Status</th>";
        $html[] = "<th>In Charge</th>";
        $html[] = "</tr>";
        $html[] = "</thead>";
        return implode('',$html);
    }
    
    protected function _getBody(array $rows)
    {
        $html = array();
        $html[] = "<tbody>";
        foreach($rows as $row){
            $html[] = $this->_getRow($row);
        }
        $html[] = "</tbody>";
        return implode('',$html);
    }
    
    protected function _getRow(array $row)
    {
        $html = array();
        
        $html[] = "<tr envelope='{$row['id']}'>";
        
        
        $html[] = "<td>{$this->_getStatus($row['status'])}</td>";
        $html[] = "<td>{$row['closedate']}</td>";
        if($row['contributed'] == 'Y'){
            $html[] = "<td class='uk-text-center'><i class='uk-icon-check'></i></td>";
        }else{
            $html[] = "<td>&nbsp;</td>";
        }
        $html[] = "<td><a>{$this->_getType($row['type'], $row['forwhom'])}</a></td>";
        $html[] = "<td>{$this->_getPresentStatus($row['presentstatus'])}</td>";
        $html[] = "<td><a><i class='uk-icon-envelope'></i></a> {$row['incharge']}</td>";
        
        $html[] = "</tr>";
        return implode('',$html);
    }
    
    protected function _getStatus($value)
    {
        if($value == 'OPEN'){
            return "<div class='uk-badge uk-badge-success'>OPEN</div>";
        }elseif($value == 'CLOSED'){
            return "<div class='uk-badge uk-badge-danger'>CLOSED</div>";
        }
    }
    
    protected function _getPresentStatus($value)
    {
        if($value == 'NONE'){
            return "<div class='uk-badge uk-badge-success'>NOT BOUGHT</div>";
        }elseif($value == 'NOIDEAS'){
            return "<div class='uk-badge'>NO IDEAS</div>";
        }elseif($value == 'BOUGHT'){
            return "<div class='uk-badge uk-badge-warning'>BOUGHT</div>";
        }elseif($value == 'GIVEN'){
            return "<div class='uk-badge uk-badge-danger'>GIVEN</div>";
        }
    }
    
    protected function _getType($type,$forwhom)
    {
        switch($type){
            case 'bday':
                $icon = 'uk-icon-birthday-cake';
                $sentence = 'Birthday';
                break;
            case 'wedding':
                $icon = 'uk-icon-heart-o';
                $sentence = 'Wedding';
                break;
            case 'baby':
                $icon = 'uk-icon-child';
                $sentence = 'Baby';
                break;
        }
        return "<i class='{$icon}'></i> ".$forwhom."'s {$sentence}";
    }
}
