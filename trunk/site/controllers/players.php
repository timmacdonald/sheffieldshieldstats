<?php

$player = new playersController($_GET['s']);

class playersController
{
	function __construct($playerID)
	{
		$this->players($playerID);
	}
		
	function players($playerID)
	{
		echo $playerID;
	}
}