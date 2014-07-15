<?php
    namespace Composition {
	abstract class CostStrategy {

	    abstract function cost(Lesson $lesson);

	    abstract function chargeType();
	}
    }