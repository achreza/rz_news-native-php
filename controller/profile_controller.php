<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$username = $_POST['username'];
$title = $_POST['title'];
$bio = $_POST['bio'];
$id = $_SESSION['id'];
$OldUsername = $_SESSION['username'];

$targetDir = "../img/profil/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);



if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $koneksi->query("UPDATE `rznews`.`profil` SET title = '$title', bio = '$bio', foto = '$fileName' WHERE id_user = $id");
            $insert2 = $koneksi->query("UPDATE `rznews`.`user` SET `nama`='$username' WHERE  `id`=$id;");
            $insert3 = $koneksi->query("UPDATE `rznews`.`artikel` SET `user`='$username' WHERE  `user`='$OldUsername';");
            $insert4 = $koneksi->query("UPDATE `rznews`.`komentar` SET `user`='$username' WHERE  `user`='$OldUsername';");
        }
    }
} else {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $koneksi->query("UPDATE `rznews`.`profil` SET title = '$title', bio = '$bio' WHERE id_user = $id");
            $insert2 = $koneksi->query("UPDATE `rznews`.`user` SET `nama`='$username' WHERE  `id`=$id;");
            $insert3 = $koneksi->query("UPDATE `rznews`.`artikel` SET `user`='$username' WHERE  `user`='$OldUsername';");
            $insert4 = $koneksi->query("UPDATE `rznews`.`komentar` SET `user`='$username' WHERE  `user`='$OldUsername';");
        }
    }
}

if ($insert === true) {
    echo "<script type='text/javascript'>";
    echo   "window.alert('Edit Berhasil!'); </script>";
    header("location: ../views/login.php");
}
