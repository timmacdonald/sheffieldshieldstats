<?php

class databaseConnection
{
		
	function __construct()
	{
		$host = $this->host();
		$user = $this->user();
		$password = $this->password();
		$database = $this->database();
		$mysqli = $this->mysqli($host, $user, $password, $database);
	}
		
	function host()
	{
		$host = 'localhost';
		return $host;
	}
	
	function user()
	{
		$user = 'root';
		return $user;
	}
	
	function password()
	{
		$password = '';
		return $password;
	}
	
	function database()
	{
		$database = 'cricket';
		return $database;
	}
	
	function mysqli($host, $user, $password, $database)
	{
		$mysqli = new mysqli($host, $user, $password, $database);
		return $mysqli;
	}
}
		
?>
