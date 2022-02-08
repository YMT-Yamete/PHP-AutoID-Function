<?php 
	function AutoID($prefix, $characterCount, $tableName, $fieldName)
	{
		$connect = mysqli_connect('localhost', 'root', '', 'testing');	//connect to database
		$select = "SELECT $fieldName FROM $tableName ORDER BY $fieldName DESC LIMIT 1";	//select last ID
		$query = mysqli_query($connect, $select);	//execute sql code
		$count = mysqli_num_rows($query);	//count the number of rows of the executed sql code
		$array = mysqli_fetch_array($query);	//fetch the data

		$leadingZeroString = "";
		$leadingZeroCount = $characterCount - strlen((string)$count);
		for ($i=0; $i < $leadingZeroCount; $i++) { 
			$leadingZeroString = $leadingZeroString . "0";
		}

		if ($count < 1) {
			$newID = $prefix . "-" . $leadingZeroString . "1";
			return $newID; 
		}
		else
		{
			$lastID = $array[$fieldName];	//lastID
			$lastID = trim($lastID, $prefix . "-");	//remove prefix and -
			$newValue = (int)$lastID + 1;	//plus one to previous id
			$newID = $prefix . "-" . $leadingZeroString . $newValue;
			return $newID;
		}
	}
?>