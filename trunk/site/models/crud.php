<?php

class crudModel
{

	function buildReadConditions($select = array('*'), $table, $where = null, $order = null)
	{
		$sql = "SELECT ";
		
		$sql .= $this->buildReadConditionsDeeper($select);
		$sql .= " FROM ";
		$sql .= $this->buildReadConditionsDeeper($table);
		
		if ($where != null)
		{
			$sql .= " WHERE ";
			$sql .= $this->buildReadConditionsDeeper($where);
		}
		
		if ($order != null)
		{
			$sql .= " ORDER BY ";
			$sql .= $this->buildReadConditionsDeeper($order);
		}
		
		return $sql;
	}
	
	function buildReadConditionsDeeper($data)
	{
		$sql = "";
		for ($a = 0; $a < count($data); ++$a)
			$sql .= $data[$a];
				
		return $sql;
	}
	
	
	
    function read($sql, $mysqli)
	{
		$data = $this->PerformQuery($sql, $mysqli);
		return $data;
	}
	
	function performQuery($sql, $mysqli)
	{
		$a = 0;
		$row = $temp = array();
		if ($result = $mysqli->query($sql))
		{
			while ($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$temp[$a] = $row;
				++$a;
			}
			
			$result->close();
			
		}
		
		return $temp;
	}
}

