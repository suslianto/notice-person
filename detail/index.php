<?php
$id = $_GET["id"];
//$gender = $_GET["gen"];
$nipeg = $_GET["nipeg"];
$url = $_GET["url"];
$token = $_GET["token"];
$pt = $_GET["pt"];
$link = "https://".$url."/api/person/get/".$id."?access_token=".$token;
function maill($link) {
    $head = array('Content-Type:application/json','Accept:application/json');
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_FOLLOWLOCATION => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $link,
        CURLOPT_VERBOSE => true,
    ));
    $get = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($get, true);
    //var_dump($dataa);
    return $data;
}
$info = maill($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/x-icon" href="../assets/images/favicon.jpg">
<title>General Information</title>
<!--     Fonts and icons     -->
<!-- Nucleo Icons -->
<link rel="stylesheet" href="../assets/css/theme.css">
<link href="../assets/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
</head>
<!-- End Navbar -->
<body class="bg-light ">
    <div class="bg-secondary pt-6 pb-21"></div>
        <div class="container-fluid mt-n22 px-6 ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 ">
                    <!-- Page header -->
                        <div class="ms-15 lh-1 d-flex justify-content-between align-items-center">
                            <div class="mb-2 mb-lg-0">
                                <h3 class="mb-0  text-white">General Information</h3>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
<div class="student-profile py-2">
    <div class="container">
    <div class="row">
        <div class="col-lg-4 my-5">
        <div class="card ">
            <div class="card-header bg-transparent text-center ">
            <a href="#gambar"><img class="profile_img" src="data:image/jpg;base64, <?php echo $info["data"]["personPhoto"]; ?>" alt="detail"></a>
            <div class="overlay" id="gambar">
                <a href="#" class="close">
                    <svg style="width:47px;height:47px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                    </svg>
                </a>
                <img src="data:image/jpg;base64, <?php echo $info["data"]["personPhoto"]; ?>" alt="">
            </div>
            <h3><span style="color:red;font-weight:bold">BLACKLIST</span></h3>
            </div>
        </div>
        </div>
        <div class="col-lg-8">
        <div class="card my-4">
                <div class="border- pt-4 pb-4">
            <div class="card-body pt-0">
            <table class="table table-bordered">
                <tr>
                <th width="30%">NAMA</th>
                <td width="2%">:</td>
                <td><b><?php echo $info["data"]["name"]; ?></b></td>
                </tr>
                <tr>
                <th width="30%">Personel ID</th>
                <td width="2%">:</td>
                <td><b><?php echo $id; ?></b></td>
                </tr>
                <tr>
                <th width="30%">Department</th>
                <td width="2%">:</td>
                <td><b><?php echo $info["data"]["deptName"]; ?></b></td>
                </tr>
                <tr>
                <th width="30%">NIP</th>
                <td width="2%">:</td>
                <td><b><?php echo $nipeg; ?></b></td>
                </tr>
                <tr>
                <th width="30%">License plate</th>
                <td width="2%">:</td>
                <td><b><?php echo $info["data"]["carPlate"]; ?></b></td>
                </tr>
            </table>
            </div>
        </div>
            <div style="height: 26px"></div>
        </div>
    </div>
    </div>
</div>
</main>
</body>
</html>