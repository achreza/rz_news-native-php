<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$username = $_SESSION['username'];
$level = $_POST['level'];
$id = $_GET['id'];

$sql = "UPDATE `rznews`.`level` SET `nama_level`='$level' WHERE  `id_level`=$id;";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace("../views/admin_level.php")
    </script>
<?php
}
