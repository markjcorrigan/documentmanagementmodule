<?php include '../functions/init.php'; ?>
<?php if (logged_in()) {
    $loggedin = ' is logged in';
} else {
    redirect('../pmway.php');
}
?>
<?php include '../includessub/header.php'?>
<?php include '../includessub/nav.php'?>
<!DOCTYPE html>
<html lang="en">


  <head>


  <title>9.4</title>







<!--This is where the main stuff goes--->
  <style type="text/css">
.center {
	text-align: center;
}
</style>
  </head>

<div id="body">
<div class="container">

	<h3>Develop Team</h3>
	<h5>PG Executing, KA Resources, #9.4</h5><hr />
	
	
	
	
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
	<area coords="39, 52, 71, 81" href="http://www.pmway.co.za/processesdash/9.5.php" shape="rect" title="down" />
	<area alt="" coords="0, 14, 36, 58" href="http://www.pmway.co.za/processesdash/9.1.php" shape="rect" title="left" />
	<area alt="" coords="38, 24, 72, 51" href="http://www.pmway.co.za/processesdash/9.3.php" shape="rect" title="up" />
	<area alt="" coords="35, 5, 75, 24" href="http://www.pmway.co.za/sitemap.php#dash" shape="rect" title="index"/>
		<area coords="76, 17, 109, 58" href="http://www.pmway.co.za/processesdash/9.6.php" shape="rect" />
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
	<img class="img-fluid" alt="" height="1074" src="http://www.pmway.co.za/processesdash/imagesv6/ver69point4.png" width="842" usemap="#imgmap2" /> <br>
<br>

	
	<p class="ctr">Inputs, Tools and Techniques, and Outputs (ITTO's) as a dashboard to the PMBOK 
	version 6 guide.</p>
		<img class="img-fluid" alt="" height="915" src="http://www.pmway.co.za/processesdash/imagesv6/94.png" width="633" /><br /><br /><p class="ctr">
		ITTO's as an image from the PMBOK version 6 guide.</p>	
	<img class="img-fluid" src="http://www.pmway.co.za/processesdash/images/mouseover.png"
 onclick="this.src='http://www.pmway.co.za/processesdash/imagesv6/94ittos.png'" ondblclick="this.src='http://www.pmway.co.za/processesdash/images/mouseover.png'">
<br>

	
		
		<img class="img-fluid" src="http://www.pmway.co.za/processesdash/images/mouseover.png" onclick="this.src='http://www.pmway.co.za/processesdash/imagesv6/94flow.png'" ondblclick="this.src='http://www.pmway.co.za/processesdash/images/mouseover.png'">

		<br>
<br>

			
<p class="ctr">This Process Data Flow diagram from the PMBOK version 6 guide.</p>

<br>
<br>

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
	
</div>

</div>	

	


	


	

	


		<!--This div belongs to content--->
<!-- Main Content ends here -->






<!-- Footer begins here --> 
<div id="footer">
	
			





</div><!-- Ties up to Page Container above -->

							

                      

      
    
<!-- #EndEditable -->
		
</body>
</html>

