<?php
	$connect = mysqli_connect("localhost", "root", "", "ajax01");
	$request = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT * FROM tbcountryname WHERE CountryName LIKE '%".$request."%'";
	$result = mysqli_query($connect, $query);
	$data = array();
	if(mysqli_num_rows($result) > 0)
	{
	 while($row = mysqli_fetch_assoc($result))
	 {
	  $data[] = $row["CountryName"];
	 }
	 echo json_encode($data);
	}

	
?>