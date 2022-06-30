<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$username = $_SESSION['username'];
$judul = $_POST['judul'];
$header = $_POST['header'];
$isi = $_POST['isi'];
$tag = $_POST['tag'];
$id = $_GET['id'];


$targetDir = "../img/fotoartikel/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

$sql = "UPDATE `rznews`.`artikel` SET `judul`='$judul', `header`='$header', `isi`='$isi', `tag`='$tag' WHERE  `id_artikel`=$id;";

$a = $koneksi->query($sql);


if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $koneksi->query("INSERT INTO `rznews`.`images` (`namafile`, `waktu`, `id_artikel`) VALUES ('$fileName', NOW(), '$id');");
        }
    }
}



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace("../views/admin_semua.php")
    </script>
<?php
}
