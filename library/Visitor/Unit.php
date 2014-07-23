<?php
    namespace Visitor{
	abstract class Unit{
	    
	    protected $depth = 0;
	    
	    function accept(ArmyVisitor $visitor)
	    {
		$method = "visit".\Utilities\Utilities::stripNamespaceFromClassName($this);
		$visitor->$method($this);
	    }
	    
	    protected function setDepth($depth)
	    {
		$this->depth = $depth;
	    }
	    
	    function getDepth()
	    {
		return $this->depth;
	    }
	    
	    function getComposite()
	    {
		return null;
	    }
	    
	    abstract function bombardStrength();
	}
}