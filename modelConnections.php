<?php

$mc = new modelConnections();

class modelConnections
{
		
	function databaseConnection()
	{
		require('../../../dbc/shieldcricket/database.php');
		//require('../../../dbc/shieldcricket/test.php');
		$dbc = new databaseConnection();
		return $dbc;
	}
	
	function crudModel()
	{
		require('../models/crud.php');
		$crudModel = new crudModel();
		return $crudModel;
	}


}