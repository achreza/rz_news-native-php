<?php
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$level = 1;


$sql = "INSERT INTO `rznews`.`user` (`nama`, `username`, `password`, `id_level`) VALUES ('" . $nama . "', '" . $username . "', '" . $password . "', '2');";
$a = $koneksi->query($sql);

$query = "SELECT * FROM user ORDER BY id DESC LIMIT 1";
$b = $koneksi->query($query);
while ($c = $b->fetch_array()) {
    $idBaru = $c['id'];
}

$sql2 = "INSERT INTO `rznews`.`profil` (`id_user`, `title`, `foto`, `bio`) VALUES ('$idBaru', 'Silahkan isi title anda', 'person.png', 'Silahkan isi Bio Anda');";
$d = $koneksi->query($sql2);

if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Daftar Berhasil!");
        location.replace('../views/login.php');
    </script>
<?php
} else {
    echo "Error";
}

?>