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

<html>

<head>
    <title>Rz-News | Forms</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Form Input</h5>

            </div>
            <form action="../controller/upload.php" method="POST" enctype="multipart/form-data">
                <div class="ibox-content">
                    <p>
                        Silahkan Ikuti Langkah langkah dibawah
                    </p>
                    <div id="wizard">
                        <h1>Konfimasi Diri Anda</h1>
                        <div class="step-content">
                            <div class=" m-t-md">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="username anda" name="username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="" name="password">
                                </div>
                            </div>
                        </div>

                        <h1>Buat Artikel Anda</h1>
                        <div class="step-content">
                            <div class=" m-t-md">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Buat judul anda" name="judul">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Header</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="header"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Isi</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="17" name="isi"></textarea>
                                </div>
                                <select class="form-control m-b" aria-label=".form-select-lg example" name="tag">
                                    <option selected>Silahkan pilih tag</option>
                                    <option value="Teknologi">Teknologi</option>
                                    <option value="Gaya Hidup">Gaya hidup</option>
                                    <option value="Olahraga">Olahraga</option>
                                    <option value="Liburan">Liburan</option>
                                </select>
                            </div>
                        </div>

                        <h1>Upload Foto</h1>
                        <div class="step-content">
                            <h1>Silahkan Upload Foto untuk Artikel Anda</h1>
                            <div class="custom-file">
                                <input type="file" name="file" id="file">

                            </div>
                            <input type="submit" class="btn btn-w-m btn-primary" name="submit">

                        </div>
                    </div>

                </div>
            </form>
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

    <!-- Steps -->
    <script src="../js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="../js/plugins/validate/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function(event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function(event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function(event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                    document.getElementById("myForm").submit();
                }
            }).validate({
                errorPlacement: function(error, element) {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>
</body>



</html>