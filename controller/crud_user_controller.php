<?php
$tipe = $_POST['submit'];
$id = $_GET['id'];

include "koneksi.php";

if ($tipe == "delete") {
    $query = "DELETE FROM user where id = $id";
    $b = $koneksi->query($query);



?>
    <script>
        alert("DATA BERHASIL DIHAPUS");
        location.replace("../views/admin_user.php");
    </script>
<?php
} else {
    header("location:../views/edit_user.php?id=$id");
}
