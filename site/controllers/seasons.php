<?php

$season = new seasonsController($_GET['s']);

class seasonsController
{
	function __construct($seasonID)
	{
		$this->seasons($seasonID);
	}
		
	function seasons($seasonID)
	{
		echo $seasonID;
	}
}