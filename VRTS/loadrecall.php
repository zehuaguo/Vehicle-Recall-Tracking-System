<?
					include "pass.php";
					$connction=ocilogon("zhengzih", $password, "SSID");

					$sql="SELECT * FROM Details WHERE lower(VIN) LIKE lower('%$VIN%')";
					//echo $sql."<br>";
					$stmt=ociparse($connction, $sql);
					ociexecute($stmt);
					$html0='<form>
							  <table id = "selectTable">
								<tr>
								  <th>    </th>
								  <th>Active Recall?</th>
								  <th>Campaign Priority</th>
								  <th>Campaign No</th>
								  <th>PRA No</th>
								  <th>Description</th>
								  <th>Rectified?</th>
								  <th>Rectification Date</th>
								  
								</tr>';
					while(ocifetch($stmt))
					{
						$html0.='<tr>
									<td><span id="change">✎</span>      </td>
									<td id="1">'.$IF=(ociresult($stmt, 'VEHICLE_STATUS')=="ACTIVE"? "Yes":"NO").'</td>
									<td id="2">'.ociresult($stmt, 'PRIORITY').'</td>
									<td id="3">'.ociresult($stmt, 'CAMPAIGNNO').'</td>
									<td id="4">'.ociresult($stmt, 'PRA_NO').'</td>
									<td id="5">Replace fr...</td>
									<td id="6">'.ociresult($stmt, 'RECTIFIED').'</td>
									<td>'.ociresult($stmt, 'RECTIFICATION_DATE').'</td>
								</tr>';
						
					}
					$html0.='</table></form>';
					echo $html0;
					

?>