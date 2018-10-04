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
	
    $sql="SELECT * FROM MASTER_Recall WHERE lower(Campign_ID) LIKE lower('%$CID%')";
	//echo $sql."<br>";
	$stmt=ociparse($connction, $sql);
	ociexecute($stmt);

	if(isset($submit))
	{
		$sql1="SELECT * FROM MASTER_Recall";
		$stmt1=ociparse($connect,$sql);
		ociexecute($stmt1);
		$i=0;
		while(ocifetch($stmt1))
		{
			if(ociresult($stmt1,'ID')>$i)
				$i=ociresult($stmt1,'ID');
			
			
		}
		$i++;
		$queryinsert="INSERT INTO MASTER_Recall VALUES (".$i.", '1456567890', 'ACCC235456789', 'active', '2018', 1, 'decription as provided by OEM', '".$notes."', 'phone: 0422349755', 'ACCC', 'ture', '".$date."', '".$name."', '18/08/2018', 'Eline');
";
		$stmt=oci_parse($connect,$query);
		
		
	}
	


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eclipX Group - VRTS (Vehicle Recall Tracking System)</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!--Google fonts links-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <link rel="stylesheet" href="assets/css/roboto-webfont.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
				<script>
			// var v1,v2,v3,v4,v5,v6;
					
				
			// $(document).ready(function(){
				// $("#change").click(function(){
					// //alert("test");
					// $("#DisplayTable").html("<form method='POST' action='Recallfor.php?VIN="+$("#vintd").text()+"'><table id = 'selectTable'><tr><th></th><th>Active Recall?</th><th>Campaign Priority</th><th>Campaign No</th><th>PRA No</th><th>Description</th><th>Rectified?</th><th>Rectification Date</th></tr><tr><td><button type='submit' id='yes'>√</button> <a href='Recallfor.php?VIN="+$("#vintd").text()+"'><button type='button' id='no'>×</button></a>      </td><td><input name='i1' type='text' id='1' value='"+$("#1").text()+"'></td><td><input name='i2' type='text' id='2' value='"+$("#2").text()+"'></td><td><input name='i3' type='text' id='3' value='"+$("#3").text()+"'></td><td><input name='i4' type='text' id='4' value='"+$("#4").text()+"'></td><td><input name='i5' type='text' id='5' value='"+$("#5").text()+"'></td><td><input name='i6' type='text' id='6' value='"+$("#6").text()+"'></td><td>05-05-2018</td></tr></table></form>");

				// });

					// v1=$("#1").text();
					// v2=$("#2").text();
					// v3=$("#3").text();
					// v4=$("#4").text();
					// v5=$("#5").text();
					// v6=$("#6").text();	
				// // $("#selectTable").ready(function(){
					// // $("#no").click(function(){
						// // alert("test");
						// // //$("#DisplayTable").html("<tr><th></th><th>Active Recall?</th><th>Campaign Priority</th><th>Campaign No</th><th>PRA No</th><th>Description</th><th>Rectified?</th><th>Rectification Date</th></tr><tr><td><span id='change'>✎</span></td><td id='1'>"+v1+"</td><td id='2'>"+v2+"</td><td id='3'>"+v3+"</td><td id='4'>"+v4+"</td><td id='5'>"+v5+"</td><td id='6'>"+v6+"</td><td></td></tr>");
					
					// // });
					
					
				// // });
			
			// });
			// function cancle()
			// {
				// //alert(v1);
				// document.getElementById("#selectTable").innerHTML="<tr><th></th><th>Active Recall?</th><th>Campaign Priority</th><th>Campaign No</th><th>PRA No</th><th>Description</th><th>Rectified?</th><th>Rectification Date</th></tr><tr><td><span id='change'>✎</span></td><td id='1'>"+v1+"</td><td id='2'>"+v2+"</td><td id='3'>"+v3+"</td><td id='4'>"+v4+"</td><td id='5'>"+v5+"</td><td id='6'>"+v6+"</td><td></td></tr>";
			// }
		
		</script>
		<style>
			.informationDisplay{
				width: 90%;
				padding: 10px;
				margin: 10px auto;
				
				
			}
			
			.details{
				width: 20%;
				height: 300px;
				float: left;
				background-color: #fbdab2;
				border-radius: 5% 5% 5% 5%;
				padding:8px;
				margin-left: 30px;
				
			}
			.defect{
				width: 72%;
				height: 300px;
				float:left;
				background-color: #fbdab2;
				margin-left:3%;
				border-radius: 5% 5% 5% 5%;
				padding:8px;
			}
			.dets{
				width: 20%;
				height: 30px;
				float: left;
				background-color: #fbb767;
				padding:8px;
				
				Border: solid #000000 1px;
				margin-left: 30px;
			
			}
			.de{
				width: 72%;
				height: 30px;
				float:left;
				background-color: #fbb767;
				margin-left:3%;
				padding:8px;
				
				Border: solid #000000 1px;
				
			}
			.HistoryDsplayDiv{
				float: left;
				width: 105%;
				height: 300px;
				background-color: #e1e1e1;
				
		
				padding-left: 30px;
				padding-bottom: 30px;
				overflow:scroll;
					
			}
			.Fi{
				width:250px;
			}
			.Se{
				width:250px;
			}
			.Th{
				width: 500px;
			}
			.tableTitle{
				float: left;
				width: 105%;
				background-color: #e1e1e1;
				margin-top: 15px;
				padding-left: 30px;
			}
			.tt{
				background-color: #fbb767;
			}
			.value{
				font-size:13px;
			}
		</style>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Sections -->
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://eclipxgroup.com/"><img src="assets/images/logo.png" alt="Logo" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                       <li class="active"><a href="index.html">Home</a></li>
                        
                        <li><a href="campaigns.html">Campaigns</a></li>
                        
                        <li><a href="research.html">Recalls</a></li>
                        <li><a href="Contact.html">Contact</a></li>
                        <li class="login"><a href="signin.html">Sign In</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!--Home page style-->
        <header id="home" class="home">
            <div class="overlay-fluid-block">
                <div class="container text-center">
                    <div class="row">
                        <div class="home-wrapper">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="home-content">

                                    <h1>Manage Vehicle Recalls</h1>
                                    <p>The VRTS (Vehicle Recall Tracking System) allows easy maintenance of fleet informatin, campaign information and recall information. VRTS integrates with published VIN lists and manufacturer systems to seamless keep it's internal data up to date.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sections -->
        <!-- Sections -->
        <section id="business" class="portfolio sections">
            <div class="container">
                <div class="head_title text-center">
                    <h1>Campaign Information</h1>
                </div>
				
					
					
