<?php
    namespace Decorator{
	abstract class TileDecorator extends Tile{
	    protected $_tile;
	    
	    function __construct(Tile $tile){
		$this->_tile = $tile;
	    }
	}
}