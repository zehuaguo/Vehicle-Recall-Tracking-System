<?

	include "pass.php";
	$connction=ocilogon("zhengzih", $password, "SSID");
	$Status=$_GET['Status'];
	//$A=$_POST['A'];
	//$ifActive="no";
	//if($A[0])
	// //{
		// if($A[1])
			// $ifActive=" ";
		// else $ifActive=$A[0];
		
	// }
	//echo $ifActive."<br>".$A[0]."<br>";
	
    $sql="SELECT * FROM VehicleRecalls WHERE lower(VIN) LIKE lower('%$Vin%') AND lower(MAKE) LIKE lower('%$Ma%') AND lower(MODEL) LIKE lower('%$Mo%') AND lower(REGISTRATION) LIKE('%$Re%') AND lower(VEH_ORGANISATION) LIKE lower('%$Manu%') AND lower(BU_ID) LIKE lower('%$Bu%') AND lower(Vehicle_Status) LIKE lower('$Status%')";
	//echo $sql."<br>";
	$stmt=ociparse($connction, $sql);
	ociexecute($stmt);
	$html='<table id = selectTable><tr>
				  <th class = "searchTable-row1-col1">VIN</th>
				  <th class = "searchTable-row1-col2">Registration</th>
				  <th class = "searchTable-row1-col3">Make</th>
				  <th class = "searchTable-row1-col4">Model</th>
				  <th class = "searchTable-row1-col5">Model Year</th>
				  <th class = "searchTable-row1-col6">Manufacturer</th>
				  <th class = "searchTable-row1-col7">Active Recall?</th>
				  <th class = "searchTable-row1-col8">No of Recalls Linked</th>
				</tr>';
	while(ocifetch($stmt))
	{
		$html.='<tr>
				  <td><a href = "Recallfor.php?VIN='.ociresult($stmt, 'VIN').'">'.ociresult($stmt, 'VIN').'</a></td>
				  <td>'.ociresult($stmt, 'REGISTRATION').'</td>
				  <td>'.ociresult($stmt, 'MAKE').'</td>
				  <td>'.ociresult($stmt, 'MODEL').'</td>
				  <td>'.ociresult($stmt, 'MODELYEAR').'</td>
				  <td>'.ociresult($stmt, 'VEH_ORGANISATION').'</td>
				  <td>'.ociresult($stmt, 'VEHICLE_STATUS').'</td>
				  <td>ACAMPGINNUMBER</td>
				</tr>';
		
	}
	$html.='</table>';
	//echo "asd".$Status;
	echo $html;
	
?>