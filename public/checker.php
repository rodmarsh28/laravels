<?php
// session_start();
// if(empty($_SESSION["userId"])) {
//     // header("Location: ./login.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>DR.UGS - TOMBOY HUNTER</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.png"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>


    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="assets/css/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dash_2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/theme-checkbox-radio.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="alt-menu sidebar-noneoverflow"onload="ccgen();">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm bg-gradient-dark col-lg-12 col-md-12 col-sm-12 col-xl-12">

            <a class="navbar-brand" href="#"></svg><span class="navbar-brand-name" style="font-weight: bold;">SURAJ</span></a>
            </header>
    </div>
    <!--  END MAINBAR  -->

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

            

<div class="widget-list row">
                
                <!-- /.widget-holder -->
                <div class="widget-holder widget-full-height widget-flex col-lg-6">
                    <div class="md-form">
    <div class="col-md-12">
        
        
<button type="button" class="btn btn-danger btn-block" onclick="playClick();" id='hideshow'>BIN CHECKER</button><href="binlist.net"/>
                 <!-- ===== START OF SCREEN ===== -->
<center>
<div class="panel">
<iframe src="BIN-CHECKER/index.php" class="content" style="border:0;display:none" width="440" height="725">
</iframe>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</center>   
                 <!-- ===== END OF SCREEN ===== -->
                 
<button type="button" class="btn btn-dark btn-block" onclick="modalCCGEN();">CC GEN</button>

        
        
        
  <textarea type="text" style="text-align: center;" id="lista" class="md-textarea form-control" rows="10" placeholder="xxxxxxxxxxxxxxxxxxx|xx|xxxx|xxx"></textarea>
  <label for="lista"></label>
  <div name="lines_count" type="hidden" id="lines" style="display:none;" >Loading...</div>
</div>
</div>
<center>
    
    
    
    
    
    
<button type="button" class="btn btn-primary" id="submit" onclick="start()">Start</button>
<button type="button" class="btn btn-danger">Stop</button>
</center>

<br></br>
<select class="form-control h-10" id="gate" onchange="check()">



<option value="null">Select Gate</option>
<br></br>
<option  value="stripe006.php"disabled>BRAINTREE AUTH</option>
<option  value="braintree01.php">BRAINTREE 2 AUTH</option>
<option  value="stripe01.php">Stripe-CCN CHARGE (NON 3D ONLY)</option>
<option  value="stripe02.php">Stripe-CCN CHARGE (NON 3D ONLY)</option>
<option  value="stripe006.php"disabled>Stripe-CCN CHARGE (NON 3D ONLY)</option>
<option  value="payflow-ccn.php"disabled>PAYFLOW(CCN)</option>
<option  value="ANZ.php"disabled>ANZ</option>
<option  value="payway.php"disabled>PAYWAY</option>
<option  value="MASS check.php"disabled>Fluid</option>
<option  value="stripe002.php"disabled></option>
<!--<option  value="commerce7.php">commerce7</option>-->
</select>






                </div>

                <div class="widget-holder widget-full-content widget-full-height col-lg-6">

                        <div class="widget-four">
                            
                            <div class="widget-content">
                                <div class="vistorsBrowser">
                                    <div class="browser-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                        <div class="w-browser-details">
                                            <div class="w-browser-info">
                                                <h6>CVV</h6>
                                                <span class="badge rounded-pill bg-primary" id="cvv_count"></span>
                                            </div>
                                            <div class="w-browser-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-primary" id ="cvv_count_bar" role="progressbar" style="width: 0%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="browser-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </div>
                                        <div class="w-browser-details">
                                            
                                            <div class="w-browser-info">
                                                <h6>CCN</h6>
                                                <span class="badge rounded-pill bg-success" id="ccn_count"></span>
                                            </div>

                                            <div class="w-browser-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" id ="ccn_count_bar" role="progressbar" style="width: 0%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="browser-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                        <div class="w-browser-details">
                                            
                                            <div class="w-browser-info">
                                                <h6>DEAD</h6>
                                                <span class="badge rounded-pill bg-danger" id="dead_count"></span>
                                            </div>

                                            <div class="w-browser-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-warning" id ="dead_count_bar" role="progressbar" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    
                                    
                                    

                                    <div class="browser-list">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M7 15h0M2 9.5h20"/></svg>
                                        </div>
                                        <div class="w-browser-details">
                                            
                                            <div class="w-browser-info">
                                                <h6>CARD'S FOR CHECKING LEFT...</h6>
                                                <span class="badge rounded-pill bg-dark" id="total_count"></span>
                                              

                                            </div>
                                            
                                            
                                            
                                     
                                            

                                            <div class="w-browser-stats">
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-dark" id ="total_count_bar" role="progressbar" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    
                                                    
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    
                                </div>
                                


                            </div>
                            
                           
                            
                        </div>
                        
                         
                        
                        
                    </div>
                    
                   

                
