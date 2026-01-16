

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
<title>Planning Processes</title>

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


<style type="text/css">
.auto-style2 {
	text-align: left;
}
</style>


<a style="position: fixed; bottom:5px;left:5px;" href="#" title="Back to Top"><img style="border: none;" src="http://www.pmway.co.za/images/top.png"/></a>


     <style>
.shakeimage{
position:relative
}
	 </style>



<script language="JavaScript1.2">

/*
Shake image script (onMouseover)-
&copy; Dynamic Drive (www.dynamicdrive.com)
For full source code, usage terms, and 100's more DHTML scripts, visit http://dynamicdrive.com
*/

//configure shake degree (where larger # equals greater shake)
var rector=3

///////DONE EDITTING///////////
var stopit=0
var a=1

function init(which){
stopit=0
shake=which
shake.style.left=0
shake.style.top=0
}

function rattleimage(){
if ((!document.all&&!document.getElementById)||stopit==1)
return
if (a==1){
shake.style.top=parseInt(shake.style.top)+rector+"px"
}
else if (a==2){
shake.style.left=parseInt(shake.style.left)+rector+"px"
}
else if (a==3){
shake.style.top=parseInt(shake.style.top)-rector+"px"
}
else{
shake.style.left=parseInt(shake.style.left)-rector+"px"
}
if (a<4)
a++
else
a=1
setTimeout("rattleimage()",50)
}

function stoprattle(which){
stopit=1
which.style.left=0
which.style.top=0
}

</script>

<script>
$('#add').click(function() {
     $.post('your url',
         function(data) {
             var links = $('#links');
             // update your links with 'remove' button, etc
         }
     );
});

</script>



  <div style="position:absolute; left: 2%; top: 40px; font-size:50px; z-index:100; width: 10px; height: 10px;">
 <a href="http://www.pmway.co.za/index.php" title="Click here to go home">
	<img alt="" height="66" src="http://www.pmway.co.za/images/homeicon.png" width="67" class="shakeimage" onmouseover="init(this);rattleimage()" onmouseout="stoprattle(this);top.focus()" onclick="top.focus()" style="left: 0px; top: 0px; float: left;">
 </a></div>

 <div style="position:absolute; left: 9%; top: 37px; font-size:50px; z-index:100; width: 10px; height: 10px;">
 <a href="http://www.pmway.co.za/sitemap.php#pmbokdash" title="Click here for the top of the PMBOK Dashboard">
	<img alt="" height="80" src="http://www.pmway.co.za/images/processdashsmall.png" width="55" class="shakeimage" onmouseover="init(this);rattleimage()" onmouseout="stoprattle(this);top.focus()" onclick="top.focus()" style="left: 0px; top: 0px; float: left;">
 </a></div>



 <div style="position:absolute; left: 27%; top: 37px; font-size:50px; z-index:100; width: 10px; height: 10px;"><a href="http://www.pmway.co.za/sandpit.php" title="Play around in the Key Concepts sandpit. Have fun!"> <img alt="" height="62"
src="http://www.pmway.co.za/images/sandpit.png" width="90"
 class="shakeimage" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" onClick="top.focus()" height="71" src="images/check.png" width="50" />
 </a> </div>

 <div style="position:absolute; left: 15%; top : 37px; font-size:50px; z-index:100; width: 10px; height: 10px;"><a href="http://www.pmway.co.za/sitemap.php#proc" title="Learn how to run successful projects with the Project Management Processes and Knowledge Areas - the PMBOK Way">
	<img alt="" height="70"
src="http://www.pmway.co.za/images/inst_process.png" width="70"
 class="shakeimage" onMouseover="init(this);rattleimage()" onMouseout="stoprattle(this);top.focus()" onClick="top.focus()" height="71" src="images/check.png" width="50" style="left: 0px; top: 0px" />
 </a> </div>

</head>



<body>


<div id="outerWrapper">

<!-- Masthead begins here -->
<div id="header">

<table style="width: 100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="45%"><h1><span style="font-size:20pt;">PMWay</span></h1></td>
<td width="3%"><p><a href="../logout.php" title="Logout"><span class="fontsizesmall">Logout</span></a>&nbsp;&nbsp;</p>
</td><td width="52%" class="fontsizesmedium"><?php include 'includes/sescookie.php'; ?>
</td>
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
<div id="contentWrapper">

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
<!-- #BeginEditable "content" -->


	<div id="contentWrapper">


<div id="content" class="ctr">

<!--This is where the main stuff goes--->
	<h1 class="auto-style2">Planning Processes</h1> <hr />






	<map id="ImgMap0" name="ImgMap0">
	<area coords="35, 4, 77, 23" href="http://www.pmway.co.za/sitemap.php#proc" shape="rect" />
	</map>







	<img alt="" height="58" src="http://www.pmway.co.za/images/sitemapmenuindex.png" width="111" style="float: left" usemap="#ImgMap0" /><br />
<img alt="" height="1100" src="http://www.pmway.co.za/processesdash/images/plan.png" width="866" />
	<br />
	<br />





	</div>

</div><!--This div belongs to content--->
<!-- Main Content ends here -->






<!-- Footer begins here -->
<div id="footer">

				<p style="color:#69c"><a href="../disclaim.php" >PMWay disclaimer</a></p><p style="color:#69c">
		<br />
		Contact
		<a title="Copy and Paste the email address to your email editor to send me mail.">
		Mark@PMWay.co.za</a>
		</p>





</div><!-- Ties up to Page Container above -->







<!-- #EndEditable -->

</body>
</html>

