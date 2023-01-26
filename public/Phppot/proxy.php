

<?php
//namespace src\sites;
//use \Exception;
//$daxkoArray = array();


function getProxy($p_type,$ip){
    global $plist;
//    $plist = file_get_contents("proxylist.txt");
    if ($p_type=="tor") {
        #docker = rotating proxy
        $proxy  = "localhost:5566";
        $auth = "false";

    }elseif ($p_type=="best"){
        #docker = rotating proxy
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://$ip:4444/get",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $proxy = $response;


    }
    // echo $proxy;
    return $proxy;
}
//echo $result = getProxy("squid");
//echo  getProxy("best");
//echo json_decode(getProxy("tor"));

//if ($getproxies=="tor"){
//    $g = "tor";
//}elseif ($getproxies=="best"){
//    $g = "best";
//}else{
//    $g = "any";
//}
//echo getProxy($g);
