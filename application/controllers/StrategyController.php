<?php
class StrategyController extends Zend_Controller_Action
{
    public function indexAction()
    {
	$markers = array(new \Strategy\RegexpMarker("/f.ve/"),
		new \Strategy\MatchMarker("five"),
		new Strategy\MarkLogicMarker('$input equals "five"'));

	foreach($markers as $marker){
	    print get_class($marker).'<br/>';
	    $question = new \Strategy\TextQuestion("how many beans make five", $marker);
	    foreach(array("five","four") as $response){
		echo "response:{$response}: ";
		if($question->mark($response)){
		    echo "well done<br/>";
		}else{
		    echo "never mind<br/>";
		}
	    }
	}
        exit;
    }
}