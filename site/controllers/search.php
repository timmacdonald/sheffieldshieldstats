<?php

$search = new searchController($_GET['search']);

class searchController
{
	function __construct($search)
	{
		$this->search($search);
	}
	
	function modelConnections()
	{
		require('../includes/modelConnections.php');
		return $mc;
	}
	
	function title()
	{
		return "Search Players";
	}
	
	function sqlSearch($searchModel, $search)
	{
		//sql statement to get all seasons
		$select = array ("*");
		$table = array ("players");
		$where = array ("first_name LIKE '%$search%' OR ", "middle_names LIKE '%$search%' OR ", "surname LIKE '%$search%'");
		$order = null;
		
		$sql = $searchModel->buildReadConditions($select, $table, $where, $order);
		return $sql;	
	}
	
	function searchView()
	{
		require('../views/search.php');
		$searchView = new searchView();
		return $searchView;		
	}
	
	function templateView()
	{		
		require ('../views/template.php');
		$templateView = new templateView();
		return $templateView;
	}
	
	function location()
	{
		return "../views/search.php";
	}	
		
	function search($search)
	{
		$mc = $this->modelConnections();
		$dbc = $mc->databaseConnection();
		$searchModel = $mc->crudModel();
		$sql = $this->sqlSearch($searchModel, $search);
						
		$data['searchReturn'] = $searchModel->read($sql, $dbc->mysqli($dbc->host(), $dbc->user(), $dbc->password(), $dbc->database()));
		
		$title = $this->title();
		
		$templateView = $this->templateView();
		$templateView->templateAll($title, $this->location(), $data);
	}
}