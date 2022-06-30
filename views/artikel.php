<html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RZ-WEB - Artikel Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

    <?php
    $id = $_GET['op'];
    //get id artikel
    include "../controller/koneksi.php";
    $a = "select * from artikel where id_artikel = '" . $id . "'";
    $b = $koneksi->query($a);
    $query = "update views set view = view + 1 where id_artikel = '" . $id . "'";
    $koneksi->query($query);
    $c = $b->fetch_array()
    ?>
</head>

<body id="page-top" class="landing-page no-skin-config bg-dark">
    <div class="navbar-wrapper mb-md-5">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">

                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <a class="navbar-brand display-3" href="user_menu.php">BACK</a>
                <div class="collapse navbar-collapse justify-content-start" id="navbar">
                    <ul class="nav navbar-nav navbar-right mt-md-5">


                    </ul>
                </div>

            </div>
        </nav>

    </div>
    <!-- Awal Artikel -->
    <section id="artikel">
        <div class="wrapper wrapper-content  animated fadeInRight article mt-md-5">
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="float-right">
                                <button class="btn btn-white btn-xs" type="button"><?php echo $c['tag'] ?></button>
                            </div>
                            <div class="text-center article-title">
                                <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $c['tanggal'] ?></span>
                                <h1>
                                    <?php echo $c['judul'] ?>
                                </h1>
                            </div>
                            <?php
                            $gambar = "select * from images where id_artikel = '" . $id . "'";
                            $result = $koneksi->query($gambar);

                            $datagambar = $result->fetch_array()
                            ?>
                            <img class="img-fluid rounded mx-auto d-block" src="../img/fotoartikel/<?php echo $datagambar['namafile'] ?> "><br>
                            <p>
                                <?php echo $c['header'] ?>
                            </p>
                            <p>
                                <?php echo $c['isi'] ?>
                            </p>

                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Tags:</h5>
                                    <button class="btn btn-primary btn-xs" type="button"><?php echo $c['tag'] ?></button>
                                </div>
                                <div class="col-md-6">
                                    <div class="small text-right">
                                        <h5>Stats:</h5>
                                        <?php
                                        $qkomentar = "SELECT COUNT(komentar) AS totalkomen FROM komentar where id_artikel = '" . $id . "';";
                                        $res = $koneksi->query($qkomentar);
                                        $totalkomen =  $res->fetch_array();
                                        ?>
                                        <div> <i class="fa fa-comments-o"> </i> <?php echo $totalkomen['totalkomen'] ?> comments </div>
                                        <?php
                                        $query = "SELECT view from views where id_artikel = '" . $id . "';";
                                        $res = $koneksi->query($query);
                                        $data =  $res->fetch_array();
                                        ?>
                                        <i class="fa fa-eye"> </i> <?php echo $data['view'] ?> views
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Comments:</h2>
                                    <?php
                                    $query = "select * from komentar where id_artikel = '" . $id . "'";
                                    $output = $koneksi->query($query);

                                    $numRow = mysqli_num_rows($output);
                                    if ($numRow > 0) {
                                        while ($data = $output->fetch_array()) {
                                    ?>
                                            <!-- Awal Komentar -->
                                            <div class="social-feed mt-md-1">
                                                <div class="social-avatar">
                                                    <a href="" class="float-left">
                                                        <?php
                                                        include "../controller/koneksi.php";

                                                        $gambar = "select * from user inner join profil on user.id = profil.id_user INNER JOIN komentar on komentar.user = user.nama where komentar.user = '" . $data['user'] . "'  ";
                                                        $result = $koneksi->query($gambar);

                                                        $dataprofil = $result->fetch_array()
                                                        ?>
                                                        <img alt="image" src="../img/profil/<?php if (empty($dataprofil['foto'])) {
                                                                                                echo "person.png";
                                                                                            } else {
                                                                                                echo $dataprofil['foto'];
                                                                                            } ?>">
                                                    </a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <?php echo $data['user'] ?>
                                                        </a>
                                                        <small class="text-muted"><?php echo $data['jam'] ?> - <?php echo $data['tanggal'] ?></small>
                                                    </div>
                                                </div>

                                                <div class="social-body">
                                                    <p>
                                                        <?php echo $data['komentar'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Akhir komentar -->

                                    <?php
                                        }
                                    } else {
                                        echo "Tidak ada komentar di Artikel ini";
                                    }
                                    ?>




                                </div>
                            </div>
                            <form action="../controller/komentar_controller.php?id=<?php echo $id ?>" method="post">
                                <div class="ibox-content">

                                    <div class="form-group  row"><label class="col-md-2 col-form-label">Tambahkan Komentar</label>

                                        <div class="col-sm-8"><input type="text" class="form-control" name="komentar"></div>
                                        <button type="submit" class="btn btn-w-m btn-primary col-md-2">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Akhir Artikel -->

</body>

<!-- Mainly scripts -->
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="../js/inspinia.js"></script>
<script src="../js/plugins/pace/pace.min.js"></script>
<script src="../js/plugins/wow/wow.min.js"></script>

</html>