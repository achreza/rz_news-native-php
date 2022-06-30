<?php
session_start();
include "koneksi.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $query_1 = "select * from user where username='$user' and password='$psw'";
    $h_1 = $koneksi->query($query_1);
    if (mysqli_num_rows($h_1) == 1) {
        $d_1 = $h_1->fetch_array();
        $_SESSION['username'] = $d_1['nama'];
        $_SESSION['id_level'] = $d_1['id_level'];
        $_SESSION['id'] = $d_1['id'];
        if ($d_1['id_level'] == 1) {
            header("location:../views/admin_menu.php");
        }
        if ($d_1['id_level'] == 2) {
            header("location:../views/user_menu.php");
        }
    } else {
?>
        <script type="text/javascript">
            window.alert("Username Atau Password anda Salah");
            location.replace('../views/login.php');
        </script>
<?php
    }
} else if ($op == "out") {
    unset($_SESSION['username']);
    unset($_SESSION['id_level']);
    session_destroy();
    header("location:../views/login.php");
}
?>