<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$level = $_POST['level'];
$id = $_GET['id'];

$sql = "INSERT INTO `rznews`.`level` (`nama_level`) VALUES ('$level');";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Tambah Data Berhasil!");
        location.replace("../views/admin_level.php")
    </script>
<?php
}
