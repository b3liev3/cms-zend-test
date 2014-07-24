<?php
    namespace PageController {
	class AddVenueController extends PageController {

	    function process()
	    {
		try {
		    $request = $this->getRequest();
		    $name = $request->getProperty('venu_name');
		    if (is_null($request->getProperty('submitted'))) {
			$request->addFeedback('choose name for the venue');
			$this->forward('add_venue.php');
		    } elseif (is_null($name)) {
			$request->addFeedback("name is a required field");
			$this->forward("add_venue.php");
		    }
		    
		    $venue = new \Domain\Venue(null, $name);
		    //add to database
		    $this->forward("ListVenues.php");
		} catch (Exception $e) {
		    $this->forward('error.php');
		}
	    }
	}
    }