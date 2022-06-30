<?php
$tipe = $_POST['submit'];
$id = $_GET['id'];

include "koneksi.php";
$query = "SELECT * FROM pending where id_artikel = $id";
$b = $koneksi->query($query);
while ($c = $b->fetch_array()) {
    $judul = $c['judul'];
    $header = $c['header'];
    $isi = $c['isi'];
    $username = $c['user'];
    $tag = $c['tag'];
}

if ($tipe == "delete") {
    $query = "DELETE FROM pending where id_artikel = $id";
    $b = $koneksi->query($query);



?>
    <script>
        alert("DATA BERHASIL DIHAPUS");
        location.replace("../views/admin_menu.php");
    </script>
<?php
} else {
    $sql = "INSERT INTO `rznews`.`artikel` (`judul`, `header`, `isi`, `tanggal`, `user`, `tag`) VALUES ('" . $judul . "', '" . $header . "', '" . $isi . "', NOW(), '" . $username . "', '" . $tag . "');";
    $a = $koneksi->query($sql);

    $query = "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 1";
    $b = $koneksi->query($query);
    while ($c = $b->fetch_array()) {
        $idBaru = $c['id_artikel'];
    }

    $sql2 = "INSERT INTO `rznews`.`views` (`id_artikel`, `view`) VALUES ('" . $idBaru . "', '0');";
    $koneksi->query($sql2);

    $getid = "UPDATE images set id_artikel = '$idBaru' where id_artikel = '$id';";
    $getres = $koneksi->query($getid);
    $query = "DELETE FROM pending where id_artikel = $id";
    $b = $koneksi->query($query);



    echo "<script>window.alert('DATA BERHASIL DIKONFIRMASI');</script>";

    header("location:../views/admin_menu.php");
}
