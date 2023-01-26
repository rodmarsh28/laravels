







<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bin checker</title>
	<script type="text/javascript" src="bin-lookup.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="..//assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="..//assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/x-icon" href="assets/favicon.png"/>
    <link href="..//assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" />
	<link href="..//assets/css/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="..//assets/css/dash_2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/theme-checkbox-radio.css">
</head>
<body>
	<script type="text/javascript">

	</script>
<center>
<p style="margin-left: 2.5em;padding: 0 7em 2em 0;"></p>
    
		
	
	
	
	
<div class="block" style="margin: 2px;">
<div class="input-group mb-3">
<input  
  type="text" 
  maxlength = "6" 
  class="form-control" 
  placeholder="Enter Bin" 
  id="ibin"
  name="myinput_drs"
  oninput="maxLengthCheck(this)"
  type = "number"
  maxlength = "6"
  min = "1" 
  max = "999"
  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>

  
 <div 
 class="input-group-append">
<input 
type="button" 
value="GET" 
class="btn btn-outline-secondary" 
type="button" 
id="button-addon2" 
style="background-color: red; color: white;" 
onclick="getbin(); click1.play();"/>
</div>
</div>


    <div class="alert alert-primary" role="alert" style="margin-top: 45px;">
  Type:<span id="type"></span>
</div>
<div class="alert alert-primary" role="alert" style="margin-top: 45px;">
  Brand: <span id="brand"></span>
</div>
<div class="alert alert-primary" role="alert" style="margin-top: 45px;">
  Bank: <span id="bank"></span>
</div>
<div class="alert alert-primary" role="alert" style="margin-top: 45px;">
  Credit/Debit: <span id="cd"></span>
</div>
<div class="alert alert-primary" role="alert" style="margin-top: 45px;">
  Country: <span id="country"></span>
</div>


	</div>
	&nbsp;







<footer>
<!--	<h5 style="width:450px; background-color:#fffff;">SUPPORT HEIST CHECKERS AND CC'S</h5>-->
<!--	<a href="https://t.me/heist_cc_checkers" target="_blank">-->
<!--      <img src="https://img.icons8.com/color/30/000000/telegram-app.png">-->
<!--    </a>-->
    
    
 
</footer>






</center>
</body>
</html>



<script>
var click1 = new Audio();
click1.src = "/assets/msc/click.mp3";
</script>
