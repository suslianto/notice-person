<?php
header("Content-Type: application/json");
$host = "127.0.0.1";
$base = "biosecurity-boot";
$user = "root";
$pwd = "ZKTeco##123";
$head = array('Content-Type: application/json;charset=UTF-8');

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$conn = pg_connect("host=".$host." port=5442 dbname=".$base." user=".$user." password=".$pwd) or die("Failed:".pg_last_error()."<br/>");
//print "Sucess.<br/>";

$query = "SELECT * FROM acc_person WHERE disabled = 't'";
$result = pg_query($query) or die("Error:". pg_last_error());
$black = array();
while ($row = pg_fetch_row($result)) {
	$id = $row[17];
	$query = "SELECT * FROM pers_person WHERE id = '$id'";
	$resul = pg_query($query) or die("Error:". pg_last_error());
	$resultt = pg_fetch_row($resul);
    $quer = "SELECT * FROM pers_attribute_ext WHERE person_id = '$resultt[0]'";
    $ha = pg_query($quer) or die("Error:". pg_last_error());
    $re = pg_fetch_row($ha);
	//print_r($resultt);
    $quer = "SELECT * FROM att_person WHERE pers_person_pin = '$resultt[34]'";
    $resu = pg_query($quer) or die("Error:". pg_last_error());
	$res = pg_fetch_row($resu);
	//print_r($res);
    if ($resultt[19] == "M") {
        $gender = "Male";
    } else {
        $gender = "Femaile";
    }
    if ($re[19] == "") {
        $nipeg = '';
    } else {
        $nipeg = $re[19];
    }
    $black["data"][] = array(
        "site" => "PT. PLN Indonesia Power Semarang",
        "dept"=> $res[17],
        "foto" =>"",
        "name"=> $res[24],
        "time" => $gender,
        "id" => $res[25],
        "nipeg" => $nipeg,
    );
}
pg_free_result($result);
pg_close($conn);
echo json_encode($black, JSON_PRETTY_PRINT);
?>