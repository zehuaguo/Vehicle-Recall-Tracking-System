

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
        <link rel = "stylesheet" href = "assets/css/campaigns.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script>
			// function getcheck()
			// {
				// var checkboxvalue=documentGetElementsByName("A");
				// var ifCheck;
				// if(checkboxvalue[0].checked)
				// {
					// if(checkboxvalue[1].checked)
						// ifCheck=" ";
					// else
						// ifCheck="active";
				// }
				// else()
				// {
					// if(checkboxvalue[1].checked)
						// ifCheck="inactive";
					// else ifCheck="no";
				
				// }
				// return ifCheck;
			// }
			var ifcheck=" ";
			$(document).ready(function(){
				$("#searchButton").click(function(){
					//alert("test");
					$("#DisplayTable").load("loadcampaign.php?cn="+escape($("#cn").val())+"&pn="+escape($("#pn").val())+"&year="+escape($("#year").val())+"&Status"+escape(ifcheck));
				});
				$(".in").on("click",function(){
					if($("#a0").is(":checked"))
					{
						if($("#a1").is(":checked"))
						{ifcheck=" ";}
						else
						{ifcheck="active";}
					}
					else
					{
						if($("#a1").is(":checked"))
						{ifcheck="inactive";}
						else{
							ifcheck="no";
						}
					}
				
				});
			
			});
		
	</script>
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

<div class = "main-nav">    
      <div id = "all">
        <div class = "blank">&nbsp</div>
        <div class = "blank">&nbsp</div>
        <div class = "blank">&nbsp</div>
        
        <div class="searchDiv">
            <div class="searchInformation">
                <form>
                    <input class = "a" name="CN" id="cn" type="text" placeholder="Campaign Number"/>
                    <input class = "a" name="PRA" id="pn" type="text" placeholder="PRA Number"/>
                    <input class = "a" name="Ye" id="year" type="text" placeholder="Year"/><br>
                    
                
                    <label>
                        <input name="IA" class="in" value="Inactive" type="checkbox">Inactive 
                    </label>
                    <label>
                        <input name="A" class="in" value="Active" type="checkbox">Active 
                    </label>
                    <br><br>
                    <input type = "button" value = "Search" id="searchButton">
                </form>
            </div>
            
        </div>
        
        <div class = "blank">&nbsp</div>
        <div class = "blank">&nbsp</div>
        <div class = "blank">&nbsp</div>
        
        <div class="displayDiv">
            <p>Campaign Records</p><br>
            <div ID="DisplayTable" style="height:200px;overflow:scroll;">
              
                
              
            
            </div>
        </div>
        
        <div class = "blank">&nbsp</div>
        

      </div>
    </div>
    <br>
    <br>
        
        <!-- <div id = "blank">&nbsp</div> -->



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
