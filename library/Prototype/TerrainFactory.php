<?php
    namespace Prototype {
	class TerrainFactory{
	    private $_sea;
	    private $_forest;
	    private $_plains;
	    
	    function __construct(Sea $sea, Plains $plains, Forest $forest)
	    {
		$this->_sea = $sea;
		$this->_forest = $forest;
		$this->_plains = $plains;
	    }
	    
	    function getSea()
	    {
		return clone $this->_sea;
	    }
	    
	    function getPlains()
	    {
		return clone $this->_plains;
	    }
	    
	    function getForest()
	    {
		return clone $this->_forest;
	    }
	}
    }