<?php include 'functions/init.php'; ?>

<?php include 'includes/navstart.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-31126291-1');
</script>

<meta name="generator" content="HTML Tidy for Linux (vers 6 November 2007), see www.w3.org" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>4.1Demo</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="content-language" content="en" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script><script src="https://use.fontawesome.com/2f08d8400c.js"></script>

<style type="text/css">
.fontsizesmall {
font-size: small;
}
.fontsizemedium {
font-size: medium;
}
</style>
<style>
 /* Make the image fully responsive */

  body {
  background-color: #c2e8fc !important;
  }
  .auto-style1 {
	border-width: 0px;
	max-width: 100%;
	height: auto;
}
  </style>


<script>
function clientSideInclude(id, url) {
  var req = false;
  // For Safari, Firefox, and other non-MS browsers
  if (window.XMLHttpRequest) {
    try {
      req = new XMLHttpRequest();
    } catch (e) {
      req = false;
    }
  } else if (window.ActiveXObject) {
    // For Internet Explorer on Windows
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        req = false;
      }
    }
  }
 var element = document.getElementById(id);
 if (!element) {
  alert("Bad id " + id + 
   "passed to clientSideInclude." +
   "You need a div or span element " +
   "with this id in your page.");
  return;
 }
  if (req) {
    // Synchronous request, wait till we have it all
    req.open('GET', url, false);
    req.send(null);
    element.innerHTML = req.responseText;
  } else {
    element.innerHTML =
   "Sorry, your browser does not support " +
      "XMLHTTPRequest objects. This page requires " +
      "Internet Explorer 5 or better for Windows, " +
      "or Firefox for any system, or Safari. Other " +
      "compatible browsers may also exist.";
  }
}
</script>
<script>
function includeOPA(id, url) {
  var req = false;
  // For Safari, Firefox, and other non-MS browsers
  if (window.XMLHttpRequest) {
    try {
      req = new XMLHttpRequest();
    } catch (e) {
      req = false;
    }
  } else if (window.ActiveXObject) {
    // For Internet Explorer on Windows
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        req = false;
      }
    }
  }
 var element = document.getElementById(id);
 if (!element) {
  alert("Bad id " + id + 
   "passed to OPF." +
   "You need a div or span element " +
   "with this id in your page.");
  return;
 }
  if (req) {
    // Synchronous request, wait till we have it all
    req.open('GET', url, false);
    req.send(null);
    element.innerHTML = req.responseText;
  } else {
    element.innerHTML =
   "Sorry, your browser does not support " +
      "XMLHTTPRequest objects. This page requires " +
      "Internet Explorer 5 or better for Windows, " +
      "or Firefox for any system, or Safari. Other " +
      "compatible browsers may also exist.";
  }
}
</script>

<script>
function load()
{
clientSideInclude('Agreements', 'http://www.pmway.co.za/processesdash/Agreements.html') ;
includeOPA('OPA', 'http://www.pmway.co.za/processesdash/OPA.html');
}
</script>


<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>

<script>
		$(document).ready(function() {
		  $('.nav-toggle').click(function(){
			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');					
 
			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html('Show');
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html('Hide');
			  }
			});
		  });
 
		});	
		</script>
		<style>	
		.round-border {
			border: 1px solid #eee;
			border: 1px solid rgba(0, 0, 0, 0.05);
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			padding: 10px;
			margin-bottom: 5px;
		}
		</style>




			








<style type="text/css">
.auto-style2 {
	text-align: left;
}
.auto-style4 {
	font-size: medium;
}
</style>


<a style="position: fixed; bottom:5px;left:5px;" href="#" title="Back to Top"><img class="img-fluid" style="border: none;" src="http://www.pmway.co.za/images/top.png"/></a>  


 <script type="text/javascript" src="http://www.pmway.co.za/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
       <!-- "insertdatetime media table contextmenu paste moxiemanager" -->
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

</head>



<body>









<!--
<div style="position:absolute; left: 60%; top : 31px; font-size:50px; z-index:100; width: 10px; height: 10px;"><a href="http://www.pmway.co.za/processesdash/pmbokdashnutshell.html" title="Learn how to run successful projects with the Project Management Processes and Knowledge Areas - the PMBOK Way"> 
	<img class="img-fluid" alt="" height="200" src="http://www.pmway.co.za/images/under construction-02.jpg" width="300" class="shakeimage" onmouseover="init(this);rattleimage()" onmouseout="stoprattle(this);top.focus()" onclick="top.focus()" style="left: 0px; top: 0px;">
 </a>  </div>-->

<!-- Masthead begins here -->

<!-- Masthead ends here -->
<!-- Navigation begins here -->




