<?php

set_time_limit(0);
ini_set('memory_limit', '2048M');

$servername = "localhost";
$username = "root";
$password = "";
$db = "spedi";
$conn = mysqli_connect($servername, $username, $password, $db);

$serverName = "DARDAW-LAPTOP\\SQLEXPRESS"; //serverName\instanceName
// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array("Database" => "system");
$conn_sqlsrv = sqlsrv_connect($serverName, $connectionInfo);

if ($conn_sqlsrv) {
    echo "Connection established.<br />";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT * FROM [system].[dbo].[sl_KodPocztowy]";

$result = sqlsrv_query($conn_sqlsrv, $sql);
if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$ktory = 0;
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $kraj = '';
    $ktory++;
    if ($row['kodp_kraj_prefix'] == "AF") {
        $kraj = "Afganistan";
    }
    if ($row['kodp_kraj_prefix'] == "AL") {
        $kraj = "Albania";
    }
    if ($row['kodp_kraj_prefix'] == "DZ") {
        $kraj = "Algieria";
    }
    if ($row['kodp_kraj_prefix'] == "AD") {
        $kraj = "Andora";
    }
    if ($row['kodp_kraj_prefix'] == "AO") {
        $kraj = "Angola";
    }
    if ($row['kodp_kraj_prefix'] == "AI") {
        $kraj = "Anguilla";
    }
    if ($row['kodp_kraj_prefix'] == "AQ") {
        $kraj = "Antarktyda";
    }
    if ($row['kodp_kraj_prefix'] == "AG") {
        $kraj = "Antigua i Barbuda";
    }
    if ($row['kodp_kraj_prefix'] == "SA") {
        $kraj = "Arabia Saudyjska";
    }
    if ($row['kodp_kraj_prefix'] == "AR") {
        $kraj = "Argentyna";
    }
    if ($row['kodp_kraj_prefix'] == "AG") {
        $kraj = "Antigua i Barbuda";
    }
    if ($row['kodp_kraj_prefix'] == "AM") {
        $kraj = "Armenia";
    }
    if ($row['kodp_kraj_prefix'] == "AW") {
        $kraj = "Aruba";
    }
    if ($row['kodp_kraj_prefix'] == "AU") {
        $kraj = "Australia";
    }
    if ($row['kodp_kraj_prefix'] == "AT") {
        $kraj = "Austria";
    }
    if ($row['kodp_kraj_prefix'] == "AT") {
        $kraj = "Austria";
    }
    if ($row['kodp_kraj_prefix'] == "AZ") {
        $kraj = "Azerbejdżan";
    }
    if ($row['kodp_kraj_prefix'] == "BS") {
        $kraj = "Bahamy";
    }
    if ($row['kodp_kraj_prefix'] == "BH") {
        $kraj = "Bahrajn";
    }
    if ($row['kodp_kraj_prefix'] == "BD") {
        $kraj = "Bangladesz";
    }
    if ($row['kodp_kraj_prefix'] == "BB") {
        $kraj = "Barbados";
    }
    if ($row['kodp_kraj_prefix'] == "BE") {
        $kraj = "Belgia";
    }
    if ($row['kodp_kraj_prefix'] == "BZ") {
        $kraj = "Belize";
    }
    if ($row['kodp_kraj_prefix'] == "BJ") {
        $kraj = "Benin";
    }
    if ($row['kodp_kraj_prefix'] == "BM") {
        $kraj = "Bermudy";
    }
    if ($row['kodp_kraj_prefix'] == "BT") {
        $kraj = "Bhutan";
    }
    if ($row['kodp_kraj_prefix'] == "BY") {
        $kraj = "Białoruś";
    }
    if ($row['kodp_kraj_prefix'] == "BO") {
        $kraj = "Boliwia";
    }
    if ($row['kodp_kraj_prefix'] == "BQ") {
        $kraj = "Bonaire, Sint Eustatius i Saba";
    }
    if ($row['kodp_kraj_prefix'] == "BA") {
        $kraj = "Bośnia i Hercegowina";
    }
    if ($row['kodp_kraj_prefix'] == "BW") {
        $kraj = "Botswana";
    }
    if ($row['kodp_kraj_prefix'] == "BR") {
        $kraj = "Brazylia";
    }
    if ($row['kodp_kraj_prefix'] == "BN") {
        $kraj = "Brunei Darussalam";
    }
    if ($row['kodp_kraj_prefix'] == "IO") {
        $kraj = "Brytyjskie Terytorium Oceanu Indyjskiego";
    }
    if ($row['kodp_kraj_prefix'] == "BG") {
        $kraj = "Bułgaria";
    }
    if ($row['kodp_kraj_prefix'] == "BF") {
        $kraj = "Burkina Faso";
    }
    if ($row['kodp_kraj_prefix'] == "BI") {
        $kraj = "Burundi";
    }
    if ($row['kodp_kraj_prefix'] == "XC") {
        $kraj = "Ceuta";
    }
    if ($row['kodp_kraj_prefix'] == "CL") {
        $kraj = "Chile";
    }
    if ($row['kodp_kraj_prefix'] == "CN") {
        $kraj = "Chiny";
    }
    if ($row['kodp_kraj_prefix'] == "CW") {
        $kraj = "Curacao";
    }
    if ($row['kodp_kraj_prefix'] == "HR") {
        $kraj = "Chorwacja";
    }
    if ($row['kodp_kraj_prefix'] == "CY") {
        $kraj = "Cypr";
    }
    if ($row['kodp_kraj_prefix'] == "TD") {
        $kraj = "Czad";
    }
    if ($row['kodp_kraj_prefix'] == "ME") {
        $kraj = "Czarnogóra";
    }
    if ($row['kodp_kraj_prefix'] == "DK") {
        $kraj = "Dania";
    }
    if ($row['kodp_kraj_prefix'] == "DM") {
        $kraj = "Dominika";
    }
    if ($row['kodp_kraj_prefix'] == "DO") {
        $kraj = "Dominikana";
    }
    if ($row['kodp_kraj_prefix'] == "DJ") {
        $kraj = "Dżibuti";
    }
    if ($row['kodp_kraj_prefix'] == "EG") {
        $kraj = "Egipt";
    }
    if ($row['kodp_kraj_prefix'] == "EC") {
        $kraj = "Ekwador";
    }
    if ($row['kodp_kraj_prefix'] == "ER") {
        $kraj = "Erytrea";
    }
    if ($row['kodp_kraj_prefix'] == "EE") {
        $kraj = "Estonia";
    }
    if ($row['kodp_kraj_prefix'] == "ET") {
        $kraj = "Etiopia";
    }
    if ($row['kodp_kraj_prefix'] == "FK") {
        $kraj = "Falklandy";
    }
    if ($row['kodp_kraj_prefix'] == "FJ") {
        $kraj = "Fidżi Republika";
    }
    if ($row['kodp_kraj_prefix'] == "PH") {
        $kraj = "Filipiny";
    }
    if ($row['kodp_kraj_prefix'] == "FI") {
        $kraj = "Finlandia";
    }
    if ($row['kodp_kraj_prefix'] == "TF") {
        $kraj = "Francuskie Terytorium Południowe";
    }
    if ($row['kodp_kraj_prefix'] == "FR") {
        $kraj = "Francja";
    }
    if ($row['kodp_kraj_prefix'] == "GA") {
        $kraj = "Gabon";
    }
    if ($row['kodp_kraj_prefix'] == "GM") {
        $kraj = "Gambia";
    }
    if ($row['kodp_kraj_prefix'] == "GH") {
        $kraj = "Ghana";
    }
    if ($row['kodp_kraj_prefix'] == "GI") {
        $kraj = "Gibraltar";
    }
    if ($row['kodp_kraj_prefix'] == "GR") {
        $kraj = "Grecja";
    }
    if ($row['kodp_kraj_prefix'] == "GD") {
        $kraj = "Grenada";
    }
    if ($row['kodp_kraj_prefix'] == "GL") {
        $kraj = "Grenlandia";
    }
    if ($row['kodp_kraj_prefix'] == "GE") {
        $kraj = "Gruzja";
    }
    if ($row['kodp_kraj_prefix'] == "GU") {
        $kraj = "Guam";
    }
    if ($row['kodp_kraj_prefix'] == "GY") {
        $kraj = "Gujana";
    }
    if ($row['kodp_kraj_prefix'] == "GT") {
        $kraj = "Gwatemala";
    }
    if ($row['kodp_kraj_prefix'] == "GN") {
        $kraj = "Gwinea";
    }
    if ($row['kodp_kraj_prefix'] == "GQ") {
        $kraj = "Gwinea Równikowa";
    }
    if ($row['kodp_kraj_prefix'] == "GW") {
        $kraj = "Gwinea-Bissau";
    }
    if ($row['kodp_kraj_prefix'] == "HT") {
        $kraj = "Haiti";
    }
    if ($row['kodp_kraj_prefix'] == "ES") {
        $kraj = "Hiszpania";
    }
    if ($row['kodp_kraj_prefix'] == "HN") {
        $kraj = "Honduras";
    }
    if ($row['kodp_kraj_prefix'] == "HK") {
        $kraj = "Hongkong";
    }
    if ($row['kodp_kraj_prefix'] == "IN") {
        $kraj = "Indie";
    }
    if ($row['kodp_kraj_prefix'] == "ID") {
        $kraj = "Indonezja";
    }
    if ($row['kodp_kraj_prefix'] == "IQ") {
        $kraj = "Indonezja";
    }
    if ($row['kodp_kraj_prefix'] == "ID") {
        $kraj = "Irak";
    }
    if ($row['kodp_kraj_prefix'] == "IR") {
        $kraj = "Iran";
    }
    if ($row['kodp_kraj_prefix'] == "IE") {
        $kraj = "Irlandia";
    }
    if ($row['kodp_kraj_prefix'] == "IS") {
        $kraj = "Islandia";
    }
    if ($row['kodp_kraj_prefix'] == "IL") {
        $kraj = "Izrael";
    }
    if ($row['kodp_kraj_prefix'] == "JM") {
        $kraj = "Jamajka";
    }
    if ($row['kodp_kraj_prefix'] == "JP") {
        $kraj = "Japonia";
    }
    if ($row['kodp_kraj_prefix'] == "YE") {
        $kraj = "Jemen";
    }
    if ($row['kodp_kraj_prefix'] == "JO") {
        $kraj = "Jordania";
    }
    if ($row['kodp_kraj_prefix'] == "KY") {
        $kraj = "Kajmany";
    }
    if ($row['kodp_kraj_prefix'] == "KH") {
        $kraj = "Kambodża";
    }
    if ($row['kodp_kraj_prefix'] == "CM") {
        $kraj = "Kamerun";
    }
    if ($row['kodp_kraj_prefix'] == "CA") {
        $kraj = "Kanada";
    }
    if ($row['kodp_kraj_prefix'] == "QA") {
        $kraj = "Katar";
    }
    if ($row['kodp_kraj_prefix'] == "KZ") {
        $kraj = "Kazachstan";
    }
    if ($row['kodp_kraj_prefix'] == "KE") {
        $kraj = "Kenia";
    }
    if ($row['kodp_kraj_prefix'] == "KG") {
        $kraj = "Kirgistan";
    }
    if ($row['kodp_kraj_prefix'] == "KI") {
        $kraj = "Kiribati";
    }
    if ($row['kodp_kraj_prefix'] == "CO") {
        $kraj = "Kolumbia";
    }
    if ($row['kodp_kraj_prefix'] == "KM") {
        $kraj = "Komory";
    }
    if ($row['kodp_kraj_prefix'] == "CG") {
        $kraj = "Kongo";
    }
    if ($row['kodp_kraj_prefix'] == "CD") {
        $kraj = "Kongo, Republika Demokratyczna";
    }
    if ($row['kodp_kraj_prefix'] == "KP") {
        $kraj = "Koreańska Republika Ludowo-Demokratyczna";
    }
    if ($row['kodp_kraj_prefix'] == "XK") {
        $kraj = "Kosowo";
    }
    if ($row['kodp_kraj_prefix'] == "CR") {
        $kraj = "Kostaryka";
    }
    if ($row['kodp_kraj_prefix'] == "CU") {
        $kraj = "Kuba";
    }
    if ($row['kodp_kraj_prefix'] == "KW") {
        $kraj = "Kuwejt";
    }
    if ($row['kodp_kraj_prefix'] == "LA") {
        $kraj = "Laos";
    }
    if ($row['kodp_kraj_prefix'] == "LS") {
        $kraj = "Lesotho";
    }
    if ($row['kodp_kraj_prefix'] == "LB") {
        $kraj = "Liban";
    }
    if ($row['kodp_kraj_prefix'] == "LR") {
        $kraj = "Liberia";
    }
    if ($row['kodp_kraj_prefix'] == "LY") {
        $kraj = "Libia";
    }
    if ($row['kodp_kraj_prefix'] == "LI") {
        $kraj = "Liechtenstein";
    }
    if ($row['kodp_kraj_prefix'] == "LT") {
        $kraj = "Litwa";
    }
    if ($row['kodp_kraj_prefix'] == "LU") {
        $kraj = "Luksemburg";
    }
    if ($row['kodp_kraj_prefix'] == "LR") {
        $kraj = "Liberia";
    }
    if ($row['kodp_kraj_prefix'] == "LV") {
        $kraj = "Łotwa";
    }
    if ($row['kodp_kraj_prefix'] == "MK") {
        $kraj = "Macedonia Północna";
    }
    if ($row['kodp_kraj_prefix'] == "MG") {
        $kraj = "Madagaskar";
    }
    if ($row['kodp_kraj_prefix'] == "YT") {
        $kraj = "Majotta";
    }
    if ($row['kodp_kraj_prefix'] == "MO") {
        $kraj = "Makau";
    }
    if ($row['kodp_kraj_prefix'] == "MW") {
        $kraj = "Malawi";
    }
    if ($row['kodp_kraj_prefix'] == "MV") {
        $kraj = "Malediwy";
    }
    if ($row['kodp_kraj_prefix'] == "MY") {
        $kraj = "Malezja";
    }
    if ($row['kodp_kraj_prefix'] == "ML") {
        $kraj = "Mali";
    }
    if ($row['kodp_kraj_prefix'] == "MT") {
        $kraj = "Malta";
    }
    if ($row['kodp_kraj_prefix'] == "MP") {
        $kraj = "Mariany Północne";
    }
    if ($row['kodp_kraj_prefix'] == "MA") {
        $kraj = "Maroko";
    }
    if ($row['kodp_kraj_prefix'] == "MR") {
        $kraj = "Mauretania";
    }
    if ($row['kodp_kraj_prefix'] == "MU") {
        $kraj = "Mauritius";
    }
    if ($row['kodp_kraj_prefix'] == "MX") {
        $kraj = "Meksyk";
    }
    if ($row['kodp_kraj_prefix'] == "XL") {
        $kraj = "Melilla";
    }
    if ($row['kodp_kraj_prefix'] == "FM") {
        $kraj = "Mikronezja";
    }
    if ($row['kodp_kraj_prefix'] == "UM") {
        $kraj = "Minor";
    }
    if ($row['kodp_kraj_prefix'] == "MD") {
        $kraj = "Mołdowa";
    }
    if ($row['kodp_kraj_prefix'] == "MN") {
        $kraj = "Mongolia";
    }
    if ($row['kodp_kraj_prefix'] == "MS") {
        $kraj = "Montserrat";
    }
    if ($row['kodp_kraj_prefix'] == "MZ") {
        $kraj = "Mozambik";
    }
    if ($row['kodp_kraj_prefix'] == "MM") {
        $kraj = "Myanmar";
    }
    if ($row['kodp_kraj_prefix'] == "NA") {
        $kraj = "Namibia";
    }
    if ($row['kodp_kraj_prefix'] == "NR") {
        $kraj = "Nauru";
    }
    if ($row['kodp_kraj_prefix'] == "NP") {
        $kraj = "Nepal";
    }
    if ($row['kodp_kraj_prefix'] == "NL") {
        $kraj = "Niderlandy";
    }
    if ($row['kodp_kraj_prefix'] == "DE") {
        $kraj = "Niemcy";
    }
    if ($row['kodp_kraj_prefix'] == "NE") {
        $kraj = "Niger";
    }
    if ($row['kodp_kraj_prefix'] == "NG") {
        $kraj = "Nigeria";
    }
    if ($row['kodp_kraj_prefix'] == "NI") {
        $kraj = "Nikaragua";
    }
    if ($row['kodp_kraj_prefix'] == "NU") {
        $kraj = "Niue";
    }
    if ($row['kodp_kraj_prefix'] == "NF") {
        $kraj = "Norfolk";
    }
    if ($row['kodp_kraj_prefix'] == "NO") {
        $kraj = "Norwegia";
    }
    if ($row['kodp_kraj_prefix'] == "NC") {
        $kraj = "Nowa Kaledonia";
    }
    if ($row['kodp_kraj_prefix'] == "NZ") {
        $kraj = "Nowa Zelandia";
    }
    if ($row['kodp_kraj_prefix'] == "PS") {
        $kraj = "Okupowane Terytorium Palestyny";
    }
    if ($row['kodp_kraj_prefix'] == "OM") {
        $kraj = "Oman";
    }
    if ($row['kodp_kraj_prefix'] == "PK") {
        $kraj = "Pakistan";
    }
    if ($row['kodp_kraj_prefix'] == "PW") {
        $kraj = "Palau";
    }
    if ($row['kodp_kraj_prefix'] == "PA") {
        $kraj = "Panama";
    }
    if ($row['kodp_kraj_prefix'] == "PG") {
        $kraj = "Papua Nowa Gwinea";
    }
    if ($row['kodp_kraj_prefix'] == "PY") {
        $kraj = "Paragwaj";
    }
    if ($row['kodp_kraj_prefix'] == "PE") {
        $kraj = "Peru";
    }
    if ($row['kodp_kraj_prefix'] == "PN") {
        $kraj = "Pitcairn";
    }
    if ($row['kodp_kraj_prefix'] == "PF") {
        $kraj = "Polinezja Francuska";
    }
    if ($row['kodp_kraj_prefix'] == "PL") {
        $kraj = "Polska";
    }
    if ($row['kodp_kraj_prefix'] == "PZ") {
        $kraj = "Południowa Afryka";
    }
    if ($row['kodp_kraj_prefix'] == "GS") {
        $kraj = "Południowa Georgia i Południowe Wyspy Sandwich";
    }
    if ($row['kodp_kraj_prefix'] == "PT") {
        $kraj = "Portugalia";
    }
    if ($row['kodp_kraj_prefix'] == "KR") {
        $kraj = "Republika Korei";
    }
    if ($row['kodp_kraj_prefix'] == "CF") {
        $kraj = "Rep.Środkowoafryańska";
    }
    if ($row['kodp_kraj_prefix'] == "RU") {
        $kraj = "Rosja";
    }
    if ($row['kodp_kraj_prefix'] == "RW") {
        $kraj = "Rwanda";
    }
    if ($row['kodp_kraj_prefix'] == "EH") {
        $kraj = "Sahara Zachodnia";
    }
    if ($row['kodp_kraj_prefix'] == "BL") {
        $kraj = "Saint Barthelemy";
    }
    if ($row['kodp_kraj_prefix'] == "RO") {
        $kraj = "Rumunia";
    }
    if ($row['kodp_kraj_prefix'] == "SV") {
        $kraj = "Salwador";
    }
    if ($row['kodp_kraj_prefix'] == "WS") {
        $kraj = "Samoa";
    }
    if ($row['kodp_kraj_prefix'] == "AS") {
        $kraj = "Samoa Amerykańskie";
    }
    if ($row['kodp_kraj_prefix'] == "SM") {
        $kraj = "San Marino";
    }
    if ($row['kodp_kraj_prefix'] == "SN") {
        $kraj = "Senegal";
    }
    if ($row['kodp_kraj_prefix'] == "XS") {
        $kraj = "Serbia";
    }
    if ($row['kodp_kraj_prefix'] == "SC") {
        $kraj = "Seszele";
    }
    if ($row['kodp_kraj_prefix'] == "SL") {
        $kraj = "Sierra Leone";
    }
    if ($row['kodp_kraj_prefix'] == "SG") {
        $kraj = "Singapur";
    }
    if ($row['kodp_kraj_prefix'] == "SZ") {
        $kraj = "Suazi";
    }
    if ($row['kodp_kraj_prefix'] == "SK") {
        $kraj = "Słowacja";
    }
    if ($row['kodp_kraj_prefix'] == "WS") {
        $kraj = "Samoa";
    }
    if ($row['kodp_kraj_prefix'] == "SI") {
        $kraj = "Słowenia";
    }
    if ($row['kodp_kraj_prefix'] == "SO") {
        $kraj = "Somalia";
    }
    if ($row['kodp_kraj_prefix'] == "LK") {
        $kraj = "Sri Lanka";
    }
    if ($row['kodp_kraj_prefix'] == "PM") {
        $kraj = "St. Pierre i Miquelon";
    }
    if ($row['kodp_kraj_prefix'] == "KN") {
        $kraj = "St.Kitts i Nevis";
    }
    if ($row['kodp_kraj_prefix'] == "LC") {
        $kraj = "St.Lucia";
    }
    if ($row['kodp_kraj_prefix'] == "SY") {
        $kraj = "Syria";
    }
    if ($row['kodp_kraj_prefix'] == "CH") {
        $kraj = "Szwajcaria";
    }
    if ($row['kodp_kraj_prefix'] == "SE") {
        $kraj = "Szwecja";
    }
    if ($row['kodp_kraj_prefix'] == "TJ") {
        $kraj = "Tadżykistan";
    }
    if ($row['kodp_kraj_prefix'] == "TH") {
        $kraj = "Tajlandia";
    }
    if ($row['kodp_kraj_prefix'] == "TW") {
        $kraj = "Tajwan";
    }
    if ($row['kodp_kraj_prefix'] == "TN") {
        $kraj = "Tunezja";
    }
    if ($row['kodp_kraj_prefix'] == "TR") {
        $kraj = "Turcja";
    }
    if ($row['kodp_kraj_prefix'] == "UG") {
        $kraj = "Uganda";
    }
    if ($row['kodp_kraj_prefix'] == "UA") {
        $kraj = "Ukraina";
    }
    if ($row['kodp_kraj_prefix'] == "UY") {
        $kraj = "Urugwaj";
    }
    if ($row['kodp_kraj_prefix'] == "UZ") {
        $kraj = "Uzbekistan";
    }
    if ($row['kodp_kraj_prefix'] == "VA") {
        $kraj = "Watykan";
    }
    if ($row['kodp_kraj_prefix'] == "VE") {
        $kraj = "Wenezuela";
    }
    if ($row['kodp_kraj_prefix'] == "HU") {
        $kraj = "Węgry";
    }
    if ($row['kodp_kraj_prefix'] == "GB") {
        $kraj = "Wielka Brytania";
    }
    if ($row['kodp_kraj_prefix'] == "VN") {
        $kraj = "Wietnam";
    }
    if ($row['kodp_kraj_prefix'] == "IT") {
        $kraj = "Włochy";
    }
    if ($row['kodp_kraj_prefix'] == "ZM") {
        $kraj = "Zambia";
    }
    if ($row['kodp_kraj_prefix'] == "ZW") {
        $kraj = "Zimbabwe";
    }

   $nazwa = iconv("Windows-1250", "UTF-8", $row['kodp_miasto']);
    
    $conn->query("INSERT INTO adresy_miasta VALUES (NULL, '{$nazwa}', '{$row['kodp_numer']}', '{$kraj}', '{$row['kodp_kraj_prefix']}')");
}
?>