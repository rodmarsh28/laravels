<?php
include("countries.php");
include("flag.php");
include("proxy.php");
global $cur_proxy;
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
        // CURLOPT_SSL_VERIFYPEER => 1,
        // CURLOPT_SSL_VERIFYHOST => 1,
        // CURLOPT_COOKIE => "itrack=$cookie",
        CURLOPT_HEADER => 0,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        // CURLOPT_COOKIEFILE => $cookie,
        // CURLOPT_COOKIEJAR => $cookie,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}


//  $proxie = get_proxies();

function get_proxies(){
    //   $data = file_get_contents("http://localhost:5555/random");
    //   return $data ;
    $clientKey= "60f7bdf787msh61ddbd43812c12cp1059a4jsnd4564938be2c";
    $createTask =  cURLc(
        "https://ephemeral-proxies.p.rapidapi.com/v2/datacenter/proxy",
        $headers = [
            "X-RapidAPI-Host: ephemeral-proxies.p.rapidapi.com",
            "X-RapidAPI-Key: $clientKey",
            "content-type: application/json"
        ],
        '',
        "GET");
        $data = json_decode($createTask, true);
         $proxy = $data["proxy"]["host"].':'.$data["proxy"]["port"];
        return $proxy;
}

echo get_proxies();