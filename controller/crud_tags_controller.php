<?php
$tipe = $_POST['submit'];
$id = $_GET['id'];

include "koneksi.php";

if ($tipe == "delete") {
    $query = "DELETE FROM tags where id_tags = $id";
    $b = $koneksi->query($query);



?>
    <script>
        alert("DATA BERHASIL DIHAPUS");
        location.replace("../views/admin_tags.php");
    </script>
<?php
} else {
    header("location:../views/edit_tags.php?id=$id");
}
