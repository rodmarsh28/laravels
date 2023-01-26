<?php

namespace functions\countries;
use \Exception;
class get_abn{


/*
* Country Array to HTML Select List
* Developed By: Jose Philip Raja - www.josephilipraja.com
* About Author: Creative Director of CreaveLabs IT Solutions - www.creavelabs.com
*
* Usage:
*   echo countrySelector(); // Basic
*   echo countrySelector("IN"); // Set default Country with its code
*   echo countrySelector("IN", "my-country", "my-country", "form-control"); // With full Options
*
*/
//function countrySelector($defaultCountry = "", $id = "", $name = "", $classes = ""){
//    global $countryArray; // Assuming the array is placed above this function
//
//    $output = "<select id='".$id."' name='".$name."' class='".$classes."'>";
//
//	foreach($countryArray as $code => $country){
//		$countryName = ucwords(strtolower($country["name"])); // Making it look good
//		$output .= "<option value='".$code."' ".(($code==strtoupper($defaultCountry))?"selected":"").">".$code." - ".$countryName." (+".$country["code"].")</option>";
//	}
//
//	$output .= "</select>";
//
//	return $output; // or echo $output; to print directly
//}


//// Examples:
//echo "Basic: echo countrySelector();<br>";
//echo countrySelector(); // Basic
//
//echo "<hr>";
//
//echo 'Set default Country with its code: echo countrySelector("IN");<br>';
//echo countrySelector("IN"); // Set default Country with its code
//
//echo "<hr>";
//
//echo 'With full Options: echo countrySelector("IN", "my-country", "my-country", "form-control");<br>';
//echo countrySelector("IN", "my-country", "my-country", "form-control"); // With full Options

