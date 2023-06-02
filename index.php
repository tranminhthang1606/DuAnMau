<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "view/header.php";
$sp_trangchu = loadall_sanpham_home();
$danhmuc_trangchu = loadall_danhmuc();
session_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "chitietsp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $spct = loadone_sanpham($id);
                include "view/chitietsp.php";
            } else {
                include "view/home.php";
            }

            break;
        case "listsp":
            if (isset($_POST['timkiem']) && $_POST['timkiem']) {
                $kyw = $_POST['kyw'];
                $sp_cungloai = filter_sanpham(0, $kyw);
                include "view/listsp.php";
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sp_cungloai = loadall_sanpham_cungloai($id);
                $danhmuc = loadone_danhmuc($id);
                include "view/listsp.php";
            } else {
                include "view/home.php";
            }
            break;
        case "dangky":
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                include "view/taikhoan/upload.php";
                $vaitro = $_POST['vaitro'];
                insert_taikhoan($username, $password, $email, $file_name, $vaitro);
                $thongbao = "Đăng ký thành công";
            }
            include "view/taikhoan/dangky.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $get_account = loadone_taikhoan($_POST['email'], $_POST['pass']);
                if (isset($get_account) && $get_account != "") {
                    $_SESSION['username'] = $get_account['ho_ten'];
                    $_SESSION['vaitro'] = $get_account['vai_tro'];
                    $_SESSION['email'] = $get_account['email'];
                    $_SESSION['pass'] = $get_account['mat_khau'];
                } else {
                    $username = "";
                    $pass = "";
                    $vaitro = "";
                    $email = "";
                }
            }
            include "view/home.php";
            break;

        case "logout":
            if (isset($_SESSION['email'])) {
                session_destroy();
            }
            header("location:index.php");
            break;
        case "edit_tk":
            if (isset($_SESSION)) {
                $email = $_SESSION['email'];
                $pass = $_SESSION['pass'];
                $taikhoan_edit = loadone_taikhoan($email, $pass);
            }
            include "view/taikhoan/edit_tk.php";
            break;
        case "update_tk":
            if (isset($_POST['update']) && $_POST['update']) {
                $id_kh = $_GET['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $vaitro = $_POST['vaitro'];
                $kichhoat = $_POST['kichhoat'];
                include "view/taikhoan/upload.php";
                update_taikhoan($id_kh, $username, $password, $email, $file_name, $kichhoat, $vaitro);
                $thongbao = "Cập nhập thành công";
                $taikhoan_edit = loadone_taikhoan($email, $password);
                $_SESSION['username'] = $username;
                $_SESSION['vaitro'] = $vaitro;
                $_SESSION['email'] = $email;
                $_SESSION['pass'] = $password;
            }
            header("location:index.php");
            break;
        case "gioithieu":
            include "view/gioithieu.php";
            break;
        case "lienhe":
            include "view/lienhe.php";
            break;
        default:
            include "view/home.php";
            break;
    }

} else {
    include "view/home.php";
}

include "view/footer.php";

?>