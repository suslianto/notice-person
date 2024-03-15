<?php include "data/get.php"; ?>
<!DOCTYPE html>
<head>
<title>Blacklist Monitoring</title>
<link rel="stylesheet" href="assets/css/theme.css">
<link rel="icon" type="image/x-icon" href="/assets/images/favicon.jpg">
</head>

<body class="bg-light ">
    <div class="bg-secondary pt-6 pb-21"></div>
        <div class="container-fluid mt-n22 px-6 ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 ">
                    <!-- Page header -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mb-2 mb-lg-0">
                                <h3 class="mb-0  text-white">Notice Person Monitoring</h3>
                            </div>
                                <div class="ms-lg-3 d-none d-md-none d-lg-block">
                                    <form class="d-flex align-items-center">
                                        <input type="text" id="example" class="form-control" placeholder="Search" />
                                    </form>
                                </div>
                        </div>
                </div>
            </div>
            <!-- row  -->
            <div class="row mt-6">
                <div class="col-md-12 col-12">
                    <!-- card  -->
                    <div class="card">
                        <div class="table">
                            <table id="example" class="table text-nowrap mb-0">
                                <thead class="table-light ">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Personel ID</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data_semarang["data"] as $value) {
                                $foto = $value["foto"];
                                $pin = $value["id"];
                                $nipeg = $value["nipeg"];
                                ?>
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <!-- <div>
                                                    <div class="icon-shape icon-md border p-4rounded-1">
                                                        <img src="assets/images/person.jpg" alt="photo-user">
                                                    </div>
                                                </div> -->
                                                <div class="lh-1">
                                                    <h5 class="mb-1"> <a href="detail?id=<?php echo $pin; ?>&nipeg=<?php echo $nipeg; ?>&url=<?php echo $url_semarang; ?>&token=<?php echo $token_semarang; ?>&pt=<?php echo $pt_semarang; ?>" target="_blank"" class="text-inherit"><?php echo $value["name"];?></a></h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle "><?php echo $pin; ?></td>
                                        <td class="align-middle"><?php echo $value["dept"];?></td>
                                        <td class="align-middle"><span class="badge bg-danger">Blacklist</span></td>
                                        <td class="align-middle"><a href="detail?id=<?php echo $pin; ?>&nipeg=<?php echo $nipeg; ?>&url=<?php echo $url_semarang; ?>&token=<?php echo $token_semarang; ?>&pt=<?php echo $pt_semarang; ?>" target="_blank"><span class="badge bg-info">Detail</span></a></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="assets/js/main.js"></script>
<script src="assets/js/sidebarMenu.js"></script>
</body>
</html>