    public static function get_cntry_abn($country){
        $countryArray = array(
            "AD" => "ANDORRA",
            "AE" => "UNITED ARAB EMIRATES",
            "AF" => "AFGHANISTAN",
            "AG" => "ANTIGUA AND BARBUDA",
            "AI" => "ANGUILLA",
            "AL" => "ALBANIA",
            "AM" => "ARMENIA",
            "AN" => "NETHERLANDS ANTILLES",
            "AO" => "ANGOLA",
            "AQ" => "ANTARCTICA",
            "AR" => "ARGENTINA",
            "AS" => "AMERICAN SAMOA",
            "AT" => "AUSTRIA",
            "AU" => "AUSTRALIA",
            "AW" => "ARUBA",
            "AZ" => "AZERBAIJAN",
            "BA" => "BOSNIA AND HERZEGOVINA",
            "BB" => "BARBADOS",
            "BD" => "BANGLADESH",
            "BE" => "BELGIUM",
            "BF" => "BURKINA FASO",
            "BG" => "BULGARIA",
            "BH" => "BAHRAIN",
            "BI" => "BURUNDI",
            "BJ" => "BENIN",
            "BL" => "SAINT BARTHELEMY",
            "BM" => "BERMUDA",
            "BN" => "BRUNEI DARUSSALAM",
            "BO" => "BOLIVIA",
            "BR" => "BRAZIL",
            "BS" => "BAHAMAS",
            "BT" => "BHUTAN",
            "BW" => "BOTSWANA",
            "BY" => "BELARUS",
            "BZ" => "BELIZE",
            "CA" => "CANADA",
            "CC" => "COCOS KEELING ISLANDS",
            "CD" => "CONGO, THE DEMOCRATIC REPUBLIC OF THE",
            "CF" => "CENTRAL AFRICAN REPUBLIC",
            "CG" => "CONGO",
            "CH" => "SWITZERLAND",
            "CI" => "COTE D IVOIRE",
            "CK" => "COOK ISLANDS",
            "CL" => "CHILE",
            "CM" => "CAMEROON",
            "CN" => "CHINA",
            "CO" => "COLOMBIA",
            "CR" => "COSTA RICA",
            "CU" => "CUBA",
            "CV" => "CAPE VERDE",
            "CX" => "CHRISTMAS ISLAND",
            "CY" => "CYPRUS",
            "CZ" => "CZECH REPUBLIC",
            "DE" => "GERMANY",
            "DJ" => "DJIBOUTI",
            "DK" => "DENMARK",
            "DM" => "DOMINICA",
            "DO" => "DOMINICAN REPUBLIC",
            "DZ" => "ALGERIA",
            "EC" => "ECUADOR",
            "EE" => "ESTONIA",
            "EG" => "EGYPT",
            "ER" => "ERITREA",
            "ES" => "SPAIN",
            "ET" => "ETHIOPIA",
            "FI" => "FINLAND",
            "FJ" => "FIJI",
            "FK" => "FALKLAND ISLANDS MALVINAS",
            "FM" => "MICRONESIA, FEDERATED STATES OF",
            "FO" => "FAROE ISLANDS",
            "FR" => "FRANCE",
            "GA" => "GABON",
            "GB" => "UNITED KINGDOM",
            "GD" => "GRENADA",
            "GE" => "GEORGIA",
            "GH" => "GHANA",
            "GI" => "GIBRALTAR",
            "GL" => "GREENLAND",
            "GM" => "GAMBIA",
            "GN" => "GUINEA",
            "GQ" => "EQUATORIAL GUINEA",
            "GR" => "GREECE",
            "GT" => "GUATEMALA",
            "GU" => "GUAM",
            "GW" => "GUINEA-BISSAU",
            "GY" => "GUYANA",
            "HK" => "HONG KONG",
            "HN" => "HONDURAS",
            "HR" => "CROATIA",
            "HT" => "HAITI",
            "HU" => "HUNGARY",
            "ID" => "INDONESIA",
            "IE" => "IRELAND",
            "IL" => "ISRAEL",
            "IM" => "ISLE OF MAN",
            "IN" => "INDIA",
            "IQ" => "IRAQ",
            "IR" => "IRAN, ISLAMIC REPUBLIC OF",
            "IS" => "ICELAND",
            "IT" => "ITALY",
            "JM" => "JAMAICA",
            "JO" => "JORDAN",
            "JP" => "JAPAN",
            "KE" => "KENYA",
            "KG" => "KYRGYZSTAN",
            "KH" => "CAMBODIA",
            "KI" => "KIRIBATI",
            "KM" => "COMOROS",
            "KN" => "SAINT KITTS AND NEVIS",
            "KP" => "KOREA DEMOCRATIC PEOPLES REPUBLIC OF",
            "KR" => "KOREA REPUBLIC OF",
            "KW" => "KUWAIT",
            "KY" => "CAYMAN ISLANDS",
            "KZ" => "KAZAKSTAN",
            "LA" => "LAO PEOPLES DEMOCRATIC REPUBLIC",
            "LB" => "LEBANON",
            "LC" => "SAINT LUCIA",
            "LI" => "LIECHTENSTEIN",
            "LK" => "SRI LANKA",
            "LR" => "LIBERIA",
            "LS" => "LESOTHO",
            "LT" => "LITHUANIA",
            "LU" => "LUXEMBOURG",
            "LV" => "LATVIA",
            "LY" => "LIBYAN ARAB JAMAHIRIYA",
            "MA" => "MOROCCO",
            "MC" => "MONACO",
            "MD" => "MOLDOVA, REPUBLIC OF",
            "ME" => "MONTENEGRO",
            "MF" => "SAINT MARTIN",
            "MG" => "MADAGASCAR",
            "MH" => "MARSHALL ISLANDS",
            "MK" => "MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF",
            "ML" => "MALI",
            "MM" => "MYANMAR",
            "MN" => "MONGOLIA",
            "MO" => "MACAU",
            "MP" => "NORTHERN MARIANA ISLANDS",
            "MR" => "MAURITANIA",
            "MS" => "MONTSERRAT",
            "MT" => "MALTA",
            "MU" => "MAURITIUS",
            "MV" => "MALDIVES",
            "MW" => "MALAWI",
            "MX" => "MEXICO",
            "MY" => "MALAYSIA",
            "MZ" => "MOZAMBIQUE",
            "NA" => "NAMIBIA",
            "NC" => "NEW CALEDONIA",
            "NE" => "NIGER",
            "NG" => "NIGERIA",
            "NI" => "NICARAGUA",
            "NL" => "NETHERLANDS",
            "NO" => "NORWAY",
            "NP" => "NEPAL",
            "NR" => "NAURU",
            "NU" => "NIUE",
            "NZ" => "NEW ZEALAND",
            "OM" => "OMAN",
            "PA" => "PANAMA",
            "PE" => "PERU",
            "PF" => "FRENCH POLYNESIA",
            "PG" => "PAPUA NEW GUINEA",
            "PH" => "PHILIPPINES",
            "PK" => "PAKISTAN",
            "PL" => "POLAND",
            "PM" => "SAINT PIERRE AND MIQUELON",
            "PN" => "PITCAIRN",
            "PR" => "PUERTO RICO",
            "PT" => "PORTUGAL",
            "PW" => "PALAU",
            "PY" => "PARAGUAY",
            "QA" => "QATAR",
            "RO" => "ROMANIA",
            "RS" => "SERBIA",
            "RU" => "RUSSIAN FEDERATION",
            "RW" => "RWANDA",
            "SA" => "SAUDI ARABIA",
            "SB" => "SOLOMON ISLANDS",
            "SC" => "SEYCHELLES",
            "SD" => "SUDAN",
            "SE" => "SWEDEN",
            "SG" => "SINGAPORE",
            "SH" => "SAINT HELENA",
            "SI" => "SLOVENIA",
            "SK" => "SLOVAKIA",
            "SL" => "SIERRA LEONE",
            "SM" => "SAN MARINO",
            "SN" => "SENEGAL",
            "SO" => "SOMALIA",
            "SR" => "SURINAME",
            "ST" => "SAO TOME AND PRINCIPE",
            "SV" => "EL SALVADOR",
            "SY" => "SYRIAN ARAB REPUBLIC",
            "SZ" => "SWAZILAND",
            "TC" => "TURKS AND CAICOS ISLANDS",
            "TD" => "CHAD",
            "TG" => "TOGO",
            "TH" => "THAILAND",
            "TJ" => "TAJIKISTAN",
            "TK" => "TOKELAU",
            "TL" => "TIMOR-LESTE",
            "TM" => "TURKMENISTAN",
            "TN" => "TUNISIA",
            "TO" => "TONGA",
            "TR" => "TURKEY",
            "TT" => "TRINIDAD AND TOBAGO",
            "TV" => "TUVALU",
            "TW" => "TAIWAN, PROVINCE OF CHINA",
            "TZ" => "TANZANIA, UNITED REPUBLIC OF",
            "UA" => "UKRAINE",
            "UG" => "UGANDA",
            "US" => "UNITED STATES",
            "UY" => "URUGUAY",
            "UZ" => "UZBEKISTAN",
            "VA" => "HOLY SEE VATICAN CITY STATE",
            "VC" => "SAINT VINCENT AND THE GRENADINES",
            "VE" => "VENEZUELA",
            "VG" => "VIRGIN ISLANDS, BRITISH",
            "VI" => "VIRGIN ISLANDS, U.S.",
            "VN" => "VIET NAM",
            "VU" => "VANUATU",
            "WF" => "WALLIS AND FUTUNA",
            "WS" => "SAMOA",
            "XK" => "KOSOVO",
            "YE" => "YEMEN",
            "YT" => "MAYOTTE",
            "ZA" => "SOUTH AFRICA",
            "ZM" => "ZAMBIA",
            "ZW" => "ZIMBABWE"
        );
      $results = array_search($country,$countryArray);
      if (isset($results)==false){
          throw new Exception("Argument code must be non-empty string");
      }
      return $results;
    }

}

?>