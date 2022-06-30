<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$username = $_SESSION['username'];
$judul = $_POST['judul'];
$header = $_POST['header'];
$isi = $_POST['isi'];
$tag = $_POST['tag'];


$targetDir = "../img/fotoartikel/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

$sql = "INSERT INTO `rznews`.`pending` (`judul`, `header`, `isi`, `user`, `tag`) VALUES ('" . $judul . "', '" . $header . "', '" . $isi . "', '" . $username . "', '" . $tag . "');";

$a = $koneksi->query($sql);

$getid = "select id_artikel from pending where judul = '" . $judul . "'";
$getres = $koneksi->query($getid);

$idArr = $getres->fetch_array();
$id = $idArr['id_artikel'];

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
        window.alert("Input Berhasil!");
    </script>
<?php
}




header("location:../views/user_menu.php");