<?		

					while(ocifetch($stmt))
					{
						$html='<div class="informationDisplay">
							<p class="dets"><b>Details</b></p>
							<p class="de"><b>Defect</b></p>
							
							<div class="details">
								<p><b>Campaign Number: </b></p><p class="value">'.ociresult($stmt,"RECALL_NUMBER").'</p>
								<p><b>PRA Number: </b></p><p class="value">'.ociresult($stmt,"PRA_NUMBER").'</p>
								<p><b>Data Published: </b></p><p class="value">'.ociresult($stmt,"CREATEDATE").'</p>
								<p><b>Priority: </b></p><p class="value">'.ociresult($stmt,"PRIORITY_ID").'</p>
							</div>
							
							<div class="defect">
								<p>Recall: '.ociresult($stmt,"PRIORITY_ID").'</p>
								<p>Defect Description: '.ociresult($stmt,"RECALL_DESCRIPTION").'</p>
								<p>Contact Information: '.ociresult($stmt,"RECALL_CONTACT_INFO").'</p>
								<p>Website: </p>
							</div>
							<div class="tableTitle">
								<table border="3px">
									<tr>
										<td class="tt Fi">Recalled Date</td>
										<td class="tt Se">Recalled By</td>
										<td class="tt Th">Notes</td>
									</tr>
								</table>
							</div>
							<div class="HistoryDsplayDiv">
								<table border="3px">
										<tr>
											<td class="Fi">'.ociresult($stmt,"LASTUPDATE_DATE").'</td>
											<td class="Se">'.ociresult($stmt,"LASTUPDATEBY").'</td>
											<td class="Th">'.ociresult($stmt,"RECALL_DESCRIPTION").'</td>
										</tr>
								</table>
								
							</div>.
						</div>';
					}
					echo $html;
?>
            <form action="Campaigninformation.php" method="post">
				<input type="text" placeholder="date" name="date">
				<input type="text" placeholder="name" name="name">
				<input type="textarae" placeholder="notes" name="notes">
				<input type="submit" placeholder="submit" name="submit">
			</form>    
			
                <!-- Example row of columns -->

            </div> <!-- /container -->
        </section>

        <section id="footer-menu" class="sections footer-menu">
            <div class="container">
                <div class="row">
                    <div class="footer-menu-wrapper">

                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="menu-item">
                                    <h5>Quick Links</h5>
                                    <ul>
                                        <li>Help</li>
                                        <li>Register</li>
                                        <li>Login</li>
                                        <li>Contact Us</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-wrapper">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-brand">
                                <a href="http://eclipxgroup.com/"><img src="assets/images/logo.png" alt="logo" /></a>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="copyright">
                                <p>All rights reserved.</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>


        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>


        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
