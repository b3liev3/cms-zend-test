<?php
    namespace Request{
	abstract class ProcessRequest{
	    abstract function process(RequestHelper $req);
	}
}