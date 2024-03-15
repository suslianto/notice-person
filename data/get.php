<?php
$url_semarang = "id3.tunnel.my.id:3531";
$token_semarang = "3678B73CE78E07E3C6BFE4D5EBDFD853";
$pt_semarang = "PT. PLN Indonesia Power Semarang";
function user_data($ur) {
    $full = array();
    $head = array('Content-Type:application/json','Accept:application/json');
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_FOLLOWLOCATION => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $ur,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_VERBOSE => true,
    ));
    $get = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($get, true);
    return $data;
}
$data_semarang = user_data("http://id3.tunnel.my.id:3231/data/dis.php");
?>