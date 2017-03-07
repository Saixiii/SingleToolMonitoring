<?php
/* Set Connection Credentials */
$server="---------";
$database="-----------";
$user="----------";

$password="----------------";
 
/* Connect using SQL Server Authentication. */
$connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);
if (!$connection) {
  die("Failed");
}

 
/* TSQL Query */
$query = "Select * from data";

$result = odbc_exec($connection,$query);
if (!$result) {
  die("Invalid query");
}


/* Process results */
$json = array();
 
while ($row = odbc_fetch_array($result)) {
	$json[] = array('name'=>$row['Name'],'data'=>array( $row['JAN']
														,$row['FEB']
														,$row['MAR']
														,$row['APR']
														,$row['MAY']
														,$row['JUN']
														,$row['JUL']
														,$row['AUG']
														,$row['SEP']
														,$row['OCT']
														,$row['NOV']
														,$row['DEC']
														)
					);
}

echo json_encode($json,JSON_NUMERIC_CHECK );
$jsonData = json_encode($json,JSON_NUMERIC_CHECK );


 

             