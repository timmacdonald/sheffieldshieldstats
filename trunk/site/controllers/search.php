<?php

$search = new searchController(htmlentities($_POST['search'], ENT_COMPAT, "UTF-8"), $_POST['wordLimit']);

class searchController
{
	function __construct($search, $wordLimit)
	{
		$this->search($search, $wordLimit);
		
	}
	
	function modelConnections()
	{
		require('../includes/modelConnections.php');
		$mc = new modelConnections();
		return $mc;
	}
	
	function title()
	{
		return "Search Players";
	}
	
	function sqlSearch($searchModel)
	{
		//sql statement for each search term looking for
				
		$select = array ("id, ", "first_name, ", "middle_names, ", "surname");
		$table = array ("players");
		$where = null;
		$order = null;
		$sql = $searchModel->buildReadConditions($select, $table, $where, $order);
				
		//want to return all players. return queries.
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
	
	function relevantSearch()
	{
		require('../controllers/relevantSearch.php');
		$relSearch = new relevantSearch();
		return $relSearch;
	}
		
	function search($search, $wordLimit)
	{
		//get required connections (model connection, database, crud and search optimisation)
		$mc = $this->modelConnections();
		$dbc = $mc->databaseConnection();
		$searchModel = $mc->crudModel();
		$relSearch = $this->relevantSearch();
		
		//explode search into an array for each word
		$searchArray = $relSearch->explode($search, $wordLimit);
		
		//get all Sql statements for each part of the search Array
		$sql = $this->sqlSearch($searchModel);
		
		//get search result of all players
		$data['return'] = $searchModel->read($sql, $dbc->mysqli($dbc->host(), $dbc->user(), $dbc->password(), $dbc->database()));
		
		$data['searchResult'] = $relSearch->calculateRelevancy($searchArray, $data['return'], $wordLimit);		
		$data['searchTerm'] = $search;
		$title = $this->title();
		unset($data['return']);
		$templateView = $this->templateView();
		$templateView->templateAll($title, $this->location(), $data);
	}
}