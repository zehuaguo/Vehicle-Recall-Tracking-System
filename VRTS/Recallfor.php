<?
					include "pass.php";
					$connction=ocilogon("zhengzih", $password, "SSID");

					$sql="SELECT * FROM Details WHERE lower(VIN) LIKE lower('%$VIN%')";
					//echo $sql."<br>";
					$stmt=ociparse($connction, $sql);
					ociexecute($stmt);
					$html0='<div id="DisplayTablelower"><form>
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
					$html0.='</table></form></div>';

					

					
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
        <link rel="stylesheet" href="assets/css/Recallfor.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
		<link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		<style>
			.tagspan{
				<!-- position: absolute; -->
				<!-- float:left; -->
				margin: 2px;
				
			
			}
			#tag{
				display: inline;
				white-space: nowrap;
				
			}
			.tagli{
				padding: 10px 20px;
				display: inline-block;
				background:#fe9e35;
				white-space: nowrap;
				
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			//var v1,v2,v3,v4,v5,v6;
				// function myFunction()
				// {
					// getElementById("DisplayTable").innerHTML="<form method='POST' action='Recallfor.php?VIN="+$("#vintd").text()+"'><table id = 'selectTable'><tr><th></th><th>Active Recall?</th><th>Campaign Priority</th><th>Campaign No</th><th>PRA No</th><th>Description</th><th>Rectified?</th><th>Rectification Date</th></tr><tr><td><button type='submit' id='yes'>√</button> <a href='Recallfor.php?VIN="+$("#vintd").text()+"'><button type='button' id='no'>×</button></a>      </td><td><input name='i1' type='text' id='1' value='"+$("#1").text()+"'></td><td><input name='i2' type='text' id='2' value='"+$("#2").text()+"'></td><td><input name='i3' type='text' id='3' value='"+$("#3").text()+"'></td><td><input name='i4' type='text' id='4' value='"+$("#4").text()+"'></td><td><input name='i5' type='text' id='5' value='"+$("#5").text()+"'></td><td><input name='i6' type='text' id='6' value='"+$("#6").text()+"'></td><td>05-05-2018</td></tr></table></form>";
					// //alert("test");
					
				// }			
		
				
			$(document).ready(function(){
				$("#loaddiv1").load("liadrecall.php?VIN="+$("#vindiv").text());
				$("#loaddiv2").load("liadcomu.php?VIN="+$("#vindiv").text());
				$("#loaddiv3").load("liadnotes.php?VIN="+$("#vindiv").text());
				$("#li2").click(function(){
					//alert($("#loaddiv").html());
					$(this).attr('style','background:#fec485');
					$("#li1").attr('style','#fe9e35');
					$("#li3").attr('style','#fe9e35');
					$("#DisplayTable").html($("#loaddiv2").html());
				});
				$("#li1").click(function(){
					$(this).attr('style','background:#fec485');
					$("#li2").attr('style','#fe9e35');
					$("#li3").attr('style','#fe9e35');
					//alert("test");
					$("#DisplayTable").html($("#loaddiv1").html());

				});
				$("#li3").click(function(){
					$(this).attr('style','background:#fec485');
					$("#li1").attr('style','#fe9e35');
					$("#li2").attr('style','#fe9e35');
					//alert($("#loaddiv3").html());
					$("#DisplayTable").html($("#loaddiv3").html());

				});
				$("#change").click(function(){
					//alert("test");
					$("#DisplayTable").html("<form method='POST' action='Recallfor.php?VIN="+$("#vintd").text()+"'><table id = 'selectTable'><tr><th></th><th>Active Recall?</th><th>Campaign Priority</th><th>Campaign No</th><th>PRA No</th><th>Description</th><th>Rectified?</th><th>Rectification Date</th></tr><tr><td><button type='submit' id='yes'>√</button> <a href='Recallfor.php?VIN="+$("#vintd").text()+"'><button type='button' id='no'>×</button></a>      </td><td><input name='i1' type='text' id='1' value='"+$("#1").text()+"'></td><td><input name='i2' type='text' id='2' value='"+$("#2").text()+"'></td><td><input name='i3' type='text' id='3' value='"+$("#3").text()+"'></td><td><input name='i4' type='text' id='4' value='"+$("#4").text()+"'></td><td><input name='i5' type='text' id='5' value='"+$("#5").text()+"'></td><td><input name='i6' type='text' id='6' value='"+$("#6").text()+"'></td><td>05-05-2018</td></tr></table></form>");

				});

		
					// v1=$("#1").text();
					// v2=$("#2").text();
					// v3=$("#3").text();
					// v4=$("#4").text();
					// v5=$("#5").text();
					// v6=$("#6").text();	



				
			
			});
			// function cancle()
			// {
				// //alert(v1);
				// document.getElementById("#selectTable").innerHTML="<tr><th></th><th>Active Recall?</th><th>Campaign Priority</th><th>Campaign No</th><th>PRA No</th><th>Description</th><th>Rectified?</th><th>Rectification Date</th></tr><tr><td><span id='change'>✎</span></td><td id='1'>"+v1+"</td><td id='2'>"+v2+"</td><td id='3'>"+v3+"</td><td id='4'>"+v4+"</td><td id='5'>"+v5+"</td><td id='6'>"+v6+"</td><td></td></tr>";
			// }
		
		</script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div id= "vindiv" style="display: none"><?echo $VIN?></div>
		<div id= "loaddiv1" style="display: none"><?echo $VIN?></div>
		<div id= "loaddiv2" style="display: none"><?echo $VIN?></div>
		<div id= "loaddiv3" style="display: none"><?echo $VIN?></div>
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
		
		
        <section id="contact" class="contact sections">
        <div class = "main-nav">	
	        <div id = "all">
                                <div class="single_left_contact">
										<?
											include "pass.php";
											$connction=ocilogon("zhengzih", $password, "SSID");

											$sql="SELECT * FROM VehicleRecalls WHERE lower(VIN) LIKE lower('%$VIN%')";
											//echo $sql."<br>";
											$stmt=ociparse($connction, $sql);
											ociexecute($stmt);
											$html='<table  action="#" id="formid">
														<tr>
														<th> VEHICLE</th>
											
														<th> CUSTODIAN</th>
														</tr>
													</table>
													<table action="#" id="formid">';
											while(ocifetch($stmt))
											{
												$html.='<div class="form-group">
															<tr>
															<td type="VIN"  name="VIN" placeholder="VIN" required="Y">VIN:</td>
															<td id="vintd">'.ociresult($stmt,'VIN').'</td>
															<td type="Name" name="Name" placeholder="Name" required="Y">Name:</td>
															<td>'.ociresult($stmt,'CUSTODIANNAME').'</td>
															</tr>
														</div>
														<div class="form-group">
															<tr>
															<td type="Registration"  name="Registration" placeholder="Registration" required="Y">Registration:</td>
															<td>'.ociresult($stmt,'REGISTRATION').'</td>
															<td type="Contact Number" name="Contact Number" placeholder="Contact Number" required="Y">Contact Number:</td>
															<td>'.ociresult($stmt,'CUSTODIANMOBILE').'</td>
															</tr>
														</div>
														<div class="form-group">
															<tr>
															<td type="Make"  name="Make" placeholder="Make" required="Y">Make:</td>
															<td>'.ociresult($stmt,'MAKE').'</td>
															<td type="Email" name="Email" placeholder="Email" required="Y">Email:</td>
															<td>'.ociresult($stmt,'CUSTODIANEMAIL').'</td>
															</tr>
														</div>
														<div class="form-group">
															<tr>
															<td type="Model"  name="Model" placeholder="Model" required="Y">Model:</td>
															<td>'.ociresult($stmt,'MODEL').'</td>
															<td type="Organisation" name="Organisation" placeholder="Organisation" required="Y">Organisation:</td>
															<td>'.ociresult($stmt,'VEH_ORGANISATION').'</td>
															</tr>
														</div>
														<div class="form-group">
															<tr>
															<td type="Model Year"  name="Model Year" placeholder="Model Year" required="Y">Model Year:</td>
															<td>'.ociresult($stmt,'MODELYEAR').'</td>
															<td type="Org Contact" name="Org Contact" placeholder="Org Contact" required="Y">Org Contact:</td>
															<td>'.ociresult($stmt,'VEH_ORGANISATION_CONTACT').'</td>
															</tr>
														</div>
														<div class="form-group">
															<tr>
															<td type="FP Vehicle ID" name="FP Vehicle ID" placeholder="FP Vehicle ID" required="Y">FP Vehicle ID:</td>
															<td>'.ociresult($stmt,'BU_ID').'</td>
															<td type="Org Email" name="Org Email" placeholder="Org Email" required="Y">Org Email:</td>
															<td>'.ociresult($stmt,'VEH_ORGANISATION_EMAIL').'</td>
															</tr>
														</div>
														<div class="form-group">
															<tr>
														   <td type="Description"  name="Description" placeholder="Description" required="Y">Description:</td>
															<td>'.ociresult($stmt,'DESCRIPTION').'</td>
															<td type="Org Number" name="Org Number" placeholder="Org Number" required="Y">Org Number:</td>
															<td>'.ociresult($stmt,'VEH_ORGANISATION_ADDRESS').'</td>
															</tr>
														</div>';
												
											}
											$html.='</table>';
											echo $html;
											
										?>
								</div>
								<br>
								<div id="tag">
									<ul><!--this is tags-->
										<li class="tagli" style="background:#fec485" id="li1">Recalls</li>
										<li class="tagli" id="li2">Conmunication</li>
										<li class="tagli" id="li3">Notes</li>
									
									</ul>
								</div>
		<div class="displayDiv">
			
			<div ID="DisplayTable" style="height:200px;overflow:scroll;">
				<?
					// include "pass.php";
					// $connction=ocilogon("zhengzih", $password, "SSID");

					// $sql="SELECT * FROM Details WHERE lower(VIN) LIKE lower('%$VIN%')";
					// //echo $sql."<br>";
					// $stmt=ociparse($connction, $sql);
					// ociexecute($stmt);
					// $html='<form>
							  // <table id = "selectTable">
								// <tr>
								  // <th>    </th>
								  // <th>Active Recall?</th>
								  // <th>Campaign Priority</th>
								  // <th>Campaign No</th>
								  // <th>PRA No</th>
								  // <th>Description</th>
								  // <th>Rectified?</th>
								  // <th>Rectification Date</th>
								  
								// </tr>';
					// while(ocifetch($stmt))
					// {
						// $html.='<tr>
									// <td><span id="change">✎</span>      </td>
									// <td id="1">'.$IF=(ociresult($stmt, 'VEHICLE_STATUS')=="ACTIVE"? "Yes":"NO").'</td>
									// <td id="2">'.ociresult($stmt, 'PRIORITY').'</td>
									// <td id="3">'.ociresult($stmt, 'CAMPAIGNNO').'</td>
									// <td id="4">'.ociresult($stmt, 'PRA_NO').'</td>
									// <td id="5">Replace fr...</td>
									// <td id="6">'.ociresult($stmt, 'RECTIFIED').'</td>
									// <td>'.ociresult($stmt, 'RECTIFICATION_DATE').'</td>
								// </tr>';
						
					// }
					// $html.='</table></form>';
					echo $html0;
					
				?>
				
			</div>
		</div>
		
		<br>
		

		</div>
		</div>
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
