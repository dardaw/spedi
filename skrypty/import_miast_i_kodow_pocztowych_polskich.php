<?php

set_time_limit(0);
ini_set('memory_limit', '2048M');

$servername = "localhost";
$username = "root";
$password = "";
$db = "spedi";
$conn = mysqli_connect($servername, $username, $password, $db);

$row = 0;
if (($handle = fopen("kody.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 100000000, ";")) !== FALSE) {
        $row++;
        $num = count($data);
        if ($row == 1) {
            continue;
        }
      
        $query = "SELECT adresy_miasto_id  FROM adresy_miasta WHERE adresy_miasto_nazwa = '{$data[2]}' AND adresy_miasto_kod_pocztowy = '{$data[0]}'";
        $result = $conn->query($query);
        if ($result->num_rows == 0) {
            $conn->query("INSERT INTO adresy_miasta VALUES (NULL, '{$data[2]}', '{$data[0]}', " . "'Polska')");
        }
       
    }
    fclose($handle);
}
?>
