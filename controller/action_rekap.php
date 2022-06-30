<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];

$sql = "insert into rekap (tanggal,upload,komentar) values (NOW(),(SELECT COUNT(komentar) FROM komentar WHERE tanggal = NOW()),(SELECT COUNT(judul) AS total FROM artikel where tanggal = NOW()))";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Tambah Data Berhasil!");
        location.replace("../views/admin_rekap.php")
    </script>
<?php
}
