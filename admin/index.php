<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "header.php";
session_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "adddm":
            if (isset($_POST['themmoi'])) {
                if ($_POST['tenloai'] != "") {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Bạn nhập sai định dạng";
                }
            }
            include "danhmuc/add.php";
            break;
        case "addsp":
            if (isset($_POST['themsp'])) {
                if($_POST['tensp']!=""){
                    $tensp = $_POST['tensp'];
                }else{
                    $tensp="";
                    $thongbaoTensp = "Bạn nhập sai định dạng tên";
                }
                $floatDongia = (double) $_POST['dongia'];
                if($_POST['dongia']!="" &&is_nan($floatDongia)==false){
                    $dongia = $floatDongia;
                }else{
                    $dongia="";
                    $thongbaoDongia = "Bạn phải nhập số vào giá sản phẩm";
                }
                if($_POST['giamgia']!="" &&is_nan($_POST['giamgia'])==false){
                    $giamgia = $_POST['giamgia'];
                }else{
                    $giamgia="";
                    $thongbaogiamgia = "Bạn phải nhập số vào giá giảm";
                }
                $ngaynhap = $_POST['ngaynhap'];
                $loai = $_POST['loai'];
                $dacbiet = $_POST['dacbiet'];
                $slx = $_POST['slx'];
                $mota = $_POST['mota'];
                include "sanpham/upload.php";
                global $file_name;
                if ($tensp != "" && $ngaynhap != "" && $loai != "" && is_nan($dongia) == false && is_nan($slx) == false && $checked == true) {
                    insert_sanpham($tensp, $dongia, $giamgia, $file_name, $ngaynhap, $loai, $dacbiet, $slx, $mota);
                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Hãy kiểm tra lại định dạng";
                }
            }
            include "sanpham/add.php";
            break;
        case "listdm":
            $danhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case "listsp":
            if (isset($_POST['filter']) && $_POST['filter']) {
                $id = $_POST['iddm'];
                $search = $_POST['keyword'];
            } else {
                $id = 0;
                $search = "";
            }
            $danhmuc = loadall_danhmuc();
            $sanpham = filter_sanpham($id, $search);
            include "sanpham/list.php";
            break;
        case "xoadm":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_sanpham_byDanhMuc($id);
                delete_danhmuc($id);
            }
            $danhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case "xoasp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_binhluan_bySP($id);
                delete_sanpham($id);
            }
            $danhmuc = loadall_sanpham();
            include "sanpham/list.php";
            break;
        case "suadm":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dm = loadone_danhmuc($id);
            }
            include "danhmuc/update.php";
            break;
        case "suasp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sp = loadone_sanpham($id);
            }
            include "sanpham/update.php";
            break;
        case "updatesp";
            if (isset($_POST['capnhapsp']) && $_POST['capnhapsp']) {
                $id=$_POST['masp'];
                if($_POST['tensp']!=""){
                    $tensp = $_POST['tensp'];
                }else{
                    $tensp="";
                    $thongbaoTensp = "Bạn nhập sai định dạng tên";
                }
                
                if($_POST['dongia']!="" &&is_nan($_POST['dongia'])==false){
                    $dongia = $_POST['dongia'];
                }else{
                    $dongia="";
                    $thongbaoDongia = "Bạn phải nhập số vào giá sản phẩm";
                }
                
                if($_POST['giamgia']!="" &&is_nan($_POST['giamgia'])==false){
                    $giamgia = $_POST['giamgia'];
                }else{
                    $giamgia="";
                    $thongbaogiamgia = "Bạn phải nhập số vào giá giảm";
                }
                $ngaynhap = $_POST['ngaynhap'];
                $loai = $_POST['loai'];
                $dacbiet = $_POST['dacbiet'];
                $slx = $_POST['slx'];
                $mota = $_POST['mota'];
                include "sanpham/upload.php";
                global $file_name;
                if ($tensp != "" && $ngaynhap != "" && $loai != "" && is_nan($dongia) == false && is_nan($slx) == false && $checked == true) {
                    update_sanpham($id, $tensp, $dongia, $giamgia, $file_name, $ngaynhap, $loai, $dacbiet, $slx, $mota);
                    $thongbao = "Cập nhập thành công";
                } else {
                    $thongbao = "Cập nhập thất bại";
                }
            }
            $sanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;
        case "updatedm":
            if (isset($_POST['capnhap']) && $_POST['capnhap']) {
                $id = $_POST['id'];
                $tenloai = $_POST['tenloai'];
                if ($tenloai != "") {
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Cập nhập thành công";
                } else {
                    $thongbao = "Cập nhập thất bại";
                }
            }
            $danhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case "dskh":
            $taikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case "suakh":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $taikhoan_edit = loadone_taikhoan_byID($id);
            }
            include "taikhoan/edit_tk.php";
            break;
        case "xoakh":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_binhluan_byKH($id);
                delete_taikhoan($id);
                session_destroy();
            }
            $taikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case "update_tk":
            if (isset($_POST['update']) && $_POST['update']) {
                $id_kh = $_GET['id'];
                if (strlen($_POST['username']) > 6) {
                    $username = $_POST['username'];
                } else {
                    $username = "";
                    $thongbaoname = "Bạn nhập sai định dạng username";
                }

                if (strlen($_POST['password']) > 6) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                    $thongbaopassword = "Bạn nhập sai định dạng mật khẩu";
                }
                if (str_contains($_POST['email'], "@") || strlen($_POST['email']) > 10) {
                    $email = $_POST['email'];
                } else {
                    $email = "";
                    $thongbaoemail = "Bạn nhập sai định dạng email";
                }
                $vaitro = $_POST['vaitro'];
                $kichhoat = $_POST['kichhoat'];
                include "../view/taikhoan/upload.php";
                if ($username != "" && $password != "" && $email != "" && $checked == true) {
                    update_taikhoan($id_kh, $username, $password, $email, $file_name, $kichhoat, $vaitro);
                    $thongbao = "Cập nhập thành công";
                    $taikhoan_edit = loadone_taikhoan($email, $password);
                    $taikhoan = loadall_taikhoan();
                    include "taikhoan/list.php";
                } else {
                    $thongbao = "Cập nhập thất bại";
                    $taikhoan_edit = loadone_taikhoan_byID($id_kh);
                    include "taikhoan/edit_tk.php";
                }
            }

            break;
        case "listkh":
            if (isset($_POST['filter']) && $_POST['filter']) {
                $kyw = $_POST['keyword'];
                $vaitro = $_POST['vaitrokh'];
            } else {
                $kyw = "";
                $vaitro = "";
            }
            $taikhoan = filter_taikhoan($vaitro, $kyw);
            include "taikhoan/list.php";
            break;
        case "addtk":
            if (isset($_POST['addtk']) && $_POST['addtk']) {
                if (strlen($_POST['username']) > 6) {
                    $username = $_POST['username'];
                } else {
                    $username = "";
                    $thongbaoname = "Bạn nhập sai định dạng username";
                }

                if (strlen($_POST['password']) > 6) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                    $thongbaopassword = "Bạn nhập sai định dạng mật khẩu";
                }
                if (str_contains($_POST['email'], "@") || strlen($_POST['email']) > 10) {
                    $email = $_POST['email'];
                } else {
                    $email = "";
                    $thongbaoemail = "Bạn nhập sai định dạng email";
                }
                $vaitro = $_POST['vaitro'];
                $kichhoat = $_POST['kichhoat'];
                include "sanpham/upload.php";
                if ($username != "" && $password != "" && $email != "" && $checked == true) {
                    insert_taikhoan($username, $password, $email, $file_name, $vaitro, $kichhoat);
                    $thongbao = "Thêm tài khoản thành công";
                } else {
                    $thongbao = "Cập nhập thất bại";
                }
            }
            include "taikhoan/add.php";
            break;
        case "dsbl":
            if (isset($_POST['filter']) && $_POST['filter']) {
                $kyw = $_POST['keyword'];
                $date = $_POST['date'];
            } else {
                $kyw = "";
                $date = "";
            }
            $list_bl = filter_binhluan($kyw, $date);
            $binhluan = thongke_binhluan();
            include "binhluan/list.php";
            break;
        case "detail-bl":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $_SESSION['id_list_bl'] = $id;
                $binhluan = loadall_binhluan($id);
                include "binhluan/detail.php";
            }

            break;
        case "xoabl":

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $idbl = $_SESSION['id_list_bl'];
                delete_binhluan($id);
            }
            header("location:index.php?act=detail-bl&id=$idbl");
            break;
        case "thongke":
            $list_thongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case "chart":
            $list_thongke = loadall_thongke();
            include "thongke/chart.php";
            break;
        case "delAllSp":
            if (isset($_POST['delAll']) && $_POST['delAll']) {
                $list_delItem = $_POST['delItem'];
                $N = count($list_delItem);
                for ($i = 0; $i < $N; $i++) {
                    delete_sanpham($list_delItem[$i]);
                }
            }
            $sanpham = loadall_sanpham();

            header("location:index.php?act=listsp");
            break;
        case "delAllDm":
            if (isset($_POST['delAll']) && $_POST['delAll']) {
                $list_delItem = $_POST['delItem'];
                $N = count($list_delItem);
                for ($i = 0; $i < $N; $i++) {
                    delete_danhmuc($list_delItem[$i]);
                }
            }
            $danhmuc = loadall_danhmuc();

            header("location:index.php?act=listdm");
            break;

        case "delAllTk":
            if (isset($_POST['delAll']) && $_POST['delAll']) {
                $list_delItem = $_POST['delItem'];
                $N = count($list_delItem);
                for ($i = 0; $i < $N; $i++) {
                    delete_taikhoan($list_delItem[$i]);
                }
            }
            $taikhoan = loadall_taikhoan();

            header("location:index.php?act=listkh");
            break;
        case "delAllBl":
            if (isset($_POST['delAll']) && $_POST['delAll']) {
                $list_delItem = $_POST['delItem'];
                $N = count($list_delItem);
                for ($i = 0; $i < $N; $i++) {
                    delete_binhluan($list_delItem[$i]);
                }
            }
            header("location:index.php?act=dsbl");
            break;


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";


?>