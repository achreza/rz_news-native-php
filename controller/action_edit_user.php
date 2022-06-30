<?php
session_start();
include 'koneksi.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$id = $_GET['id'];

if ($level == "Admin") {
    $idlevel = 1;
} else {
    $idlevel = 2;
}

var_dump($nama, $username, $password, $idlevel);


$sql = "UPDATE `rznews`.`user` SET `nama`='$nama', `username`='$username', `password`='$password', `id_level`='$idlevel' WHERE  `id`=$id;";

$a = $koneksi->query($sql);



if ($a === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace("../views/admin_user.php")
    </script>
<?php
}
