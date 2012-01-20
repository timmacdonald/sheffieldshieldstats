<?php
class indexController
{	
	function templateView()
	{		
		require ('../views/template.php');
		$templateView = new templateView();
		return $templateView;
	}
	
	function sqlSeasons($indexModel)
	{
		//sql statement to get all seasons
		$select = array ("id, ", "season_start, ", "season_end");
		$table = array ("seasons");
		$where = null;
		$order = array ("season_start DESC, ", "season_end DESC");
		
		$sql = $indexModel->buildReadConditions($select, $table, $where, $order);
				
		return $sql;
	}
	
	function modelConnections()
	{
		require('../includes/modelConnections.php');
		return $mc;
	}
	
	function title()
	{
		return "Welcome To Shield Cricket Stats";
	}
	
	function location()
	{
		return "../views/index.php";
	}
	
	function startSite()
	{	
		$mc = $this->modelConnections();
		$dbc = $mc->databaseConnection();
		$indexModel = $mc->crudModel();
		$sql = $this->sqlSeasons($indexModel);
		
		$data['seasons'] = $indexModel->read($sql, $dbc->mysqli($dbc->host(), $dbc->user(), $dbc->password(), $dbc->database()));
		
		//pass the data to the view for display
		$title = $this->title();
		
		$templateView = $this->templateView();
		$templateView->templateAll($title, $this->location(), $data);
	}
}

