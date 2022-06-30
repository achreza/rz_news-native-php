<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$tags = $_POST['tags'];
$id = $_GET['id'];

$sql = "INSERT INTO `rznews`.`tags` (`nama_tags`) VALUES ('$tags');";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Tambah Data Berhasil!");
        location.replace("../views/admin_tags.php")
    </script>
<?php
}
