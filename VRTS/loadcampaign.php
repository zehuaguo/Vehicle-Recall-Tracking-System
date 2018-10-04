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
	
    $sql="SELECT * FROM MASTER_Recall WHERE lower(Recall_Number) LIKE lower('%$cn%') AND lower(PRA_Number) LIKE lower('%$pn%') AND lower(CreateDate) LIKE lower('%$year%')";
	//echo $sql."<br>";
	$stmt=ociparse($connction, $sql);
	ociexecute($stmt);
	$html='<table id = selectTable>
                <tr>
                  <th>Campaign Number</th>
                  <th>PRA Number</th>
                  <th>Data Published</th>
                  <th>Priority</th>
                  <th>Active Recall</th>
                </tr>';
	while(ocifetch($stmt))
	{
		$html.='<tr>
                  <td><a href = "Campaigninformation.php?CID="'.ociresult($stmt, "CAMPIGN_ID").'>'.ociresult($stmt, "RECALL_NUMBER").'</a></td>
                  <td>'.ociresult($stmt, "PRA_NUMBER").'</td>
                  <td>'.ociresult($stmt, "CREATEDATE").'</td>
                  <td>'.ociresult($stmt, "PRIORITY_ID").'</td>
                  <td>'.ociresult($stmt, "ACTIVE").'</td>
                </tr>';
		
	}
	$html.='</table>';
	//echo "asd".$Status;
	echo $html;
	
?>