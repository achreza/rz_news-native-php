<?php
session_start();
include "../controller/koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    header("location:404.php");
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RZ-News | Menu Admin</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">

                    <a href="#" class="navbar-brand">List User</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-reorder"></i>
                    </button>

                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav mr-auto">

                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Manage Artikel</a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="admin_menu.php">Konfirmasi Artikel</a></li>
                                    <li><a href="admin_log.php">Lihat Log</a></li>
                                    <li><a href="admin_rekap.php">Lihat Rekap</a></li>
                                    <li><a href="admin_semua.php">Semua Artikel</a></li>
                                    <li><a href="admin_tags.php">Manage Tags</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="admin_komentar.php">Manage Komentar</a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Manage User</a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="admin_user.php">List User</a></li>
                                    <li><a href="admin_level.php">List level</a></li>
                                </ul>
                            </li>



                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="../controller/login_controller.php?op=out">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="wrapper wrapper-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <span class="label label-success float-left">Total</span>
                                    <h5><br>Views</h5>
                                </div>
                                <div class="ibox-content">
                                    <?php
                                    include "../controller/koneksi.php";
                                    $query1 = "SELECT SUM(view) AS total FROM views;";
                                    $root = $koneksi->query($query1);
                                    $data1 = $root->fetch_array();
                                    ?>
                                    <h1 class="no-margins"><?php echo $data1['total'] ?> View</h1>
                                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                    <small>Total views</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <span class="label label-success float-left">Total</span>
                                    <h5><br>Komentar</h5>
                                </div>
                                <div class="ibox-content">
                                    <?php
                                    $query2 = "SELECT COUNT(komentar) AS total FROM komentar;";
                                    $root2 = $koneksi->query($query2);
                                    $data2 = $root2->fetch_array();
                                    ?>
                                    <h1 class="no-margins"><?php echo $data2['total'] ?> Komentar</h1>
                                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                    <small>Komentar semua Artikel</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <span class="label label-success float-left">Total</span>
                                    <h5><br>Artikel</h5>
                                </div>
                                <div class="ibox-content">
                                    <?php
                                    $query3 = "SELECT COUNT(judul) AS total FROM artikel;";
                                    $root3 = $koneksi->query($query3);
                                    $data3 = $root3->fetch_array();
                                    ?>
                                    <h1 class="no-margins"><?php echo $data3['total'] ?> Artikel</h1>
                                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                    <small>Total semua Artikel</small>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Artikel Hari ini</h5>
                                    <div class="ibox-tools">

                                        <span class="label label-primary float-right"> Updated <?php echo date("Y-m-d") ?></span>

                                    </div>
                                    <br>
                                </div>
                                <div class="ibox-content">
                                    <?php
                                    $query4 = "SELECT COUNT(judul) AS total FROM artikel where tanggal = '" . date("Y-m-d") . "';";
                                    $root4 = $koneksi->query($query4);
                                    $data4 = $root4->fetch_array();
                                    ?>
                                    <h1 class="no-margins"><?php echo $data4['total'] ?> Artikel</h1>


                                    <small>Jumlah Artikel yang Terupload Hari ini</small>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>List Level </h5>

                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-9 m-b-xs">
                                            <div data-toggle="buttons" class="btn-group btn-group-toggle">
                                                <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Semua </label>
                                                <!-- <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Week </label>
                                                <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Month </label> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                        Tambah Data Baru
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Level Baru</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="../controller/action_add_level.php" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="mb-2">
                                                                            <label for="exampleFormControlInput1" class="form-label">Nama level</label>
                                                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Isi Nama Level" name="level">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tabel -->



                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Level</th>
                                                    <th>Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $a = "select * from level";
                                                $b = $koneksi->query($a);
                                                while ($c = $b->fetch_array()) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $c['id_level'] ?></td>
                                                        <td><?php echo $c['nama_level'] ?> </td>
                                                        <td>
                                                            <form action="../controller/crud_level_controller.php?id=<?php echo $c['id_level'] ?>" method="post">
                                                                <table>
                                                                    <tr><button name="submit" value="confirm" type="submit" class="btn m-md-1"><i class="fa fa-pencil text-navy"></i></button></tr>
                                                                    <tr><button name="submit" value="delete" type="submit" class="btn m-md-1"><i class="fa fa-trash text-danger"></i></i></a></tr>
                                                                </table>
                                                            </form>



                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>




                    </div>



                </div>
            </div>


            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="../js/demo/peity-demo.js"></script>


    <script>
        $(document).ready(function() {


            var d1 = [
                [1262304000000, 6],
                [1264982400000, 3057],
                [1267401600000, 20434],
                [1270080000000, 31982],
                [1272672000000, 26602],
                [1275350400000, 27826],
                [1277942400000, 24302],
                [1280620800000, 24237],
                [1283299200000, 21004],
                [1285891200000, 12144],
                [1288569600000, 10577],
                [1291161600000, 10295]
            ];
            var d2 = [
                [1262304000000, 5],
                [1264982400000, 200],
                [1267401600000, 1605],
                [1270080000000, 6129],
                [1272672000000, 11643],
                [1275350400000, 19055],
                [1277942400000, 30062],
                [1280620800000, 39197],
                [1283299200000, 37000],
                [1285891200000, 27000],
                [1288569600000, 21000],
                [1291161600000, 17000]
            ];

            var data1 = [{
                    label: "Data 1",
                    data: d1,
                    color: '#17a084'
                },
                {
                    label: "Data 2",
                    data: d2,
                    color: '#127e68'
                }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {
                type: 'line',
                data: lineData,
                options: lineOptions
            });

        });
    </script>

</body>

</html>