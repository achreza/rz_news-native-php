<?php
include "koneksi.php";
$id = $_GET['id'];

$sql = "DELETE FROM logs where id_log = '$id'";
$a = $koneksi->query($sql);

if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Hapus Berhasil!");
        location.replace('../views/admin_log.php');
    </script>
<?php
} else {
    echo "Error";
}
?>