<!-- Content Container begins here -->


<!-- Left Column begins here -->
<!--			<div id="leftColumn1">-->
				<!-- Place Left Column content directly below -->
				
				<!-- </div> -->
<!-- Left Column ends here -->

<!-- Right Column begins here
<!--		<div id="rightColumn1">
			<!-- Place Left Column content directly below -->

		    <!--</div> -->
<!-- Right Column ends here -->


<!-- Main Content begins here -->




	



<!-- #BeginEditable "content" -->



<!--This is where the main stuff goes--->

<div class="container">
<table style="width: 100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="45%"><h1><span style="font-size:20pt;"></span></h1></td>
<td width="3%"><p><a href="../logout.php" title="Logout"><span class="fontsizesmall"></span></a>&nbsp;&nbsp;</p>
</td><td width="52%" class="fontsizesmedium"></td>
</tr>
</table>

	<h1 class="auto-style2">Develop Project Charter<br />
	<span class="smltxt">PG Initiating, KA Integration, #4.1</span></h1> <hr /> 
	
	
	
	
				<div class="auto-style2">
	
	
	
	
				<script language="javascript" type="text/javascript">
                    //<![CDATA[

                    if (window.print) {
                    document.write('<form><input type=button name=print value="Print out this page" onClick="window.print()"><\/form>');
                    }
                    //]]>
                    </script>

	<div align="center">
	
	
		<a href="pmway.php" title="Click here to return to the PMWay landing page">  
		<h3>DEMO - with reduced functionality.<br></h3>
	
	
<img class="img-fluid" alt="" height="82" src="http://www.pmway.co.za/images/menulrdindex.png" width="111" style="float: left" usemap="#imgmap0" /></a><br />
		
	<p class="ctr"><img class="img-fluid" alt="" height="1074" src="http://www.pmway.co.za/processesdash/images/ver64point1.png" width="842" usemap="#imgmap2" /></p> <br />
	
	<p class="ctr">Inputs, Tools and Techniques, and Outputs (ITTO's) as a dashboard to the PMBOK 
	version 6 guide.</p>
		<p class="ctr">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-fluid" alt="" height="512" src="http://www.pmway.co.za/processesdash/imagesv6/41.png" width="679" /><br /><br /><p class="ctr">
		ITTO's as an image from the PMBOK version 6 guide.</p>	
	<img class="img-fluid" src="http://www.pmway.co.za/processesdash/images/mouseover.png"
 onclick="this.src='http://www.pmway.co.za/processesdash/imagesv6/41ittosclean.png'" ondblclick="this.src='http://www.pmway.co.za/processesdash/images/mouseover.png'"><br><br>

			
		<img class="img-fluid" src="http://www.pmway.co.za/processesdash/images/mouseover.png" onclick="this.src='http://www.pmway.co.za/processesdash/imagesv6/41flowclean.png'" ondblclick="this.src='http://www.pmway.co.za/processesdash/images/mouseover.png'"></p>

		
			
<p class="ctr">This Process Data Flow diagram from the PMBOK version 6 guide.</p>

<br />
<br />
<script language="javascript">
 <!--
 var today = new date();
 document.write(today);
 //-->
 </script>
<a name="topofbox99"></a>

		<section class="round-border">
		<h5><button href="#collapse99" class="nav-toggle">Show</button>&nbsp;Tailoring notes:</h5>
		<div id="collapse99" style="display:none" class="auto-style4">

	



		<textarea rows="100" cols="170" style="float:left">
<h3>Tailoring Notes for the Project Management Process being tailored:  I.e. The Process / Input / Tool / Technique / Output or etc.'s name here.</h3>
	<p>Use this Notes Section to enter any tailoring information you have considered with regard to this process.<br />I.e. tailoring is how you have simplified, or left out something in order to run the project faster.  Obviously this must not jeopardize the project integrity or place it under risk.  Risks and Issues (Risks happening) can be used to monitor the effect of tailoring on the project.  I.e. this operates like a warning system (if Issue is picked up), which can then evolve into a set of TAsks to minimize or handle the Issue / Risk.</p>

<p>Use the print button at the top to print this to hard copy or pdf.</p>	</textarea>
<div class="left"><a href="#topofbox99"><span class="smltxt">Return to top of pop open box</span></a></div></div></section>


<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
	</div>
	


	

	


	


	

	


		<!--This div belongs to content--->
<!-- Main Content ends here -->






<!-- Footer begins here --> 
<div id="footer">
	
			





</div><!-- Ties up to Page Container above -->

							

                      

      
    
<!-- #EndEditable -->
		
</body>
</html>

