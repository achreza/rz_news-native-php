<?php
$tipe = $_POST['submit'];
$id = $_GET['id'];

include "koneksi.php";

if ($tipe == "delete") {
    $query = "DELETE FROM level where id_level = $id";
    $b = $koneksi->query($query);



?>
    <script>
        alert("DATA BERHASIL DIHAPUS");
        location.replace("../views/admin_level.php");
    </script>
<?php
} else {
    header("location:../views/edit_level.php?id=$id");
}
