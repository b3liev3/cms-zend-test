<?php
namespace Pform{
class ElementHidden extends Input
{
    public function __construct($name) {
	$this->type = 'hidden';
        parent::__construct($name);
    }

}
}