</div>


                

                  <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="row widget-statistic">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm- col-12">
                                
                                
                    <button type="button" class="btn btn-danger btn-block" onclick="clearText33()">Clear CVV</button>
                                
                                <div class="widget widget-one_hybrid widget-followers" id="widget_followers_id" onclick="Mudaestado();">
                                    <div class="widget-heading">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                        <p class="w-value">CVV</p>
                                        <h5 class=""></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                
                <center>                
            <button type="button" class="btn btn-danger btn-block" onclick="clearText22()">    Clear CCN</button>   
            </center>
           
                                
                                
                                <div class="widget widget-one_hybrid widget-engagement" id="widget_engagement_id" onclick="Mudaestado_1();">
                                    <div class="widget-heading">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </div>
                                        <p class="w-value">CCN</p>
                                        <span class="badge badge-success" id="live2"></span>
                                        <h5 class=""></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                
                                
                               
<button type="button" class="btn btn-danger btn-block" onclick="clearText()">Clear Dead</button>

                               
                               
                               
                                
                                <div class="widget widget-one_hybrid widget-referral" id="widget_referral_id" onclick="Mudaestado_2();">
                                    <div class="widget-heading">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                        <p class="w-value">DEAD</p>
                                        <span class="badge badge-success" id="live2"></span>
                                        <h5 class=""></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" id="cvv_lives" style="display: none">
                        <div class="widget widget-one">
                            <div class="widget-heading">
                                <h6 class="cvv-master">CVV</h6>
                                <div id="bode"><span id="cvv_approved" class="cvv-approved"></span>
                              </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" id="ccn_lives" style="display: none">
                        <div class="widget widget-one">
                            <div class="widget-heading">
                                <h6 class="ccn-master">CCN</h6>
                                <div id="bode"><span id="ccn_approved" class="ccn-approved"></span>
                              </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" id="dead_cc" style="display: none">
                        <div class="widget widget-one">
                            <div class="widget-heading">
                                <h6 class="dead-master">DEAD</h6>
                                <div id="bode"><span id="declined_cc" class="declined-cc"></span>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                                    

                        </div>
                    </div>

                    
                
        
        
        
        <center>  
        
        
        <button type="button" name="clear_dead" id="reload" class="btn btn-warning" data-dismiss="modal" onclick="ReloadPage();">ʀᴇʟᴏᴀᴅ</button>
        
        <button type="button" name="clear_dead" id="reload" class="btn btn-primary" data-dismiss="modal" onclick="myFunction99();">Logout</button>
        
        
        
        </center>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->
    
    
        <!-- START OF CCGEN MODAL -->

    <div class="modal fade" id="ccGEN" role"dialog" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered"  style="background: transparent;">
            <div class="modal-content" style="background: transparent;">
                <div class="modal-body" style="background: #000000">
                    <center style="margin-bottom: 20px">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        
                        </button>
                        <!---<img class="rounded-circle" src="assets/img/hyno.jpg" width="150" height="150" style="margin-top: 10px;margin-bottom: 20px;" >--->
               
                        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:#fff">&times;</span>
        </button>       
      </center>
                    <form name="console" id="console" role="form" method="POST">
                        <div>
                            <div class="row">
                                <div class="col-8 col-lg-8">
                                    <div class="form-group">
                                    <center>   <span class="badge  badge-info" style="margin-left: 0px;color: #FFFFFF" for="inputbin">BIN</span>  <center> 
                                        <input id="ccpN" name="ccp" maxlength="19" type="text" id="inputbin" class="form-control" style="border-color: #35c0dc;background: transparent;color: #FFFFFF" placeholder="xxxxxx">
                                    </div>
                                </div>
                                <div class="col-4 col-lg-4">
                                    <div class="form-group">
                                    <center>      <span class="badge  badge-info" style="margin-left: 0px;color: #FFFFFF" for="inputcvv">CVV </span>  <center> 

                                        <input type="text" id="eccv" name="eccv" style="border-color: #35c0dc;background: transparent;color: #FFFFFF" class="form-control" placeholder="rnd" value="rnd">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-lg-4">
                                    <div class="form-group">
                                        <select type="text" name="ccoudatfmt" class="input_text" style="display:none;">
                                            <option value="CHECKER" selected="selected">CHK</option>
                                            <option value="CSV">CSV</option>
                                            <option value="XML">XML</option>
                                            <option value="JSON">JSON</option>
                                        </select>
                                        <input type="hidden" name="tr" value="1000">
                                        <input type="hidden" name="L" style="width: 20px" value="1L">
                                        <div type="hidden" id="bininfo" align="center"></div>
                                        <center>   <span class="badge  badge-info" style="margin-left: 0px;color: #FFFFFF" for="inputmonth">Month</span>  <center> 
                                        <select type="text" class="form-control" style="border-color: #35c0dc;background: transparent;color: #FFFFFF" name="emeses">
                                            <option style="background: #000000" value="rnd">RND</option>
                                            <option style="background: #000000" value="01">01 - ᴊᴀɴ</option>
                                            <option style="background: #000000" value="02">02 - ꜰᴇʙ</option>
                                            <option style="background: #000000" value="03">03 - ᴍᴀʀ</option>
                                            <option style="background: #000000" value="04">04 - ᴀᴘʀ</option>
                                            <option style="background: #000000" value="05">05 - ᴍᴀʏ</option>
                                            <option style="background: #000000" value="06">06 - ᴊᴜɴ</option>
                                            <option style="background: #000000" value="07">07 - ᴊᴜʟ</option>
                                            <option style="background: #000000" value="08">08 - ᴀᴜɢ</option>
                                            <option style="background: #000000" value="09">09 - ꜱᴇᴘ</option>
                                            <option style="background: #000000" value="10">10 - ᴏᴄᴛ</option>
                                            <option style="background: #000000" value="11">11 - ɴᴏᴠ</option>
                                            <option style="background: #000000" value="12">12 - ᴅᴇᴄ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-4">
                                    <div class="form-group">
                                      <center>  <span class="badge  badge-info" style="margin-left: 0px;color: #FFFFFF" for="inputyear">Year</span>  <center> 
                                        <select type="text" class="form-control" style="border-color: #35c0dc;background: transparent;color: #FFFFFF" name="eyear">
                                            <option style="background: #000000; " value="rnd">RND</option>
                                            <option style="background: #000000" value="2021">2021</option>
                                            <option style="background: #000000" value="2022">2022</option>
                                            <option style="background: #000000" value="2023">2023</option>
                                            <option style="background: #000000" value="2024">2024</option>
                                            <option style="background: #000000" value="2025">2025</option>
                                            <option style="background: #000000" value="2026">2026</option>
                                            <option style="background: #000000" value="2027">2027</option>
                                            <option style="background: #000000" value="2028">2028</option>
                                            <option style="background: #000000" value="2029">2029</option>
                                            <option style="background: #000000" value="2030">2030</option>
                                            <option style="background: #000000" value="2031">2031</option>
                                            <option style="background: #000000" value="2032">2032</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4  col-lg-4">
                                    <div class="form-group">
                                      <center>  <span class="badge  badge-info" style="margin-center: 0px;color: #FFFFFF" for="inputquantity">Quantity</span><center>
                                        <input type="number" name="ccghm" style="border-color: #35c0dc;background: transparent;color: #FFFFFF" maxlength="4" class="form-control" value="1000">
                                        <select type="text" name="ccnsp" class="input_text" style="display:none;">
                                            <option selected="selected">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <button type="button" style="margin-right: 20px;margin-left: 20px;" class="btn btn-success btn-block"  name="gerar" id="gerar" onclick="playClick();">GENERATE</button>

                            </div>
                            <div class="row">
                                
                            <button type="button" style="margin-right: 20px;margin-left: 20px;margin-top:5px;" class="btn btn-primary btn-block"  name="gerar" id="gerar"  data-dismiss="modal" onclick="start();">CHECK CARDS</button>
