<?php
function loadall_taikhoan()
{
    $sql = "SELECT * FROM `khach_hang` order by `ma_kh` ";
    $khachhang = pdo_query($sql);
    return $khachhang;
}

function insert_taikhoan($ho_ten,$mat_khau,$email,$hinh,$vai_tro)
{
    $sql = "INSERT INTO `khach_hang` (`ho_ten`, `mat_khau`, `email`, `hinh`,`vai_tro`) VALUES ('$ho_ten', '$mat_khau', '$email', '$hinh', b'$vai_tro')";
    pdo_execute($sql);
}

function loadone_taikhoan($email,$password)
{
    $sql = "SELECT * FROM `khach_hang`where `email`='$email' and `mat_khau`='$password'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id,$ho_ten,$mat_khau,$email,$hinh,$kich_hoat,$vai_tro)
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
?>