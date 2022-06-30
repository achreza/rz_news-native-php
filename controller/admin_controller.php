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
        location.replace("../views/admin_semua.php");
    </script>
<?php
} else {
    header("location:../views/edit_artikel.php?id=$id");
}
