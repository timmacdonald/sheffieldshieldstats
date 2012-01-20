<?php

$mc = new modelConnections();

class modelConnections
{
		
	function databaseConnection()
	{
		require('../models/database.php');
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