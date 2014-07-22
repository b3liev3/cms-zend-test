<?php
    namespace Visitor {
	class TextDumpArmyVisitor extends ArmyVisitor{
	    private $text = "";
	    
	    function visit(Unit $node)
	    {
		$txt = "";
		$pad = 4 * $node->getDepth();
		$txt .= sprintf("%{$pad}s","");
		$txt .= get_class($node).": ";
		$txt .= "bombard: ".$node->bombardStrength()."<br/>";
		$this->text .= $txt;
	    }
	    
	    function getText()
	    {
		return $this->text;
	    }
	}
    }