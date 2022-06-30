<?php
session_start();
include 'koneksi.php';
$statusMsg = '';
$username = $_SESSION['username'];
$tags = $_POST['tags'];
$id = $_GET['id'];

$sql = "UPDATE `rznews`.`tags` SET `nama_tags`='$tags' WHERE  `id_tags`=$id;";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace("../views/admin_tags.php")
    </script>
<?php
}
