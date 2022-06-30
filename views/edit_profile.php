<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Profile</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="user_menu.php">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong> Edit Profile</strong>
                </li>
            </ol>
        </div>
    </div>

    <section id="team" class="white-section team  mt-md-3">
        <div class="row m-b-lg m-t-lg p-md-5 m-md-2">
            <div class="col-md-6">

                <?php
                include "../controller/koneksi.php";

                $gambar = "select * from profil where id_user = '" . $_SESSION['id'] . "' ";
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
                <div class="profile-info text-light">
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
                                    echo "Masih bleum ada Bio";
                                } else {
                                    echo $dataprofil['bio'];
                                }  ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </section>

    <form action="../controller/profile_controller.php" method="POST" enctype="multipart/form-data">
        <div class="ibox-content">
            <div id="wizard">
                <div class="step-content">
                    <div class=" m-t-md">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama anda" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title anda" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Bio</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Bio anda" name="bio">
                        </div>
                    </div>
                </div>

                <h2>Upload Foto Anda</h2>

                <div class="step-content">
                    <div class="custom-file">
                        <input type="file" name="file" id="file">

                    </div>
                    <input type="submit" class="btn btn-w-m btn-primary" name="submit">

                </div>
            </div>

        </div>
    </form>


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

<!-- Sparkline -->
<script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

<script>
    $(document).ready(function() {


        $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1ab394',
            fillColor: "transparent"
        });


    });
</script>

</html>