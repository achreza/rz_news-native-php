<?php
session_start();
include "koneksi.php";
$komentar = $_POST['komentar'];
$id_artikel = $_GET['id'];
$nama = $_SESSION['username'];
$level = 1;


$sql = "INSERT INTO `rznews`.`komentar` (`user`, `komentar`, `tanggal`, `jam`, `id_artikel`) VALUES ('" . $_SESSION['username'] . "', '" . $komentar . "', NOW(), NOW(),'" . $id_artikel . "');";
$a = $koneksi->query($sql);

if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("input Berhasil!");
        location.replace('../views/artikel.php?op=<?php
                                                    echo $id_artikel
                                                    ?>');
    </script>
<?php
} else {
    echo "Error";
}

?>