<?php
    namespace Visitor{
	class UnitScript{
	    static function joinExisting(Unit $newUnit,Unit $occupyingUnit)
	    {
		$comp;
		if(!is_null($comp = $occupyingUnit->getComposite())){
		    $comp->addUnit($newUnit);
		}else{
		    $comp = new Army();
		    $comp->addUnit($occupyingUnit);
		    $comp->addUnit($newUnit);
		}
		return $comp;
	    }
	}
}