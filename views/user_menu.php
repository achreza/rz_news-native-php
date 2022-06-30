<?php
session_start();
include "../controller/koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    header("location:404.php");
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
$userid = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RZ-WEB - Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body id="page-top" class="landing-page no-skin-config">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse justify-content-center" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="nav-link page-scroll" href="#page-top">Rz-News</a></li>
                        <li><a class="nav-link page-scroll" href="#beritautama">Utama</a></li>
                        <li><a class="nav-link page-scroll" href="#teknologi">Teknologi</a></li>
                        <li><a class="nav-link page-scroll" href="#team">GayaHidup</a></li>
                        <li><a class="nav-link page-scroll" href="#testimonials">Liburan</a></li>
                        <li><a class="nav-link page-scroll" href="#pricing">Olahraga</a></li>
                    </ul>
                </div>
                <a class="navbar-brand display-2" href="form_artikel.php">Upload Artikel </a>
                <a class="navbar-brand display-2 bg-danger" href="../controller/login_controller.php?op=out">
                    <i class="fa fa-sign-out"></i>Logout
                </a>
            </div>
        </nav>
    </div>

    <div id="inSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#inSlider" data-slide-to="0" class="active"></li>
            <li data-target="#inSlider" data-slide-to="1"></li>
            <li data-target="#inSlider" data-slide-to="2"></li>
            <li data-target="#inSlider" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Teknologi -->
            <?php
            include "../controller/koneksi.php";
            $a = "select * from artikel where tag = 'Teknologi'";
            $b = $koneksi->query($a);
            $c = $b->fetch_array()
            ?>
            <div class="carousel-item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="shadow-md">Teknologi<br />
                        </h1>
                        <p><?php echo $c['judul'] ?></p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="artikel.php?op=<?php echo $c['id_artikel'] ?>" role="button">READ MORE</a>
                        </p>
                    </div>
                    <div class="carousel-image wow zoomIn" style="margin-top: -40px;">
                        <img src="../img/landing/laptop2.png" alt="laptop" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back two"></div>
            </div>
            <!-- Olahraga -->
            <?php
            include "../controller/koneksi.php";
            $a = "select * from artikel where tag = 'Olahraga'";
            $b = $koneksi->query($a);
            $c = $b->fetch_array()
            ?>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="shadow-md">Olahraga<br />
                        </h1>
                        <p><?php echo $c['judul'] ?></p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="artikel.php?op=<?php echo $c['id_artikel'] ?>" role="button">READ MORE</a>
                        </p>
                    </div>
                    <div class="carousel-image wow zoomIn" style="margin-top: -20px;">
                        <img src="../img/landing/messi.png" alt="laptop" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one"></div>
            </div>
            <!-- Gaya Hidup -->
            <?php
            include "../controller/koneksi.php";
            $a = "select * from artikel where tag = 'Gaya Hidup'";
            $b = $koneksi->query($a);
            $c = $b->fetch_array()
            ?>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="shadow-md">Gaya Hidup<br />
                        </h1>
                        <p><?php echo $c['judul'] ?></p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="artikel.php?op=<?php echo $c['id_artikel'] ?>" role="button">READ MORE</a>
                        </p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="../img/landing/kantor.png" alt="laptop" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back two"></div>
            </div>
            <!-- Gaya Hidup -->
            <?php
            include "../controller/koneksi.php";
            $a = "select * from artikel where tag = 'Liburan'";
            $b = $koneksi->query($a);
            $c = $b->fetch_array()
            ?>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="shadow-md">Liburan<br />
                        </h1>
                        <p><?php echo $c['judul'] ?></p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="artikel.php?op=<?php echo $c['id_artikel'] ?>" role="button">READ MORE</a>
                        </p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="../img/landing/liburan.png" alt="laptop" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section id="team" class="white-section team  mt-md-5">
        <div class="row m-b-lg m-t-lg p-md-5 m-md-2">
            <div class="col-md-6">

                <?php
                include "../controller/koneksi.php";

                $gambar = "select * from profil where id_user = '" . $userid . "' ";
                $result = $koneksi->query($gambar);

                $dataprofil = $result->fetch_array()
                ?>

                <div class="profile-image">
                    <img src="../img/profil/<?php if (empty($dataprofil['foto'])) {
                                                echo "person.png";
                                            } else {
                                                echo $dataprofil['foto'];
                                            }
                                            ?> " class="rounded-circle circle-border m-b-md" alt="profile">
                </div>
                <div class="profile-info">
                    <div class="">
                        <div>
                            <h2 class="no-margins">
                                <?php echo $_SESSION['username'] ?>
                            </h2>
                            <h4><?php if (empty($dataprofil['title'])) {
                                    echo "Masih belum ada Title";
                                } else {
                                    echo $dataprofil['title'];
                                }  ?></h4>
                            <small>
                                <?php if (empty($dataprofil['bio'])) {
                                    echo "Masih belum ada Bio";
                                } else {
                                    echo $dataprofil['bio'];
                                }  ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ps-md-4">
                <table class="table table-borderless medium m-b-xs ">
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                include "../controller/koneksi.php";

                                $gambar = "select * from artikel where user = '" . $_SESSION['username'] . "' ";
                                $result = $koneksi->query($gambar);
                                $rowcount = mysqli_num_rows($result);
                                $dataprofil = $result->fetch_array()
                                ?>
                                <strong><?php echo $rowcount ?></strong> Artikel
                            </td>
                            <td>
                                <?php
                                include "../controller/koneksi.php";

                                $gambar = "select * from komentar where user = '" . $_SESSION['username'] . "' ";
                                $result = $koneksi->query($gambar);
                                $rowcount = mysqli_num_rows($result);
                                $dataprofil = $result->fetch_array()
                                ?>
                                <strong><?php echo $rowcount ?></strong> Komentar
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <?php
                                include "../controller/koneksi.php";

                                $gambar = "select sum(views.view) as total from views inner join artikel on views.id_artikel = artikel.id_artikel where artikel.user = '" . $_SESSION['username'] . "' ";
                                $result = $koneksi->query($gambar);
                                $rowcount = mysqli_num_rows($result);
                                $dataprofil = $result->fetch_array()
                                ?>
                                <strong><?php
                                        if (empty($dataprofil['total'])) {
                                            echo "0";
                                        } else {
                                            echo $dataprofil['total'];
                                        }
                                        ?></strong> Views
                            </td>
                            <td>
                                <?php
                                include "../controller/koneksi.php";

                                $gambar = "select count(komentar.komentar) as total from komentar inner join artikel on komentar.id_artikel = artikel.id_artikel where artikel.user = '" . $_SESSION['username'] . "' ";
                                $result = $koneksi->query($gambar);
                                $rowcount = mysqli_num_rows($result);
                                $dataprofil = $result->fetch_array()
                                ?>
                                <strong><?php echo $dataprofil['total'] ?></strong> Komentar di Postingan Anda
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <button class="btn btn-info m-md-3" type="button" style="width: 150;">
                    <a href="edit_profile.php" class="fa fa-paste text-white">EDIT</a>
                </button>
            </div>



        </div>
    </section>


    <section class="container features " id="beritautama">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>BERITA UTAMA</span> </h1>
                <p>NIKMATI BERITA - BERITA PALING AKTUAL HANYA DI RZ-NEWS. </p>
            </div>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight blog">
            <div class="row">

                <?php
                include "../controller/koneksi.php";
                $a = "select * from artikel ORDER BY id_artikel DESC LIMIT 6;";
                $b = $koneksi->query($a);
                while ($c = $b->fetch_array()) {
                ?>

                    <!-- Tiap Artikel -->
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-content">
                                <a href="artikel.php?op=<?php echo $c['id_artikel'] ?>" class="btn-link">
                                    <h2>
                                        <?php echo $c['judul'] ?>
                                    </h2>
                                </a>
                                <?php
                                $gambar = "select * from images where id_artikel = '" . $c['id_artikel'] . "' ";
                                $result = $koneksi->query($gambar);

                                $datagambar = $result->fetch_array()
                                ?>
                                <img class="img-fluid rounded mx-auto d-block" src="../img/fotoartikel/<?php echo $datagambar['namafile'] ?> "><br>
                                <div class="small m-b-xs">
                                    <strong><?php echo $c['user'] ?></strong> <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $c['tanggal'] ?></span>
                                </div>
                                <p>
                                    <?php echo $c['header'] ?>
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Tags:</h5>

                                        <button class="btn btn-white btn-xs" type="button"><?php echo $c['tag'] ?></button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="small text-right">
                                            <h5>Stats:</h5>
                                            <?php
                                            $qkomentar = "SELECT COUNT(komentar) AS totalkomen FROM komentar where id_artikel = '" . $c['id_artikel'] . "';";
                                            $res = $koneksi->query($qkomentar);
                                            $totalkomen =  $res->fetch_array();
                                            ?>
                                            <div> <i class="fa fa-comments-o"> </i><?php echo $totalkomen['totalkomen'] ?> comments </div>
                                            <?php
                                            $query = "SELECT view from views where id_artikel = '" . $c['id_artikel'] . "';";
                                            $res = $koneksi->query($query);
                                            $data =  $res->fetch_array();
                                            ?>
                                            <i class="fa fa-eye"> </i> <?php echo $data['view'] ?> views
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tutup Tiap Artikel -->

                <?php
                }
                ?>
            </div>
            <button class="btn btn-block btn-outline btn-primary">Tampilkan Lebih Banyak</button>
        </div>
    </section>





    <section id="contact" class="gray-section contact">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Contact Us</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
            <div class="row m-b-lg justify-content-center">
                <div class="col-lg-3 ">
                    <address>
                        <strong><span class="navy">Company name, Inc.</span></strong><br />
                        795 Folsom Ave, Suite 600<br />
                        San Francisco, CA 94107<br />
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-lg-4">
                    <p class="text-color">
                        Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                    <p class="m-t-sm">
                        Or follow us on social platform
                    </p>
                    <ul class="list-inline social-icon">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center m-t-lg m-b-lg">
                    <p><strong>&copy; 2015 Company Name</strong><br /> consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>

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


    <script>
        $(document).ready(function() {

            $('body').scrollspy({
                target: '#navbar',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;

            function init() {
                window.addEventListener('scroll', function(event) {
                    if (!didScroll) {
                        didScroll = true;
                        setTimeout(scrollPage, 250);
                    }
                }, false);
            }

            function scrollPage() {
                var sy = scrollY();
                if (sy >= changeHeaderOn) {
                    $(header).addClass('navbar-scroll')
                } else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }

            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();

        // Activate WOW.js plugin for animation on scrol
        new WOW().init();
    </script>

</body>

</html>