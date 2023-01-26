

<?php
//namespace src\sites;
//use \Exception;
//$daxkoArray = array();


function getProxy($p_type){
    $ip = "127.0.0.1";
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


    }else if ($p_type == "squid"){
        $p = 
        array(
            "104.144.63.102:8800",
            "104.144.59.0:8800",
            "15.204.138.202:8800",
            "104.144.59.3:8800",
            "104.144.63.105:8800",
            "15.204.138.247:8800",
            "196.51.136.211:8800",
            "104.144.63.104:8800",
            "104.144.63.97:8800",
            "104.144.7.8:8800",
            "196.51.139.193:8800",
            "104.144.59.12:8800",
            "104.144.7.9:8800",
            "104.144.7.11:8800",
            "15.204.138.194:8800",
            "15.204.138.103:8800",
            "196.51.139.58:8800",
            "104.144.59.1:8800",
            "196.51.136.97:8800",
            "104.144.7.5:8800",
            "196.51.139.130:8800",
            "196.51.136.106:8800",
            "196.51.139.44:8800",
            "104.144.63.96:8800",
            "196.51.136.191:8800",
            "154.38.156.64:8800",
            "51.81.128.74:8800",
            "51.81.128.187:8800",
            "154.38.159.166:8800",
            "51.81.128.179:8800",
            "154.38.159.202:8800",
            "154.38.156.125:8800",
            "51.81.128.86:8800",
            "185.200.177.119:8800",
            "185.200.177.19:8800"
        );

        $proxy = array_rand($p);

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
