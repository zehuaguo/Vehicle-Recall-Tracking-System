<?
	include "pass.php";
	$connction=ocilogon("zhengzih", $password, "SSID");

    $sql="SELECT * FROM VehicleRecalls WHERE lower(VIN) LIKE lower('%$VIN%')";
	echo $sql."<br>";
	$stmt=ociparse($connction, $sql);
	ociexecute($stmt);
	$html='<table id = "selectTable"><tr>
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
				  <td><a href = "Recallfor.html">'.ociresult($stmt, 'VIN').'</a></td>
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
	echo $html;
	
?>
";

