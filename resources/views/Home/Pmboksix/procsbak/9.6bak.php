

<?php include '../functions/init.php'; ?>
<?php if (logged_in()) {
    $loggedin = ' is logged in';
} else {
    redirect('../sitemap.html');
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<title>9.6</title>

<meta content="en-us" http-equiv="Content-Language" />
<meta content="General" name="rating" />
<meta content="no" http-equiv="imagetoolbar" />
<link href="http://www.pmway.co.za/styles/site.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="css/bootstrap.css">-->
<!--<link rel="stylesheet" href="css/styles.css">-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/scripts.js"></script>

<style type="text/css">
.fontsizesmall {
font-size: small;
}
.fontsizemedium {
font-size: medium;
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
clientSideInclude('Agreements', 'http://www.pmway.co.za/processesdash/Agreements.php') ;
includeOPA('OPA', 'http://www.pmway.co.za/processesdash/OPA.php');
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


<a style="position: fixed; bottom:5px;left:5px;" href="#" title="Back to Top"><img style="border: none;" src="http://www.pmway.co.za/images/top.png"/></a>  


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








<div id="outerWrapper">
<!--
<div style="position:absolute; left: 60%; top : 31px; font-size:50px; z-index:100; width: 10px; height: 10px;"><a href="http://www.pmway.co.za/processesdash/pmbokdashnutshell.php" title="Learn how to run successful projects with the Project Management Processes and Knowledge Areas - the PMBOK Way"> 
	<img alt="" height="200" src="http://www.pmway.co.za/images/under construction-02.jpg" width="300" class="shakeimage" onmouseover="init(this);rattleimage()" onmouseout="stoprattle(this);top.focus()" onclick="top.focus()" style="left: 0px; top: 0px;">
 </a>  </div>-->

<!-- Masthead begins here -->
<div id="header">

<table style="width: 100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="45%"><h1><span style="font-size:20pt;">PMWay</span></h1></td>
<td width="3%"><p><a href="../logout.php" title="Logout"><span class="fontsizesmall">Logout</span></a>&nbsp;&nbsp;</p>
</td><td width="52%" class="fontsizesmedium"><?php echo '<p>'.$_SESSION['username'].'</p>' ?></td>
</tr>
</table>
</div>
<!-- Masthead ends here -->
<!-- Navigation begins here -->
<div id="topNavigation">
	<ul>
			</ul>
<!-- Navigation ends here -->
</div><!-- Closes off the Navigation Div -->




<!-- Content Container begins here -->
<div id="contentWrapper" class="ctr">

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



	</div>
	
	</div>


<!-- #BeginEditable "content" -->



<div id="outerWrapper">

	<div id="contentWrapper" class="ctr">


<div id="content" class="ctr">

<!--This is where the main stuff goes--->
	<h1 class="auto-style2">Control Resources<br />
	<span class="smltxt">PG Monitoring and Controlling, KA Resources, #9.6</span></h1> <hr /> 
	
	
	
	
				<div class="auto-style2">
	
	
	
	
				<script language="javascript" type="text/javascript">
                    //<![CDATA[

                    if (window.print) {
                    document.write('<form><input type=button name=print value="Print out this page" onClick="window.print()"><\/form>');
                    }
                    //]]>
                    </script>

	<div align="center">
	
	
	<map id="imgmap0" name="imgmap0">
	<area coords="39, 52, 71, 81" href="http://www.pmway.co.za/processesdash/10.3.php" shape="rect" title="down" />
	<area alt="" coords="0, 14, 36, 58" href="http://www.pmway.co.za/processesdash/9.3.php" shape="rect" title="left" />
	<area alt="" coords="38, 24, 72, 51" href="http://www.pmway.co.za/processesdash/8.3.php" shape="rect" title="up" />
	<area alt="" coords="35, 5, 75, 24" href="http://www.pmway.co.za/sitemap.php#dash" shape="rect" title="index"/>
		<area coords="76, 17, 109, 58" href="http://www.pmway.co.za/processesdash/9.1.php" shape="rect" />
	</map> 
<img alt="" height="82" src="http://www.pmway.co.za/images/menulrdindex.png" width="111" style="float: left" usemap="#imgmap0" /><br />
		<map id="imgmap2" name="imgmap2">
	
	 <area coords="223, 128, 350, 232" href="http://www.pmway.co.za/processesdash/4.1.php" shape="rect">
	 <area coords="347, 128, 469, 231" href="http://www.pmway.co.za/processesdash/4.2.php" shape="rect">
	 <area coords="470, 130, 590, 180" href="http://www.pmway.co.za/processesdash/4.3.php" shape="rect">
	 <area coords="471, 180, 591, 232" href="http://www.pmway.co.za/processesdash/4.4.php" shape="rect">
	 <area coords="593, 130, 719, 181" href="http://www.pmway.co.za/processesdash/4.5.php" shape="rect">
	 <area coords="594, 181, 717, 231" href="http://www.pmway.co.za/processesdash/4.6.php" shape="rect">
	 <area coords="224, 49, 349, 133" href="http://www.pmway.co.za/processesdash/initiation.php" shape="rect">
	 <area coords="352, 46, 468, 132" href="http://www.pmway.co.za/processesdash/planning.php" shape="rect">
	 <area coords="467, 46, 591, 132" href="http://www.pmway.co.za/processesdash/execution.php" shape="rect">
	 <area coords="593, 43, 717, 132" href="http://www.pmway.co.za/processesdash/monitorandcontrol.php" shape="rect">
	 <area coords="717, 44, 837, 133" href="http://www.pmway.co.za/processesdash/close.php" shape="rect">
	 <area coords="350, 232, 469, 270" href="http://www.pmway.co.za/processesdash/5.1.php" shape="rect">
	 <area coords="348, 267, 466, 297" href="http://www.pmway.co.za/processesdash/5.2.php" shape="rect">
	 <area coords="348, 296, 467, 314" href="http://www.pmway.co.za/processesdash/5.3.php" shape="rect">
	 <area coords="349, 310, 467, 331" href="http://www.pmway.co.za/processesdash/5.4.php" shape="rect">
	 <area coords="593, 232, 715, 253" href="http://www.pmway.co.za/processesdash/5.5.php" shape="rect">
	 <area coords="593, 252, 714, 271" href="http://www.pmway.co.za/processesdash/5.6.php" shape="rect">
	 <area coords="346, 331, 471, 367" href="http://www.pmway.co.za/processesdash/6.1.php" shape="rect">
	 <area coords="345, 368, 471, 397" href="http://www.pmway.co.za/processesdash/6.2.php" shape="rect">
	 <area coords="345, 395, 471, 428" href="http://www.pmway.co.za/processesdash/6.3.php" shape="rect">
	 <area coords="346, 426, 465, 456" href="http://www.pmway.co.za/processesdash/6.4.php" shape="rect">
	 <area coords="344, 454, 467, 493" href="http://www.pmway.co.za/processesdash/6.5.php" shape="rect">
	 <area coords="594, 331, 713, 494" href="http://www.pmway.co.za/processesdash/6.6.php" shape="rect">
	 <area coords="347, 494, 468, 530" href="http://www.pmway.co.za/processesdash/7.1.php" shape="rect">
	 <area coords="344, 526, 466, 546" href="http://www.pmway.co.za/processesdash/7.2.php" shape="rect">
	 <area coords="348, 542, 467, 580" href="http://www.pmway.co.za/processesdash/7.3.php" shape="rect">
	 <area coords="593, 493, 713, 583" href="http://www.pmway.co.za/processesdash/7.4.php" shape="rect">
	 <area coords="343, 580, 469, 643" href="http://www.pmway.co.za/processesdash/8.1.php" shape="rect">
	 <area coords="466, 581, 597, 641" href="http://www.pmway.co.za/processesdash/8.2.php" shape="rect">
	 <area coords="593, 581, 716, 643" href="http://www.pmway.co.za/processesdash/8.3.php" shape="rect">
	 <area coords="347, 642, 467, 678" href="http://www.pmway.co.za/processesdash/9.1.php" shape="rect">
	 <area coords="347, 676, 467, 713" href="http://www.pmway.co.za/processesdash/9.2.php" shape="rect">
	 <area coords="468, 639, 593, 674" href="http://www.pmway.co.za/processesdash/9.3.php" shape="rect">
	 <area coords="469, 671, 592, 692" href="http://www.pmway.co.za/processesdash/9.4.php" shape="rect">
	 <area coords="343, 711, 471, 774" href="http://www.pmway.co.za/processesdash/10.1.php" shape="rect">
	 <area coords="467, 709, 590, 772" href="http://www.pmway.co.za/processesdash/10.2.php" shape="rect">
	 <area coords="588, 712, 716, 772" href="http://www.pmway.co.za/processesdash/10.3.php" shape="rect">
	 <area coords="345, 773, 470, 808" href="http://www.pmway.co.za/processesdash/11.1.php" shape="rect">
	 <area coords="345, 806, 466, 826" href="http://www.pmway.co.za/processesdash/11.2.php" shape="rect">
	 <area coords="344, 824, 470, 868" href="http://www.pmway.co.za/processesdash/11.3.php" shape="rect">
	 <area coords="347, 868, 467, 916" href="http://www.pmway.co.za/processesdash/11.4.php" shape="rect">
	 <area coords="346, 912, 468, 948" href="http://www.pmway.co.za/processesdash/11.5.php" shape="rect">
	 <area coords="469, 770, 592, 811" href="http://www.pmway.co.za/processesdash/11.6.php" shape="rect">
	 <area coords="347, 949, 465, 1014" href="http://www.pmway.co.za/processesdash/12.1.php" shape="rect">
	 <area coords="465, 950, 595, 1013" href="http://www.pmway.co.za/processesdash/12.2.php" shape="rect">
	 <area coords="591, 949, 717, 1012" href="http://www.pmway.co.za/processesdash/12.3.php" shape="rect">
	 <area coords="220, 1009, 344, 1068" href="http://www.pmway.co.za/processesdash/13.1.php" shape="rect">
	 <area coords="347, 1012, 468, 1070" href="http://www.pmway.co.za/processesdash/13.2.php" shape="rect">
	 <area coords="469, 1009, 595, 1070" href="http://www.pmway.co.za/processesdash/13.3.php" shape="rect">
	 <area coords="592, 1011, 717, 1070" href="http://www.pmway.co.za/processesdash/13.4.php" shape="rect">
	 <area coords="85, 1010, 224, 1067" href="http://www.pmway.co.za/processesdash/pstakem.php" shape="rect">
	 <area coords="82, 131, 226, 236" href="http://www.pmway.co.za/processesdash/pim.php" shape="rect">
	 	<area coords="85, 231, 224, 334" href="http://www.pmway.co.za/processesdash/psm.php" shape="rect">
		 <area coords="86, 330, 220, 491" href="http://www.pmway.co.za/processesdash/ptm.php" shape="rect">
		 <area coords="84, 492, 225, 580" href="http://www.pmway.co.za/processesdash/pcm.php" shape="rect">
		 <area coords="86, 578, 219, 640" href="http://www.pmway.co.za/processesdash/pqm.php" shape="rect">
		 <area coords="86, 641, 223, 715" href="http://www.pmway.co.za/processesdash/phrm.php" shape="rect">
		 <area coords="83, 714, 223, 774" href="http://www.pmway.co.za/processesdash/pcomm.php" shape="rect">
		 <area coords="84, 773, 221, 952" href="http://www.pmway.co.za/processesdash/prm.php" shape="rect">
		 <area coords="84, 950, 224, 1010" href="http://www.pmway.co.za/processesdash/ppm.php" shape="rect">
	 	<area coords="719, 130, 834, 233" href="http://www.pmway.co.za/processesdash/4.7.php" shape="rect">
		 <area coords="466, 689, 592, 710" href="http://www.pmway.co.za/processesdash/9.5.php" shape="rect">
		 <area coords="591, 643, 718, 716" href="http://www.pmway.co.za/processesdash/9.6.php" shape="rect">
		 <area alt="" coords="592, 773, 716, 814" href="http://www.pmway.co.za/processesdash/11.7.php" shape="rect">
		</map>
	<img alt="" height="1074" src="http://www.pmway.co.za/processesdash/imagesv6/ver69point6.png" width="842" usemap="#imgmap2" /> <br />
	
	<p class="ctr">Inputs, Tools and Techniques, and Outputs (ITTO's) as a dashboard to the PMBOK 
	version 6 guide.</p>
		<img alt="" height="988" src="http://www.pmway.co.za/processesdash/imagesv6/96.png" width="645" /><br /><br /><p class="ctr">
		ITTO's as an image from the PMBOK version 6 guide.</p>	
	<img src="http://www.pmway.co.za/processesdash/images/mouseover.png"
 onclick="this.src='http://www.pmway.co.za/processesdash/imagesv6/96ittos.png'" ondblclick="this.src='http://www.pmway.co.za/processesdash/images/mouseover.png'">
	</div>
	</div>
	
		
		<img src="http://www.pmway.co.za/processesdash/images/mouseover.png" onclick="this.src='http://www.pmway.co.za/processesdash/imagesv6/96flow.png'" ondblclick="this.src='http://www.pmway.co.za/processesdash/images/mouseover.png'">

		
			
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
		<h2><button href="#collapse99" class="nav-toggle">show</button>&nbsp;Tailoring notes:</h2>
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
	
	</div>
	
	</div>
	

	
	
	

	
	</div>
<div id="outerWrapper">


	

	


	


	

	


		<!--This div belongs to content--->
<!-- Main Content ends here -->






<!-- Footer begins here --> 
<div id="footer">
	
			





</div><!-- Ties up to Page Container above -->

							

                      

      
    
<!-- #EndEditable -->
		
</body>
</html>

