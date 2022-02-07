<?php 
	//example -> GeneratedAutoId("M", 5, 12) = M-00012
	function GeneratedAutoID($prefix, $letterCount, $dataCount)
	{
		$dataCountLength = strlen((string)$dataCount);
		$leadingZeroCount = $letterCount - $dataCountLength;
		$leadingZeroString = "";
		for ($i=0; $i < $leadingZeroCount; $i++) { 
			$leadingZeroString = $leadingZeroString . "0";
		}
		$id = $prefix . "-" . $leadingZeroString . $dataCount;
		return $id;
	}
?>