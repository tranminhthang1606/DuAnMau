<?php
function loadall_taikhoan()
{
    $sql = "SELECT * FROM `khach_hang` order by `ma_kh` ";
    $khachhang = pdo_query($sql);
    return $khachhang;
}
function load_taikhoan_vaitro()
{
    $sql = "SELECT `vai_tro` FROM `khach_hang`";
    $vaitro = pdo_query($sql);
    return $vaitro;
}

function insert_taikhoan($ho_ten, $mat_khau, $email, $hinh, $vai_tro, $kich_hoat)
{
    $sql = "INSERT INTO `khach_hang` (`ho_ten`, `mat_khau`, `email`, `hinh`,`vai_tro`,`kich_hoat`) VALUES ('$ho_ten', '$mat_khau', '$email', '$hinh', b'$vai_tro','$kich_hoat')";
    pdo_execute($sql);
}

function loadone_taikhoan($email, $password)
{
    $sql = "SELECT * FROM `khach_hang`where `email`='$email'";
    if ($password != "") {
        $sql .= "and `mat_khau`='$password'";
    }
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id, $ho_ten, $mat_khau, $email, $hinh, $kich_hoat, $vai_tro)
{
    $sql = "UPDATE `khach_hang` SET `ho_ten` = '$ho_ten', `mat_khau` = '$mat_khau', `email` = '$email', `hinh` = '$hinh', `kich_hoat` = '$kich_hoat', `vai_tro` = b'$vai_tro' WHERE `khach_hang`.`ma_kh` = '$id'";
    pdo_execute($sql);
}
function loadone_taikhoan_byID($id)
{
    $sql = "SELECT * FROM `khach_hang`where `ma_kh`='$id'";
    $kh = pdo_query_one($sql);
    return $kh;
}

function filter_taikhoan($vaitro, $keyword)
{
    $sql = "select * from `khach_hang`";
    if ($keyword != "") {
        $sql .= " and `email` like '%$keyword%'";
    }
    if ($vaitro == 0 || $vaitro == 1) {
        $sql .= " and `vai_tro`='$vaitro'";
    }
    $sql .= " order by `ma_kh` desc";
    $kh = pdo_query($sql);
    return $kh;
}
function delete_taikhoan($id)
{
    $sql = "DELETE FROM `khach_hang` WHERE `khach_hang`.`ma_kh` = '$id'";
    pdo_execute($sql);
}
?>