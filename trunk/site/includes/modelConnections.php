<?php

class modelConnections
{
		
	function databaseConnection()
	{
		require('../../../../dbc/shieldcricket/database.php');
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
