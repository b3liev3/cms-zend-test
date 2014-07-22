<?php
    namespace Visitor{
	abstract class Unit{
	    
	    protected $depth = 0;
	    
	    function accept(ArmyVisitor $visitor)
	    {
		$method = "visit".$this->stripNamespaceFromClassName($this);
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
	    
	    public function stripNamespaceFromClassName($obj)
	    {
		$classname = get_class($obj);

		if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
		    $classname = $matches[1];
		}

		return $classname;
	    }
	    
	    abstract function bombardStrength();
	}
}