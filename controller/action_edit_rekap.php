<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$artikel = $_POST['artikel'];
$komentar = $_POST['komentar'];
$id = $_GET['id'];

$sql = "UPDATE `rznews`.`rekap` SET `upload`='$artikel', `komentar`='$komentar' WHERE  `id`=$id;";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace("../views/admin_rekap.php")
    </script>
<?php
}
