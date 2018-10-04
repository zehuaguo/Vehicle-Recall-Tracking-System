<?
					include "pass.php";
					$connction=ocilogon("zhengzih", $password, "SSID");

					// this is for notes................................................................
					
					$sql1="SELECT * FROM NOTES WHERE lower(VIN) LIKE lower('%$VIN%')";
					//echo $sql."<br>";
					$stmt1=ociparse($connction, $sql1);
					ociexecute($stmt1);
					$htmlnote='<div id="DisplayTablelower"><form>
							  <table id = "selectTable">
								<tr>
								  <th>    </th>
								  <th>recall date</th>
								  <th>recall by</th>
								  <th>notes</th>
								</tr>';
					while(ocifetch($stmt1))
					{
						$htmlnote.='<tr>
									<td><span id="change">✎</span>      </td>
									<td id="2">'.ociresult($stmt1, 'RECALL_DATE').'</td>
									<td id="3">'.ociresult($stmt1, 'RECALL_BY').'</td>
									<td id="4">'.ociresult($stmt1, 'NOTES').'</td>
									
								</tr>';
						
					}
					$htmlnote.='</table></form></div>';

					echo $htmlnote;
?>