<?
					include "pass.php";
					$connction=ocilogon("zhengzih", $password, "SSID");

					// this is for comunications.................................................................................
					$sql2="SELECT * FROM comunication WHERE lower(VIN) LIKE lower('%$VIN%')";
					//echo $sql."<br>";
					$stmt2=ociparse($connction, $sql2);
					ociexecute($stmt2);
					$htmlcomu='<form>
							  <table id = "selectTable">
								<tr>
								  <th>    </th>
								  <th>Comunication</th>
								  <th>Recipient</th>
								  <th>Recall</th>
								  <th>Contact Information</th>
								  <th>Date of Comunication</th>
								  <th>Description</th>
								</tr>';
					while(ocifetch($stmt2))
					{
						$htmlcomu.='<tr>
									<td><span id="change">✎</span>      </td>
									<td id="2">'.ociresult($stmt2, 'COMM_METHOD_ID').'</td>
									<td id="3">'.ociresult($stmt2, 'RECIPIENT').'</td>
									<td id="4">'.ociresult($stmt2, 'RECALL').'</td>
									<td id="2">'.ociresult($stmt2, 'CONTACT').'</td>
									<td id="3">'.ociresult($stmt2, 'LASTUPDATE_DATE').'</td>
									<td id="4">'.ociresult($stmt2, 'DESCRIPTION').'</td>
									
								</tr>';
						
					}
					$htmlcomu.='</table></form>';
					echo $htmlcomu;
?>