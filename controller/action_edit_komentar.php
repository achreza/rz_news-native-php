<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$username = $_SESSION['username'];
$komentar = $_POST['komentar'];
$id = $_GET['id'];

$sql = "UPDATE `rznews`.`komentar` SET `komentar`='$komentar' WHERE  `id_komentar`=$id;";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace("../views/admin_komentar.php")
    </script>
<?php
}
