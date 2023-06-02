<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "adddm":
            if (isset($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case "addsp":
            if (isset($_POST['themsp'])) {
                $tensp = $_POST['tensp'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $ngaynhap = $_POST['ngaynhap'];
                $loai = $_POST['loai'];
                $dacbiet = $_POST['dacbiet'];
                $slx = $_POST['slx'];
                $mota = $_POST['mota'];
                include "sanpham/upload.php";
                global $file_name;
                insert_sanpham($tensp, $dongia, $giamgia, $file_name, $ngaynhap, $loai, $dacbiet, $slx, $mota);
                $thongbao = "Thêm thành công";
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
                delete_danhmuc($id);
            }
            $danhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case "xoasp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
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
                $id = $_POST['masp'];
                $tensp = $_POST['tensp'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $ngaynhap = $_POST['ngaynhap'];
                $loai = $_POST['loai'];
                $dacbiet = $_POST['dacbiet'];
                $slx = $_POST['slx'];
                $mota = $_POST['mota'];
                include "sanpham/upload.php";
                global $file_name;
                update_sanpham($id, $tensp, $dongia, $giamgia, $file_name, $ngaynhap, $loai, $dacbiet, $slx, $mota);
                $thongbao = "Cập nhập thành công";
            }
            $sanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;
        case "updatedm":
            if (isset($_POST['capnhap']) && $_POST['capnhap']) {
                $id = $_POST['id'];
                $tenloai = $_POST['tenloai'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhập thành công";
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
                $kh = loadone_taikhoan_byID($id);
            }
            include "taikhoan/update.php";
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