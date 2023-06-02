<?php
function loadall_sanpham()
{
    $sql = "SELECT * FROM `hang_hoa` order by `ma_hh` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function insert_sanpham($tenhh, $dongia, $giamgia, $hinh, $ngaynhap, $loai, $dacbiet, $slx, $mota)
{
    $sql = "INSERT INTO `hang_hoa` (`ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `ma_loai`, `dac_biet`, `so_luot_xem`, `mo_ta`) VALUES ('$tenhh', '$dongia', '$giamgia', '$hinh', '$ngaynhap', '$loai', b'$dacbiet', '$slx', '$mota')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "DELETE FROM loai WHERE `hang_hoa`.`ma_hh` = '$id'";
    pdo_execute($sql);
}

function update_sanpham($id, $tenhh, $dongia, $giamgia, $hinh, $ngaynhap, $loai, $dacbiet, $slx, $mota)
{
    $sql = "UPDATE `hang_hoa` SET `ten_hh` = '$tenhh', `don_gia` = '$dongia', `giam_gia` = '$giamgia', `hinh` = '$hinh', `ngay_nhap` = '$ngaynhap', `ma_loai` = '$loai', `dac_biet` = b'$dacbiet', `so_luot_xem` = '$slx', `mo_ta` = '$mota' WHERE `hang_hoa`.`ma_hh` = '$id'";
    pdo_execute($sql);
}

function loadone_sanpham($id)
{
    $sql = "SELECT * FROM `hang_hoa`where `ma_hh`='$id'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function filter_sanpham($id, $keyword)
{
    $sql = "select * from `hang_hoa` where 1";
    if ($keyword != "") {
        $sql .= " and `ten_hh` like '%$keyword%'";
    }
    if($id>0){
        $sql.=" and `ma_loai`='$id'";
    }
    $sql .= " order by `ma_hh` desc";
    $sanpham = pdo_query($sql);
    return $sanpham;
}

function loadall_sanpham_home(){
    $sql = "SELECT * FROM `hang_hoa` order by `ma_hh` desc limit 0,9";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function loadall_sanpham_top10(){
    $sql = "SELECT * FROM `hang_hoa` order by `so_luot_xem` desc limit 0,9";
    $sanpham = pdo_query($sql);
    return $sanpham;
}

function loadall_sanpham_cungloai($ma_loai){
    $sql = "SELECT * FROM `hang_hoa`where `ma_loai`='$ma_loai'";
    $sp = pdo_query($sql);
    return $sp;
}

?>