</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF CCGEN MODAL --> 
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="assets/js/dash_2.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script type="text/javascript">
function Mudaestado() {
        var display = document.getElementById("cvv_lives").style.display;
        if(display == "none"){
            if(document.getElementById("ccn_lives").style.display || document.getElementById("dead_cc").style.display == 'block'){
                document.getElementById("ccn_lives").style.display = 'none';
                document.getElementById("dead_cc").style.display = 'none';
                document.getElementById("cvv_lives").style.display = 'block';
            }
            else {
                document.getElementById("cvv_lives").style.display = 'block';
            }
        }
        else
            document.getElementById("cvv_lives").style.display = 'none';
    }
</script>
<script type="text/javascript">
function Mudaestado_1() {
        var display = document.getElementById("ccn_lives").style.display;
        if(display == "none"){
            if(document.getElementById("cvv_lives").style.display || document.getElementById("dead_cc").style.display == 'block'){
                document.getElementById("cvv_lives").style.display = 'none';
                document.getElementById("dead_cc").style.display = 'none';
                document.getElementById("ccn_lives").style.display = 'block';
            }
            else {
                document.getElementById("ccn_lives").style.display = 'block';
            }
        }
        else
            document.getElementById("ccn_lives").style.display = 'none';
    }
</script>
<script type="text/javascript">
function Mudaestado_2() {
        var display = document.getElementById("dead_cc").style.display;
        if(display == "none"){
            if(document.getElementById("cvv_lives").style.display || document.getElementById("ccn_lives").style.display == 'block'){
                document.getElementById("cvv_lives").style.display = 'none';
                document.getElementById("ccn_lives").style.display = 'none';
                document.getElementById("dead_cc").style.display = 'block';
            }
            else {
                document.getElementById("dead_cc").style.display = 'block';
            }
        }
        else
            document.getElementById("dead_cc").style.display = 'none';
    }
