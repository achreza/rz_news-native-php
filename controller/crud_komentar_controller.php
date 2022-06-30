<?php
$tipe = $_POST['submit'];
$id = $_GET['id'];

include "koneksi.php";
$query = "SELECT * FROM komentar where id_komentar = $id";
$b = $koneksi->query($query);

if ($tipe == "delete") {
    $query = "DELETE FROM komentar where id_komentar = $id";
    $b = $koneksi->query($query);



?>
    <script>
        alert("DATA BERHASIL DIHAPUS");
        location.replace("../views/admin_komentar.php");
    </script>
<?php
} else {
    header("location:../views/edit_komentar.php?id=$id");
}
