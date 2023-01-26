<?php
include("countries.php");
// include("flag.php");
// include("proxy.php");
// global $cur_proxy;

function GetStr($target, $start, $end){
    if ($target == ""){
        return false;

    }
    $str = explode($start, $target);
    $str = explode($end, $str[1]);
    return $str[0];
}
function generate_cookie(){
    return RandomString();
}

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
        CURLOPT_HEADER => 0,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function cURL($url, $headers, $postfields, $customrequest, $_fls, $cookie) {
    $session = $cookie;
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => $_fls,
        CURLOPT_COOKIE => "itrack=$cookie",
        CURLOPT_HEADER => 1,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_COOKIEFILE => getcwd()."/cookies/".$cookie.".txt",
        CURLOPT_COOKIEJAR => getcwd()."/cookies/".$cookie.".txt",
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$str = substr(randomString(), 0, 7);

// function get_proxies(){
//     //   $data = file_get_contents("http://localhost:5555/random");
//     //   return $data ;
//     $clientKey= "60f7bdf787msh61ddbd43812c12cp1059a4jsnd4564938be2c";
//     $createTask =  cURLc(
//         "http://173.82.245.245:12345/api/proxy/",
//         $headers = [
//             "content-type: application/json"
//         ],
//         '',
//         "GET");
//         $data = json_decode($createTask, true);
//          $proxy = $data["proxy"]["host"].':'.$data["proxy"]["port"];
//         return $proxy;
// }
// $proxie = get_proxies();

function randomInfo(){
    function cURL_ProxyOn($url, $headers, $postfields, $customrequest, $_fls, $cookie) {
        $session = $cookie;
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => $_fls,
            CURLOPT_COOKIE => "itrack=$cookie",
            CURLOPT_PROXY => 'http://proxy.proxy-cheap.com:31112',
            CURLOPT_PROXYUSERPWD => 'x7awgs9b:gh7yLYPj8liXxwpC',
            CURLOPT_HEADER => 1,
            CURLOPT_CUSTOMREQUEST => $customrequest,
            CURLOPT_COOKIEFILE => getcwd()."/cookies/".$cookie.".txt",
            CURLOPT_COOKIEJAR => getcwd()."/cookies/".$cookie.".txt",
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields
        ));
        $response = curl_exec($ch);
        curl_close($ch);
    
        return $response;
    }
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://randomuser.me/api/?nat=us',
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

function solveCaptcha($site,$siteKey){
    $clientKey= "60f7bdf787msh61ddbd43812c12cp1059a4jsnd4564938be2c";
    $createTask =  cURLc(
        "https://recaptcha-solver1.p.rapidapi.com/recaptchaV2/create_task",
        $headers = [
            "X-RapidAPI-Host: recaptcha-solver1.p.rapidapi.com",
            "X-RapidAPI-Key: $clientKey",
            "content-type: application/json"
        ],
        '{"key": "'.$siteKey.'",
            "url": "'.$site.'"}',
        "POST");
try{
    $data = json_decode($createTask,true);
    $taskId = $data["task_id"];
    $status = $data["status"];
    $gResponse = "";
    while ($status == "processing") {
        sleep(3);
        $getTaskResult =  cURLc(
            "https://recaptcha-solver1.p.rapidapi.com/get_result",
            $headers = [
                "X-RapidAPI-Host: recaptcha-solver1.p.rapidapi.com",
                "X-RapidAPI-Key: $clientKey",
                "content-type: application/json"
            ],'{"task_id": "'.$taskId.'"}',
            "POST"
        );
        $data = json_decode($getTaskResult,true);
        $status = $data["status"];
        }
         $response = $data["g_recaptcha_response"];
         return $response;
    }catch (Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}




function random_info(){
 $data = randominfo();
$str = substr(randomString(), 0,7);
$fname = GetStr($data, '"first":"', '"');
$lname = GetStr( $data, '"last":"', '"');
$email = GetStr($data, '"email":"', '"');
$street = GetStr($data, '"location":{"street":{"number":', '"},');
$street = str_replace('"name":"', " ", $data);
$local = GetStr($data, '"nat":"', '"');
$city = GetStr($data, '"city":"', '"');
$state = GetStr($data, '"state":"', '"');
$country = GetStr($data, '"country":"', '"');
$phone = GetStr($data, '"phone":"', '"');
$postcode = GetStr($data, '"postcode":"', '"');
$info = json_encode(array("fname" => "$fname", "lname" => "$lname", "email" => "$email", "street" => "$street", "city" => "$city", "state" => "$state", "phone" => "$phone", "postcode" => "$postcode","country" => "$country"));
return $info;
}
function fbanklist($ccbins)
{

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://lookup.binlist.net/$ccbins",
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_HEADER => 1,
        CURLOPT_HTTPHEADER => [
            'Host: lookup.binlist.net',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        ],
        CURLOPT_POSTFIELDS => ""
    ));
    $g_ccdets = curl_exec($ch);
    $cc_bname = GetStr($g_ccdets, '"bank":{"name":"', '"');
    $cc_country = GetStr($g_ccdets, '"name":"', '"');
    $abn = GetStr($g_ccdets, '"country":{"name":"', '"');
    $cc_vendor = GetStr($g_ccdets, '"scheme":"', '"');
    $cc_level = GetStr($g_ccdets, '"brand":"', '"');
    $cc_type = GetStr($g_ccdets, '"type":"', '"');
    $cc_emoji = GetStr($g_ccdets, '"emoji":"', '"');
    $cc_vendor = ucfirst("$cc_vendor");
    $cc_type = ucfirst("$cc_type");
    curl_close($ch);
    return json_encode(array("BIN" => "$ccbins", "Bank" => "$cc_bname", "Vendor" => "$cc_vendor", "Bank_Info" => "$cc_type - $cc_level", "Country" => "$cc_country", "Abn" => "$abn", "emoji" => "$cc_emoji"));

}