</script>
</script>
    <script type="text/javascript">
      function start() {
        var linha = $("#lista").val();
        var linhaenviar = linha.split("\n");
        var total = linhaenviar.length;
        var tested = total;
        document.getElementById("total_count").innerHTML = total;
        $('#total_count_bar').css('width', ((tested/total)*100)+'%').attr('aria-valuenow', ((tested/total)*100));  
        console.log(total);
        var ap = 0;
        var rp = 0;
        var up = 0;
        document.getElementById('cvv_count').setAttribute('value','')
        document.getElementById('ccn_count').setAttribute('value','')
        document.getElementById('dead_count').setAttribute('value','')
        linhaenviar.forEach(function(value, index) {
            setTimeout(
                function() {
        var req = new XMLHttpRequest();
        console.log("Grabbing Value");
        req.onreadystatechange = function () {
          if (req.readyState == 4 && req.status == 200) {
            if (req.responseText.match("CVV") && req.responseText.match("badge bg-success")) {
            remove();
            ap++;
            tested --;
            approved(req.responseText + "");
            }
            else if (req.responseText.match("CCN") && req.responseText.match("badge bg-success")) {
            remove();
            rp++;
            tested --;
            removed(req.responseText + "");
            }
            else { 
            remove();
            up++;
            tested --;
            unknownccs(req.responseText + "");
            }   
            $('#cvv_count').html(ap);
            $('#cvv_count_bar').css('width', ((ap/total)*100)+'%').attr('aria-valuenow', ((ap/total)*100));
            $('#ccn_count').html(rp);
            $('#ccn_count_bar').css('width', ((rp/total)*100)+'%').attr('aria-valuenow', ((rp/total)*100));
            $('#dead_count').html(up);
            $('#dead_count_bar').css('width', ((up/total)*100)+'%').attr('aria-valuenow', ((up/total)*100));
            document.getElementById("total_count").innerHTML = tested;
            $('#total_count_bar').css('width', ((tested/total)*100)+'%').attr('aria-valuenow', ((tested/total)*100));
          }
        }
        var whichgate = document.getElementById('gate').value;
        var gate = whichgate + "?lista="
        req.open("GET", gate + value, true);
        req.send(null);
        }, 7000 * index);
        });
      }
    function approved(str) {
        $("#cvv_approved").append(str + "<br>");
    }
    function removed(str) {
        $("#ccn_approved").append(str + "<br>");
    }
    function unknownccs(str) {
        $("#declined_cc").append(str + "<br>");
    }
    function remove() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }

    </script>
 
 
 
 
 
    
<script>
function myFunction99() {
    require('Location: logout.php')
}
}
}
</script>






    
    <script src="assets/js/Clearprone3.js"></script>
    <script src="assets/js/Clearprone2.js"></script>
    <script src="assets/js/Clearprone.js"></script>
    <script src="assets/js/UDP.js"></script>
    
<!--===== START OF SCREEN JS =====-->
<script>
$(document).ready(function(){
  $('#hideshow').on('click', function(event) {        
     $('.content').toggle('show');
  });
});    
</script>
<!--===== END OF SCREEN JS =====-->

    
 
 
    
    
    
    
    
</body>
</html>