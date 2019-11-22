<?php

function fetchMysql($result) {
	if($result->num_rows == 1){
		$rows = $result->fetch_assoc();
	} elseif($result->num_rows == 0) {
		$rows = "No result";
	} else {
		$rows = $result->fetch_all(MYSQLI_ASSOC);
	}
	return $rows;
}
function runQuery($col="*",$table, $join) {
	if($col == '*') {
		$cols = $col;
	} else {
		$cols = implode(", ", $col);
	}	
	$sql = "SELECT $cols FROM $table $join";
	
	global $conn;
	$result = mysqli_query($conn, $sql);
	$rows = fetchMysql($result);
	return $rows; 
}

function is_multidimensional($array) {
    return count($array) !== count($array, COUNT_RECURSIVE);
}
function createOneDimensional($array) {
	foreach($array as $key => $values) {
		echo "<th scope='col'>$key</th>";
	}
	
	echo "</tr></thead><tbody>";
	
	foreach($array as $key => $values) {
		echo "<td scope='col'>$array[$key]</td>";
	}
	echo "<td><a href='update.php?ID=" .$array['ID']. "'><button type='button' class='btn btn-info btn-block mb-3'>Edit</button></a>
	<a href='delete.php?ID=" .$array['ID']. "'><button type='button' class='btn btn-danger btn-block mb-3'>Delete</button></a>
	<a href='media.php?ID=" .$array['ID']. "'><button type='button' class='btn btn-success btn-block'>Show media</button></a></td>";
	echo "</tr></tbody>";
}
function createMultiDimensional($array) {
	foreach($array[0] as $key => $values) {
		echo "<th scope='col'>$key</th>";	
	}
	echo "</tr></thead><tbody>";
	foreach($array as $key => $row) {
		
		foreach( $row as $key2 => $value2) {
			if( strpos($row[$key2], 'jpg') || strpos($row[$key2], 'png') || strpos($row[$key2], 'JPG')) {
				echo "<td scope='col'><a href='$row[$key2]'/>Link</td>";
			} else {
				echo "<td scope='col'>$row[$key2]</td>";
			}
		}
		
	echo "<td><a href='update.php?ID=" .$array[$key]['ID']. "'><button type='button' class='btn btn-info btn-block mb-3'>Edit</button></a>
	<a href='delete.php?ID=" .$array[$key]['ID']. "'><button type='button' class='btn btn-danger btn-block mb-3'>Delete</button></a>
	<a href='media.php?ID=" .$array[$key]['ID']. "'><button type='button' class='btn btn-success btn-block'>Show media</button></a></td>";	
	echo "</tr></tbody>";
	}
}
function createTable($result) {
	$rows = $result;
	echo "<table class='table'><thead class='thead-light'><tr>";
	if (is_multidimensional($rows) == false) {
		createOneDimensional($rows);
		}
	else {
		createMultiDimensional($rows);
	}
}
?>